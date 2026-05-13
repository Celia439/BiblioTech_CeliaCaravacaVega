# Mini Manual de Laravel – BiblioTech

Este documento explica cómo funciona **tu proyecto** paso a paso. No es una guía genérica: usa ejemplos sacados de tu propio código.

---

## 1. ¿Qué es Laravel y qué es el MVC?

Laravel organiza el código en tres capas:

| Capa | Carpeta en tu proyecto | Función |
|------|------------------------|---------|
| **M**odelo | `app/Models/` | Habla con la base de datos (tablas, columnas, relaciones). |
| **V**ista | `resources/views/` | Muestra el HTML al usuario (lo que ves en el navegador). |
| **C**ontrolador | `app/Http/Controllers/` | Recibe la petición del usuario, pide datos al Modelo y los envía a la Vista. |

**Flujo típico en tu web:**
1. El usuario escribe `http://localhost:8000/generos`
2. Laravel mira `routes/web.php` y ve que esa URL le toca a `GeneroController@index`
3. El controlador pide los géneros a la base de datos (Modelo `Genero`)
4. El controlador devuelve una vista (`generos.index`) y le pasa los datos
5. Blade (el motor de vistas) genera el HTML final

---

## 2. Rutas (`routes/web.php`)

Las rutas son el "conserje" de tu aplicación: reciben la URL y deciden qué controlador se encarga.

### Ejemplo sencillo
```php
Route::get('/generos', [GeneroController::class, 'index'])->name('generos.index');
```
- `get` → porque el navegador pide la página (método GET).
- `/generos` → la URL que escribe el usuario.
- `[GeneroController::class, 'index']` → clase y método que se ejecutan.
- `->name('generos.index')` → le pones un apodo para usarlo en links (`route('generos.index')`).

### Rutas con middleware (protección)
En tu proyecto hay zonas solo para usuarios logueados:
```php
Route::middleware(['auth','role:lector'])->prefix('usuario')->group(function () {
    Route::get('/cuenta', [UsuarioController::class, 'cuenta']);
    ...
});
```
- `auth` → obliga a estar logueado.
- `role:lector` → tu middleware personalizado (`EnsureUserHasRole`) comprueba que el campo `rol` del usuario sea `lector`.
- `prefix('usuario')` → todas las URLs de dentro empiezan por `/usuario/`.

---

## 3. Controladores (`app/Http/Controllers/`)

Los controladores son clases PHP. Cada método suele responder a una ruta.

### Ejemplo: `GeneroController@index`
```php
public function index(Request $request)
{
    // 1. Pedir TODOS los géneros a la base de datos
    $generos = Genero::all();

    // 2. Ver si la URL trae ?id_genero=3
    $id_genero = $request->query('id_genero');

    if ($id_genero) {
        $generoActivo = Genero::find($id_genero); // busca ese ID
    } else {
        $generoActivo = $generos->first(); // si no hay ID, coge el primero
    }

    // 3. Libros vinculados a ese género (relación many-to-many)
    $libros = $generoActivo ? $generoActivo->libros : collect();

    // 4. Devolver la vista pasándole las variables
    return view('generos.index', compact('generos', 'generoActivo', 'libros'));
}
```

### `compact()`
Es un atajo de PHP. Estas dos líneas son **iguales**:
```php
return view('generos.index', compact('generos', 'generoActivo'));

return view('generos.index', [
    'generos' => $generos,
    'generoActivo' => $generoActivo,
]);
```

### `collect()`
Crea una **colección vacía** de Laravel. Se usa para que `$libros` siempre sea una colección, aunque no haya género activo. Así puedes hacer `$libros->count()` sin que pete.

---

## 4. Modelos (`app/Models/`) y Eloquent

Los modelos representan tablas de la base de datos. Laravel trae un sistema llamado **Eloquent** que te permite hacer consultas sin escribir SQL a mano.

### Configuración de tu modelo `Genero`
```php
class Genero extends Model
{
    protected $table = 'generos';          // nombre de la tabla
    protected $primaryKey = 'id_genero';   // tu clave primaria no es "id", es "id_genero"

    protected $fillable = ['nombre', 'descripcion']; // columnas que se pueden rellenar masivamente

    public function libros()
    {
        return $this->belongsToMany(Libro::class, 'libro_genero', 'id_genero', 'id_libro');
    }
}
```

### Relaciones que usas en tu proyecto
| Relación | Significado | Ejemplo en tu código |
|----------|-------------|----------------------|
| `hasMany` | Uno tiene muchos | `User` tiene muchos `Prestamo` |
| `belongsTo` | Muchos pertenecen a uno | `Prestamo` pertenece a un `User` (lector) |
| `belongsToMany` | Muchos a muchos | `Libro` ↔ `Genero` (tabla intermedia `libro_genero`) |
| `hasOne` | Uno tiene uno | `Prestamo` tiene una `Multa` |

### Consultas útiles que ya usas
```php
Genero::all();              // Todos los registros
Genero::find(3);            // Busca por clave primaria
Libro::limit(6)->get();     // Solo 6 libros
Libro::count();             // Cuántos hay
```

---

## 5. Vistas Blade (`resources/views/`)

Blade es el motor de plantillas de Laravel. Permite mezclar HTML con código PHP de forma limpia.

### Herencia de plantillas: `@extends`, `@section`, `@yield`
Tu web tiene dos "esqueletos" principales:
- `resources/views/layouts/app.blade.php` → web pública (con header y footer)
- `resources/views/layouts/admin.blade.php` → panel del bibliotecario (con sidebar)

**¿Cómo funciona?**
```blade
{{-- layouts/app.blade.php --}}
<html>
<head><title>@yield('title', 'Inicio')</title></head>
<body>
    <header>...</header>
    <main>@yield('content')</main>
    <footer>...</footer>
</body>
</html>
```

```blade
{{-- web/inicio.blade.php --}}
@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <h1>Bienvenido</h1>
@endsection
```

`@extends` dice "úsame como base". `@section('content')` rellena el hueco que dejó `@yield('content')` en el layout.

### Variables en Blade
Cuando el controlador hace:
```php
return view('generos.index', compact('generos', 'generoActivo'));
```
En la vista puedes usar:
```blade
<h1>{{ $generoActivo->nombre }}</h1>
```
Las dobles llaves `{{ }}` escapan el HTML por seguridad (evitan que un usuario malicioso inyecte código).

### Directivas útiles que tienes
```blade
@auth        {{-- solo si hay sesión iniciada --}}
@endauth

@guest       {{-- solo si NO hay sesión --}}
@endguest

@foreach($libros as $libro)
    <p>{{ $libro->titulo }}</p>
@endforeach

@if($libro->imagen)
    <img src="{{ asset('storage/' . $libro->imagen) }}">
@endif
```

### `asset()`
Genera la URL correcta para archivos en la carpeta `public/`:
```blade
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
{{-- Resultado: http://localhost:8000/css/main.css --}}
```

---

## 6. Componentes Blade (`resources/views/components/`)

Los componentes son "piezas reutilizables" de HTML. En tu proyecto tienes:
- `genero-component` → lista de géneros con puntos de navegación
- `libro-component` → tarjetas de libros

### Estructura de un componente
**Vista del componente** (`resources/views/components/libro-component.blade.php`):
```blade
@foreach($libros as $libro)
<div class="tarjeta-item">
    <h3>{{ $libro->titulo }}</h3>
</div>
@endforeach
```

**Clase PHP del componente** (`app/View/Components/LibroComponent.php`):
```php
class LibroComponent extends Component
{
    public function __construct(public $libros)
    {
        // Guarda la variable para usarla en la vista
    }

    public function render()
    {
        return view('components.libro-component');
    }
}
```

### ¿Cómo se usa?
```blade
<x-libro-component :libros="$libros" />
```
- `x-libro-component` → busca automáticamente la clase `LibroComponent` y la vista `libro-component.blade.php`.
- `:libros="$libros"` → le pasa la variable del controlador al componente. **¡Sin esto el componente no la ve!**

### ¿Por qué fallaba tu error de `$generoActivo`?
En `generos/index.blade.php` tenías:
```blade
<x-generoComponent :generos="$generos" />
```
Pero el componente necesitaba `$generoActivo` para pintar el género seleccionado. Como no se lo pasaste, no existía dentro del componente.

**Solución:**
```blade
<x-generoComponent :generos="$generos" :generoActivo="$generoActivo" />
```
Y en la clase PHP del componente:
```php
public function __construct(public $generos, public $generoActivo = null)
```

---

## 7. Login y Autenticación

### ¿Cómo funciona el login en tu proyecto?
**Ruta:**
```php
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'store']);
```

**Controlador (`AuthController`):**
```php
public function store(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        if (Auth::user()->rol === 'bibliotecario') {
            return redirect('/bibliotecario');
        }
        return redirect('/');
    }

    return back()->withErrors([...]);
}
```

- `Auth::attempt($credentials)` → Laravel comprueba email + contraseña en la tabla `users`.
- `session()->regenerate()` → evita ataques de fijación de sesión.
- `Auth::user()` → devuelve el modelo `User` del usuario logueado.
- `Auth::user()->rol` → en tu tabla `users` tienes una columna `rol` (`lector` o `bibliotecario`).

### Logout
```php
public function logout(Request $request)
{
    Auth::logout();                 // olvida al usuario
    $request->session()->invalidate(); // borra la sesión
    $request->session()->regenerateToken(); // nuevo token CSRF
    return redirect('/');
}
```

### Middleware de roles (`EnsureUserHasRole`)
Este archivo filtra quién puede entrar:
```php
public function handle(Request $request, Closure $next, string $role)
{
    if (!$request->user() || $request->user()->rol !== $role) {
        abort(403, "No tienes permiso para acceder a esta zona.");
    }
    return $next($request);
}
```

Está registrado en `bootstrap/app.php` con el alias `role`, por eso puedes poner:
```php
Route::middleware(['auth', 'role:bibliotecario'])->...
```

### Directivas Blade para autenticación
En tus layouts usas:
```blade
@auth
    {{-- muestra "Mi cuenta" y "Cerrar sesión" --}}
@endauth

@guest
    {{-- muestra el botón "Login" --}}
@endguest
```

---

## 8. Migraciones (`database/migrations/`)

Son archivos PHP que definen la **estructura** de las tablas (columnas, tipos, claves foráneas). En tu proyecto tienes:
- `create_users_table.php`
- `create_libros_table.php`
- `create_generos_table.php`
- `create_libro_genero_table.php` (tabla intermedia many-to-many)
- `create_prestamos_table.php`
- etc.

Comandos útiles (para que los conozcas):
```bash
php artisan migrate        # Ejecuta las migraciones pendientes
php artisan migrate:fresh  # Borra todo y recrea las tablas
php artisan db:seed        # Ejecuta los seeders (datos de prueba)
```

---

## 9. Resumen rápido de archivos clave en tu proyecto

| Archivo | Para qué sirve |
|---------|----------------|
| `routes/web.php` | Define las URLs y a qué controlador van. |
| `app/Http/Controllers/*.php` | Lógica: piden datos a la BD y eligen qué vista devolver. |
| `app/Models/*.php` | Representan tablas y sus relaciones. |
| `resources/views/**/*.blade.php` | HTML que ve el usuario. |
| `resources/views/layouts/*.blade.php` | Plantillas base (header, footer, sidebar). |
| `resources/views/components/*.blade.php` | Piezas reutilizables (tarjetas, listas). |
| `app/View/Components/*.php` | Clases PHP que reciben datos para los componentes Blade. |
| `app/Http/Middleware/EnsureUserHasRole.php` | Comprueba que el usuario tenga el rol correcto. |
| `public/css/` y `public/js/` | Archivos estáticos (imágenes, estilos, scripts). |
| `database/migrations/` | Crean las tablas de la base de datos. |
| `database/seeders/` | Rellenan tablas con datos de prueba. |

---

## 10. Errores comunes que ya has visto

| Error | Significado | Solución típica |
|-------|-------------|-----------------|
| `Undefined variable $x` | La vista o componente no recibió `$x`. | Pásala desde el controlador o en la etiqueta del componente. |
| `Attempt to read property on null` | Intentaste usar `->nombre` sobre un objeto que no existe (es `null`). | Comprueba antes: `@if($objeto) ... @endif`. |
| `403 No tienes permiso` | El middleware `role` rechazó al usuario. | Asegúrate de loguearte con el rol correcto. |

---

¡Con esto ya tienes una base sólida para entender todo lo que ocurre en BiblioTech! Si alguna parte te genera dudas, puedes preguntar siempre que quieras.
