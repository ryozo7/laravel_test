<?php
<<<<<<< HEAD
//使いたいコントローラーとRouteファサードを必ず記述
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoListController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
=======

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChirpController;
use Illuminate\Support\Facades\Route;

>>>>>>> origin/main
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

<<<<<<< HEAD
// Route::get('/', [TaskController::class, 'index']); //一覧表示
// Route::post('/create', [TaskController::class, 'create']); //タスク追加
// Route::post('/edit', [TaskController::class, 'edit']); //タスク更新
// Route::post('/delete', [TaskController::class, 'delete']); //タスク削除

=======
>>>>>>> origin/main
Route::get('/', function () {
    return view('welcome');
});

<<<<<<< HEAD
Route::resource('tasks', TaskController::class);


=======
>>>>>>> origin/main
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

<<<<<<< HEAD
=======
Route::resource('chirps', ChirpController::class)
    ->only(['index', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

>>>>>>> origin/main
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
