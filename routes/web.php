<?php
/* php artisan route:list para ver las rutas que hay hasta el momento */

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
    Route::get    | Consultar
    Route::post   | Guardar
    Route::delete | Eliminar
    Route::put    | Actualizar
*/

/* Route::get('/', function () {
    return view('welcome');
}); */

//http://127.0.0.1:8000/buscar?query=php   | {"query":"php"}
Route::get('buscar', function (Request $request) {
    return $request->all();
});


/* Route::get('blog', [PageController::class, 'blog'])->name('blog');

//{slug} parametro ingresado por un usuario en la url
Route::get('blog/{slug}', [PageController::class, 'post'])->name('post');

Route::get('/', [PageController::class, 'home'])->name('home');
 */

Route::controller(PageController::class)->group(function () {
    Route::get('blog', 'blog')->name('blog');

    //{slug} parametro ingresado por un usuario en la url
    Route::get('blog/{post:slug}', 'post')->name('post');

    Route::get('/', 'home')->name('home');
});

/* composer require laravel/breeze --dev para traer el paquete breeze a las opciones de laravel

php artisan breeze:install para instalar breeze que es un inicio de sesion, tener cuidado porque elimina todo lo que haya en routes/web.php, si despues de instalado no ha bajo node_modules: npm install && npm run dev */

//se realiza redireccion de dashboard a posts porque no se esta utilizando y el middleware se corre a posts
Route::redirect('dashboard','posts')->name('dashboard');

//crea un crud completo de posts, php artisan route:list muestra las rutas que hay creadas
Route::resource('posts', PostController::class)->middleware(['auth', 'verified'])->except('show');
require __DIR__.'/auth.php';
