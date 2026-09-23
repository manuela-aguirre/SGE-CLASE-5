<?php

namespace App\Http\Controllers;

use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Ruta real: storage/app/data/{filename}
     * (usamos storage_path() directo, sin el facade Storage,
     * porque en Laravel 11+ el disco 'local' apunta por defecto
     * a storage/app/private y no a storage/app)
     */
    private function csvPath(string $filename): ?string
    {
        $path = storage_path('app/data/'.$filename);

        return file_exists($path) ? $path : null;
    }

    /**
     * Lee un CSV y devuelve un array asociativo por fila,
     * usando la primera línea como encabezados.
     */
    private function readCsv(string $filename): array
    {
        $path = $this->csvPath($filename);

        if (! $path) {
            return [];
        }

        $rows = [];
        if (($handle = fopen($path, 'r')) !== false) {
            $headers = fgetcsv($handle, 0, ',');

            if ($headers === false) {
                fclose($handle);
                return [];
            }

            // Quita un posible BOM invisible al inicio del primer encabezado
            $headers[0] = preg_replace('/^\x{FEFF}/u', '', $headers[0]);
            $headers = array_map(fn ($h) => strtolower(trim($h)), $headers);

            while (($data = fgetcsv($handle, 0, ',')) !== false) {
                if (count($data) === count($headers)) {
                    $rows[] = array_combine($headers, $data);
                }
            }
            fclose($handle);
        }

        return $rows;
    }

    private function formatCompactNumber(int $value): string
    {
        if ($value >= 1000) {
            return number_format($value / 1000, 1, '.', '').'k';
        }

        return (string) $value;
    }

    public function welcome()
    {
        $libros = $this->readCsv('libro.csv');
        $prestamos = $this->readCsv('prestamo.csv');

        $totalLibros = count($libros);
        $totalUsuarios = User::count();
        $totalPrestamos = count($prestamos);
        $multas = count(array_filter($prestamos, function ($row) {
            return isset($row['multa'])
                && is_numeric($row['multa'])
                && (float) $row['multa'] > 0;
        }));

        $porcentajeMultas = $totalPrestamos > 0 ? round(($multas / $totalPrestamos) * 100, 1) : 0;

        return view('welcome', [
            'panelStats' => [
                'libros' => $this->formatCompactNumber($totalLibros),
                'usuarios' => $this->formatCompactNumber($totalUsuarios),
                'prestamos' => $this->formatCompactNumber($totalPrestamos),
                'multas' => $porcentajeMultas.'%',
            ],
        ]);
    }

    public function index()
    {
        // Umbral para considerar "pocas copias disponibles"
        $umbralBajoStock = 2;

        $libros = $this->readCsv('libro.csv');       // id_libro, titulo, ..., stock, ISBN, id_editorial
        $prestamos = $this->readCsv('prestamo.csv'); // id_prestamo, id_usuario, fecha_prestamo, ...

        // Total de libros (títulos distintos en el catálogo)
        $totalLibros = count($libros);

        // Usuarios registrados: viene de la tabla real de Laravel, no de un CSV
        $totalUsuarios = User::count();

        // Préstamos registrados hoy (fecha_prestamo = hoy)
        $hoy = now()->format('Y-m-d');
        $prestamosHoy = count(array_filter($prestamos, function ($row) use ($hoy) {
            return isset($row['fecha_prestamo'])
                && str_starts_with(trim($row['fecha_prestamo']), $hoy);
        }));

        // Libros con pocas copias en stock
        $librosBajoStock = count(array_filter($libros, function ($row) use ($umbralBajoStock) {
            return isset($row['stock'])
                && is_numeric($row['stock'])
                && (int) $row['stock'] <= $umbralBajoStock;
        }));

        return view('dashboard', [
            'totalLibros' => $totalLibros,
            'totalUsuarios' => $totalUsuarios,
            'prestamosHoy' => $prestamosHoy,
            'librosBajoStock' => $librosBajoStock,
        ]);
    }
}