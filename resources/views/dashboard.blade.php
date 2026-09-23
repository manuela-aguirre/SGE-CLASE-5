<x-app-layout>
    <x-slot name="header">
        <h2 class="cotec-header-title">
            Panel de Control
        </h2>
    </x-slot>

    <style>
        .cotec-header-title {
            font-family: 'Figtree', Arial, sans-serif;
            font-weight: 600;
            font-size: 1.25rem;
            color: #14532d;
        }

        .cotec-dash-wrap {
            padding: 2rem 1rem;
            font-family: 'Figtree', Arial, sans-serif;
        }

        .cotec-dash-inner {
            max-width: 1100px;
            margin: 0 auto;
        }

        .cotec-welcome-card {
            background: linear-gradient(90deg, #14532d 0%, #16a34a 100%);
            border-radius: 1rem;
            padding: 2rem;
            color: #ffffff;
            box-shadow: 0 10px 25px rgba(0,0,0,0.12);
            margin-bottom: 2rem;
        }

        .cotec-dashboard-brand {
            display: flex;
            align-items: center;
            gap: 0.9rem;
            margin-bottom: 1rem;
        }

        .cotec-dashboard-logo {
            width: 58px;
            height: 58px;
            background: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 20px rgba(11, 30, 19, 0.2);
            border: 4px solid rgba(255,255,255,0.45);
            overflow: hidden;
            flex-shrink: 0;
        }

        .cotec-dashboard-logo svg {
            width: 100%;
            height: 100%;
            display: block;
        }

        .cotec-dashboard-brand small {
            display: block;
            font-size: 0.66rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            opacity: 0.8;
            color: #dcfce7;
        }

        .cotec-welcome-card h1 {
            margin: 0;
            font-size: 1.6rem;
            font-weight: 700;
        }

        .cotec-welcome-card p {
            margin: 0.35rem 0 0 0;
            font-size: 0.95rem;
            color: #dcfce7;
        }

        .cotec-kpi-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.25rem;
        }

        @media (max-width: 900px) {
            .cotec-kpi-grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 520px) {
            .cotec-kpi-grid { grid-template-columns: 1fr; }
        }

        .cotec-kpi-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 0.85rem;
            padding: 1.25rem;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
            gap: 0.6rem;
            transition: box-shadow 0.2s, transform 0.2s;
        }

        .cotec-kpi-card:hover {
            box-shadow: 0 8px 18px rgba(0,0,0,0.1);
            transform: translateY(-2px);
        }

        .cotec-kpi-icon {
            width: 44px;
            height: 44px;
            border-radius: 0.65rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cotec-kpi-icon.green { background: #dcfce7; }
        .cotec-kpi-icon.blue { background: #dbeafe; }
        .cotec-kpi-icon.amber { background: #fef3c7; }
        .cotec-kpi-icon.red { background: #fee2e2; }

        .cotec-kpi-value {
            font-size: 1.8rem;
            font-weight: 700;
            color: #111827;
        }

        .cotec-kpi-label {
            font-size: 0.85rem;
            color: #6b7280;
        }

        .cotec-kpi-card.alert .cotec-kpi-value {
            color: #b91c1c;
        }

        .cotec-book-form-card {
            margin-top: 2rem;
            background: #ffffff;
            border: 1px solid #dfeee3;
            border-radius: 1.2rem;
            box-shadow: 0 14px 30px rgba(20, 83, 45, 0.08);
            overflow: hidden;
        }

        .cotec-book-form-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            background: linear-gradient(90deg, #f0fdf4 0%, #ecfdf5 100%);
            border-bottom: 1px solid #d1fae5;
            padding: 1.3rem 1.5rem;
        }

        .cotec-book-form-title {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            color: #14532d;
            font-weight: 700;
            font-size: 1.1rem;
        }

        .cotec-book-form-icon {
            width: 42px;
            height: 42px;
            border-radius: 0.8rem;
            background: #14532d;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 18px rgba(20, 83, 45, 0.15);
        }

        .cotec-book-form-body {
            padding: 1.5rem;
        }

        .cotec-book-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 1rem 1.2rem;
        }

        .cotec-field {
            display: flex;
            flex-direction: column;
            gap: 0.45rem;
        }

        .cotec-field label {
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: #14532d;
        }

        .cotec-input,
        .cotec-select,
        .cotec-textarea {
            width: 100%;
            border: 1px solid #d1fae5;
            background: #f8fffb;
            color: #0f172a;
            border-radius: 0.8rem;
            padding: 0.8rem 0.9rem;
            font-size: 0.95rem;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .cotec-input:focus,
        .cotec-select:focus,
        .cotec-textarea:focus {
            outline: none;
            border-color: #22c55e;
            box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.12);
        }

        .cotec-textarea {
            resize: vertical;
            min-height: 110px;
        }

        .cotec-form-actions {
            margin-top: 1.5rem;
            display: flex;
            justify-content: flex-end;
            gap: 0.8rem;
            flex-wrap: wrap;
        }

        .cotec-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            border-radius: 999px;
            padding: 0.8rem 1.3rem;
            font-weight: 700;
            border: 1px solid transparent;
            cursor: pointer;
            text-decoration: none;
        }

        .cotec-btn-light {
            background: #ecfdf5;
            color: #14532d;
            border-color: #bbf7d0;
        }

        .cotec-btn-dark {
            background: linear-gradient(90deg, #14532d 0%, #15803d 100%);
            color: white;
            box-shadow: 0 10px 20px rgba(20, 83, 45, 0.15);
        }

        @media (max-width: 720px) {
            .cotec-book-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="cotec-dash-wrap">
        <div class="cotec-dash-inner">

            <!-- Bienvenida -->
            <div class="cotec-welcome-card">
                <h1>¡Bienvenido, {{ auth()->user()->name }}!</h1>
                <p>Biblioteca COTECNOVA - Panel de Control</p>
            </div>

            <!-- KPIs -->
            <div class="cotec-kpi-grid">

                <!-- Total de libros -->
                <div class="cotec-kpi-card">
                    <div class="cotec-kpi-icon green">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#15803d" stroke-width="2" style="width:22px;height:22px;">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                        </svg>
                    </div>
                    {{-- Reemplaza el valor fijo por: {{ \App\Models\Book::count() }} --}}
                    <div class="cotec-kpi-value">{{ $totalLibros ?? 1240 }}</div>
                    <div class="cotec-kpi-label">Total de libros</div>
                </div>

                <!-- Total de usuarios / miembros -->
                <div class="cotec-kpi-card">
                    <div class="cotec-kpi-icon blue">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" style="width:22px;height:22px;">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>
                    </div>
                    {{-- Reemplaza el valor fijo por: {{ \App\Models\User::count() }} --}}
                    <div class="cotec-kpi-value">{{ $totalUsuarios ?? 356 }}</div>
                    <div class="cotec-kpi-label">Usuarios registrados</div>
                </div>

                <!-- Préstamos del día -->
                <div class="cotec-kpi-card">
                    <div class="cotec-kpi-icon amber">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="2" style="width:22px;height:22px;">
                            <path d="M12 2v4"/>
                            <path d="m16.24 7.76 2.83-2.83"/>
                            <path d="M18 12h4"/>
                            <path d="m16.24 16.24 2.83 2.83"/>
                            <path d="M12 18v4"/>
                            <path d="m4.93 19.07 2.83-2.83"/>
                            <path d="M2 12h4"/>
                            <path d="m4.93 4.93 2.83 2.83"/>
                        </svg>
                    </div>
                    {{-- Reemplaza el valor fijo por: {{ \App\Models\Loan::whereDate('created_at', today())->count() }} --}}
                    <div class="cotec-kpi-value">{{ $prestamosHoy ?? 18 }}</div>
                    <div class="cotec-kpi-label">Préstamos de hoy</div>
                </div>

                <!-- Libros con bajo stock -->
                <div class="cotec-kpi-card alert">
                    <div class="cotec-kpi-icon red">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="2" style="width:22px;height:22px;">
                            <path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/>
                            <line x1="12" y1="9" x2="12" y2="13"/>
                            <line x1="12" y1="17" x2="12.01" y2="17"/>
                        </svg>
                    </div>
                    {{-- Reemplaza el valor fijo por: {{ \App\Models\Book::where('copias_disponibles', '<=', 2)->count() }} --}}
                    <div class="cotec-kpi-value">{{ $librosBajoStock ?? 7 }}</div>
                    <div class="cotec-kpi-label">Libros con pocas copias</div>
                </div>

            </div>

            <div class="cotec-book-form-card">
                <div class="cotec-book-form-header">
                    <div class="cotec-book-form-title">
                        <div class="cotec-book-form-icon">
                            <i class="fa-solid fa-book-open-reader"></i>
                        </div>
                        <span>Crear libro nuevo</span>
                    </div>
                    <span class="text-sm font-semibold text-[#166534] bg-[#ecfdf5] px-3 py-1.5 rounded-full">Biblioteca Central</span>
                </div>

                <div class="cotec-book-form-body">
                    <form action="#" method="POST">
                        @csrf

                        <div class="cotec-book-grid">
                            <div class="cotec-field">
                                <label for="titulo">Título</label>
                                <input id="titulo" type="text" class="cotec-input" placeholder="Ej. Fundamentos de bibliotecas universitarias" />
                            </div>

                            <div class="cotec-field">
                                <label for="isbn">ISBN</label>
                                <input id="isbn" type="text" class="cotec-input" placeholder="978-1-2345-6789-0" />
                            </div>

                            <div class="cotec-field">
                                <label for="autor">Autor</label>
                                <input id="autor" type="text" class="cotec-input" placeholder="Nombre del autor" />
                            </div>

                            <div class="cotec-field">
                                <label for="editorial">Editorial</label>
                                <input id="editorial" type="text" class="cotec-input" placeholder="Editorial" />
                            </div>

                            <div class="cotec-field">
                                <label for="genero">Género</label>
                                <select id="genero" class="cotec-select">
                                    <option>Ficción</option>
                                    <option>Tecnología</option>
                                    <option>Historia</option>
                                    <option>Educación</option>
                                    <option>Investigación</option>
                                </select>
                            </div>

                            <div class="cotec-field">
                                <label for="stock">Stock</label>
                                <input id="stock" type="number" class="cotec-input" min="0" value="1" />
                            </div>

                            <div class="cotec-field">
                                <label for="categoria">Categoría</label>
                                <select id="categoria" class="cotec-select">
                                    <option>General</option>
                                    <option>Referencia</option>
                                    <option>Especializada</option>
                                    <option>Digital</option>
                                </select>
                            </div>

                            <div class="cotec-field">
                                <label for="estado">Estado</label>
                                <select id="estado" class="cotec-select">
                                    <option>Disponible</option>
                                    <option>Préstamo activo</option>
                                    <option>En revisión</option>
                                    <option>Reservado</option>
                                </select>
                            </div>

                            <div class="cotec-field" style="grid-column: 1 / -1;">
                                <label for="descripcion">Descripción</label>
                                <textarea id="descripcion" class="cotec-textarea" placeholder="Agrega una breve descripción del libro..."></textarea>
                            </div>
                        </div>

                        <div class="cotec-form-actions">
                            <button type="reset" class="cotec-btn cotec-btn-light">
                                <i class="fa-solid fa-rotate-left"></i> Limpiar
                            </button>
                            <button type="submit" class="cotec-btn cotec-btn-dark">
                                <i class="fa-solid fa-floppy-disk"></i> Guardar libro
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>