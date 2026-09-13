# SGE - Sistema de Gestión de Biblioteca

Proyecto Laravel para la gestión de una biblioteca universitaria (catálogo de libros, editoriales, géneros, préstamos).

## Requisitos

- Docker Desktop
- WSL2 (si estás en Windows)
- Laravel Sail

## Instalación

```bash
# Clonar el repositorio
git clone <https://github.com/manuela-aguirre/SGE-CLASE-5>
cd sge

# Instalar dependencias (si no tienes vendor/)
composer install

# Copiar variables de entorno
cp .env.example .env

# Levantar los contenedores
./vendor/bin/sail up -d

# Generar la key de la aplicación
./vendor/bin/sail artisan key:generate

# Ejecutar migraciones
./vendor/bin/sail artisan migrate

# Sembrar datos de prueba
./vendor/bin/sail artisan db:seed
```

## Entidades principales

| Entidad | Descripción |
|---|---|
| `Editorial` | Casas editoriales de los libros |
| `Genero` | Géneros/categorías temáticas de los libros |
| `Libro` | Catálogo de libros de la biblioteca |

## Relaciones

- **Editorial → Libro** (1:N): una editorial puede tener muchos libros, cada libro pertenece a una sola editorial.

```php
// Editorial.php
public function libros() {
    return $this->hasMany(Libro::class);
}

// Libro.php
public function editorial() {
    return $this->belongsTo(Editorial::class);
}
```

## Seeders

Cada tabla se siembra con al menos 5 registros de prueba:

```bash
./vendor/bin/sail artisan db:seed --class=EditorialSeeder
./vendor/bin/sail artisan db:seed --class=GeneroSeeder
./vendor/bin/sail artisan db:seed --class=LibroSeeder
```

## Comandos útiles

```bash
# Entrar a la consola interactiva de Laravel
./vendor/bin/sail artisan tinker

# Entrar directamente a MySQL
./vendor/bin/sail mysql

# Reconstruir la base de datos desde cero (borra todos los datos)
./vendor/bin/sail artisan migrate:fresh --seed

# Ver estado de las migraciones
./vendor/bin/sail artisan migrate:status
```

## Estructura de la base de datos

```
editorials
├── id
├── nombre
└── timestamps

generos
├── id
├── nombre
└── timestamps

libros
├── id
├── titulo
├── descripcion
├── portada_url
├── stock
├── isbn
├── editorial_id (FK → editorials.id)
└── timestamps
```