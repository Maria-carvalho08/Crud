<?php

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
    return view('welcome');
});

Route::group(["middleware" => ["web"]], function () {
    Route::prefix("admin")->group(function () {
        Route::get("cursos", [App\Http\Controllers\Admin\CursoController::class, "index"])->name("admin.cursos");
        Route::get("cursos/adicionar", [App\Http\Controllers\Admin\CursoController::class, "adicionar"])->name("admin.cursos.adicionar");
        Route::post("cursos/salvar", [App\Http\Controllers\Admin\CursoController::class, "salvar"])->name("admin.cursos.salvar");
        Route::get("cursos/editar/{id}", [App\Http\Controllers\Admin\CursoController::class, "editar"])->name("admin.cursos.editar");
        Route::put("cursos/atualizar/{id}", [App\Http\Controllers\Admin\CursoController::class, "atualizar"])->name("admin.cursos.atualizar");
        Route::get("cursos/deletar/{id}", [App\Http\Controllers\Admin\CursoController::class, "deletar"])->name("admin.cursos.deletar");
    });
});
