<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    // return view('welcome');
    $users = User::where('id', 1)->first();


    // $user = User::create([

    //     'name' => 'Bello',
    //     'email' => 'sule@mailinator.com',
    //     'password' => 'password'
    // ]);

    // $user = User::find(6);
    // $user->update([
    //     'email' => 'qtip@mailinator.com',
    // ]);


    // $user = User::find(6);
    // $user->delete();

    dd($users);
    // $users = DB::insert("insert into users (name, email, password) values (?,?,?)", [
    //     'Bello', 'bello@mailinator.com', 'password'
    // ]);

    // $user = DB::update("update users set email=?  where id=?" , [
    //     'russ@mailinator.com',
    //     3
    // ]);

    // $user = DB::table('users')->insert([

    //     'name' => 'Bello',
    //     'email' => 'yomi@mailinator.com',
    //     'password' => 'password'
    // ]);

    // $user =DB::table('users')->where('id' , 4)->update(['email' => 'abcd@gmail.com']);

    // $user = DB::table('users')->where('id' , 4)->delete();
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
