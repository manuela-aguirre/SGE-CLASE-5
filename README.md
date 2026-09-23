# SGE — Sistema de Gestión de Biblioteca


##  Descripción

Es una aplicación web desarrollada como proyecto académico para gestionar información bibliográfica de la institución COTECNOVA, tomando como base nuestro proyecto de grado del Técnico.

El sistema está construido utilizando en **Laravel** y sigue una arquitectura basada en modelos, controladores y vistas en clase.


##  Tecnologías utilizadas

| Tecnología       | Uso                                        |
| ---------------- | ------------------------------------------ |
| **PHP 8.3+**     | Lenguaje principal                         |
| **Laravel 13**   | Framework backend                          |
| **SQLite**       | Base de datos                              |
| **Laravel Sail** | Entorno de desarrollo con Docker           |
| **Blade**        | Motor de plantillas                        |
| **Tailwind CSS** | Diseño de interfaz                         |
| **Alpine.js**    | Interactividad en el frontend              |
| **Vite**         | Compilación de recursos                    |
| **Composer**     | Gestión de dependencias PHP                |
| **NPM**          | Gestión de dependencias frontend           |
| **Docker**       | Contenedores para el entorno de desarrollo |

---

## Requisitos

Antes de instalar el proyecto se recomienda contar con:

* PHP 8.3 o superior.
* Composer.
* Node.js y NPM.
* Docker Desktop.
* WSL2 en Windows.
* Git.

Si se utiliza **Laravel Sail**, Docker debe estar ejecutándose antes de iniciar los contenedores.

---

##  Instalación

### 1. Clonar el repositorio

```bash
git clone https://github.com/manuela-aguirre/SGE-CLASE-5.git
cd SGE-CLASE-5
```

### 2. Instalar las dependencias de Laravel

```bash
composer install
```

### 3. Crear el archivo de configuración

Copiar el archivo `.env.example`:

```bash
cp .env.example .env
```

En Windows PowerShell también puede utilizarse:

```powershell
Copy-Item .env.example .env
```

### 4. Generar la clave de la aplicación

```bash
php artisan key:generate
```

### 5. Instalar las dependencias de frontend

```bash
npm install
```

### 6. Ejecutar las migraciones

```bash
php artisan migrate
```

### 7. Iniciar el servidor de desarrollo

```bash
php artisan serve
```

La aplicación estará disponible normalmente en:

```text
http://localhost:80
```

# Estructura del proyecto

La estructura principal de la aplicación es:

```text
SGE-CLASE-5/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   └── Requests/
│   │
│   ├── Models/
│   │   ├── Editorial.php
│   │   ├── Genero.php
│   │   ├── Libro.php
│   │   └── User.php
│   │
│   └── Providers/
│
├── bootstrap/
│
├── config/
│
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
│
├── public/
│
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│
├── routes/
│   ├── auth.php
│   └── web.php
│
├── storage/
│
├── tests/
│
├── .env.example
├── artisan
├── composer.json
├── package.json
└── README.md
```

---

#  Modelo de datos

El sistema utiliza principalmente tres entidades para representar la información bibliográfica.

### Editorial

Representa las casas editoriales asociadas a los libros.

```text
editorials
├── id
├── nombre
├── created_at
└── updated_at
```

### Género

Representa las categorías o áreas temáticas de los libros.

```text
generos
├── id
├── nombre
├── created_at
└── updated_at
```

### Libro

Representa los libros disponibles en el catálogo.

```text
libros
├── id
├── titulo
├── descripcion
├── portada_url
├── stock
├── isbn
├── editorial_id
├── genero_id
├── created_at
└── updated_at
```


#  Relaciones entre entidades

El modelo de datos utiliza relaciones **uno a muchos (1:N)**.

### Editorial → Libros

Una editorial puede tener múltiples libros y cada libro pertenece a una editorial.

```text
Editorial
    │
    └─── 1:N ───> Libro
```

En Laravel:

```php
// Editorial.php

public function libros()
{
    return $this->hasMany(Libro::class);
}
```

Y en `Libro`:

```php
public function editorial()
{
    return $this->belongsTo(Editorial::class);
}
```

### Género → Libros

Un género puede estar asociado a múltiples libros.

```text
Genero
   │
   └─── 1:N ───> Libro
```

En Laravel:

```php
// Genero.php

public function libros()
{
    return $this->hasMany(Libro::class);
}
```

En `Libro`:

```php
public function genero()
{
    return $this->belongsTo(Genero::class);
}
```

---

#  Modelo Libro

El modelo `Libro` permite almacenar:

* Título.
* Descripción.
* URL de portada.
* Cantidad disponible en stock.
* ISBN.
* Editorial.
* Género.

Los atributos que pueden asignarse mediante asignación masiva son:

```php
protected $fillable = [
    'titulo',
    'descripcion',
    'portada_url',
    'stock',
    'isbn',
    'editorial_id',
    'genero_id',
];
```


#  Autenticación

El proyecto incorpora autenticación mediante **Laravel Breeze**.

Entre las funcionalidades disponibles se encuentran:

* Registro de usuarios.
* Inicio de sesión.
* Cierre de sesión.
* Recuperación de contraseña.
* Confirmación de contraseña.
* Verificación de correo electrónico.
* Actualización del perfil.

Las rutas protegidas requieren autenticación (Dashboard).

---

#  Dashboard

Después de iniciar sesión, el usuario puede acceder al **Panel de Control**.

La ruta principal del dashboard es:

```text
/dashboard
```

Esta ruta está protegida mediante:

```php
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
```

La interfaz utiliza una identidad visual basada en los colores de **COTECNOVA**.

---

#  Rutas principales

Actualmente el proyecto cuenta, entre otras, con las siguientes rutas:

| Método        | Ruta                        | Descripción              |
| ------------- | --------------------------- | ------------------------ |
| GET           | `/`                         | Página principal         |
| GET           | `/dashboard`                | Panel de control         |
| GET           | `/profile`                  | Edición del perfil       |
| PATCH         | `/profile`                  | Actualización del perfil |
| DELETE        | `/profile`                  | Eliminación del perfil   |
| GET/POST/etc. | `/login`, `/register`, etc. | Autenticación            |

Las rutas relacionadas con autenticación se encuentran en:

```text
routes/auth.php
```

Las rutas generales de la aplicación se encuentran en:

```text
routes/web.php
```

---

#  Seeders

El proyecto incluye seeders vistos en clase destinados a generar información inicial para la base de datos:

```text
database/seeders/
├── DatabaseSeeder.php
├── EditorialSeeder.php
├── GeneroSeeder.php
└── LibroSeeder.php
```

El `DatabaseSeeder` está preparado para ejecutar:

```php
$this->call([
    GeneroSeeder::class,
    EditorialSeeder::class,
    LibroSeeder::class,
]);
```

Además, se crea un usuario de prueba:

```text
Nombre: Test User
Correo: test@example.com
```

Para ejecutar los seeders:

```bash
php artisan db:seed
```

O utilizando Sail:

```bash
./vendor/bin/sail artisan db:seed
```


# ⚙️ Comandos útiles

### Iniciar servidor Laravel

```bash
php artisan serve
```

### Ver las rutas disponibles

```bash
php artisan route:list
```

### Ver el estado de las migraciones

```bash
php artisan migrate:status
```

### Ejecutar migraciones

```bash
php artisan migrate
```

### Ejecutar pruebas

```bash
php artisan test
```

### Abrir Tinker

```bash
php artisan tinker
```

### Compilar frontend

```bash
npm run build
```

### Ejecutar Vite en desarrollo

```bash
npm run dev
```

