<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MatpelController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\NilaiMatpelController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\HomeController;
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

Route::get("/", [HomeController::class, "index"])->name("home");
Route::get("/tentang", [HomeController::class, "tentang"])->name("tentang");
Route::get("/raport", [HomeController::class, "rapor"])->name("raport");
Route::post("/raport/cetak/", [HomeController::class, "cetak_rapor"])->name("cetak-rapor");

Route::prefix("blog")->group(function(){
    Route::get("detail/{slug}", [HomeController::class, "artikel"])->name("detail-artikel");
    Route::get("penelusuran", [HomeController::class, "search"])->name("penelusuran");
});

Route::prefix("login")->group(function(){
    Route::get("/", [UserController::class, "login"])->name("login");
    Route::post("process", [UserController::class, "do_login"])->name("proses-login");
    Route::get("out", [UserController::class, "logout"])->name("logout");
});

Route::prefix("dashboard")->middleware("auth")->group(function(){

    // artikel
    Route::prefix("artikel")->group(function(){
        Route::get("/", [ArtikelController::class, "index"])->name("list-artikel");
        Route::get("create", [ArtikelController::class, "create"])->name("create-artikel");
        Route::post("insert", [ArtikelController::class, "store"])->name("insert-artikel");
        Route::get("edit/{id}", [ArtikelController::class, "edit"])->name("edit-artikel");
        Route::put("put/{id}", [ArtikelController::class, "put"])->name("update-artikel");
        Route::delete("delete/{id}", [ArtikelController::class, "destroy"])->name("delete-artikel");
    });

    // guru
    Route::prefix("guru")->group(function(){

        Route::get("home", [GuruController::class, "index"])->name("home-guru");

        Route::get("/", [UserController::class, "index"])->name("list-guru");
        Route::post("insert", [UserController::class, "store"])->name("insert-guru");
        Route::delete("delete/{id}", [UserController::class, "destroy"]);
        Route::get("detail/{id}", [UserController::class, "detail"]);
        Route::post("update/{id}", [UserController::class, "put"])->name("update-guru");
        Route::get("search/{query}", [UserController::class, "search"])->name("search-guru");
        Route::get("edit/{id}", [GuruController::class, "put"])->name("edit-guru");
        Route::put("ubah/{id}", [GuruController::class, "update"])->name('ubah-data-guru');

        // siswa yang terdaftar di mata pelajaran
        Route::prefix("matpel")->group(function(){
            Route::get("siswa/{matpelId}", [GuruController::class, "murid_matpel"])->name("list-siswa-matpel");

            // nilai
            Route::prefix("nilai")->group(function(){
                Route::get("input/{matpelId}/{muridId}", [NilaiMatpelController::class, "index"])->name("input-nilai-matpel");
                Route::post("insert", [NilaiMatpelController::class, "store"])->name("insert-nilai-matpel");
                Route::get("edit/{matpelId}/{muridId}", [NilaiMatpelController::class, "show"])->name("edit-nilai-matpel");
                Route::put("update/{id}", [NilaiMatpelController::class, "put"])->name("update-nilai-matpel");
            });
        });


        // absensi siswa yang terdaftar dikelas yang guru bimbing
        Route::prefix("absensi")->group(function(){
            Route::get("murid/{kelasId}", [AbsenController::class, "index"])->name("list-absensi");
            Route::get('input/{muridId}', [AbsenController::class, "show"])->name("input-nilai-absen");
            Route::post("create", [AbsenController::class, "store"])->name("insert-nilai-absensi");
            Route::get("update/{id}", [AbsenController::class, "put"])->name("update-nilai-absen");
            Route::put("edit/{id}", [AbsenController::class, "update"])->name("edit-nilai-absen");
        });
    });

    // kelas
    Route::prefix("kelas")->group(function(){
        Route::get("/", [KelasController::class, "index"])->name("list-kelas");
        Route::post("insert", [KelasController::class, "store"])->name("insert-kelas");
        Route::delete("delete/{id}", [KelasController::class, "destroy"])->name("delete-kelas");
        Route::get("detail/{id}", [KelasController::class, "show"])->name("detail-kelas");
        Route::put("/update/{id}", [KelasController::class, "put"])->name("update-kelas");
        Route::get("search/{query}", [KelasController::class, "search"]);
    });

    // matpel
    Route::prefix("matpel")->group(function(){
        Route::get("/", [MatpelController::class, "index"])->name("list-matpel");
        Route::post("insert", [MatpelController::class, "store"])->name("insert-matpel");
        Route::delete("delete/{id}", [MatpelController::class, "destroy"]);
        Route::get("detail/{id}", [MatpelController::class, "show"]);
        Route::put("update/{id}", [MatpelController::class, "put"]);
    });

    // murid
    Route::prefix("murid")->group(function(){
        Route::get("/", [MuridController::class, "index"])->name("list-murid");
        Route::get("create", [MuridController::class, "show"])->name("create-murid");
        Route::post("insert", [MuridController::class, "store"])->name("insert-murid");
        Route::delete("delete/{id}", [MuridController::class, "destroy"]);
        Route::get("edit/{id}", [MuridController::class, "put"])->name("edit-murid");
        Route::put("update/{id}", [MuridController::class, "edit"])->name("update-murid");
        Route::get("detail/{id}", [MuridController::class, "detail"]);
        Route::put("pindah/{id}", [MuridController::class, "pindah_kelas"]);
    });

    // semester
    Route::prefix("semester")->group(function(){
        Route::get("/", [SemesterController::class, "index"])->name("list-semester");
        Route::post("insert", [SemesterController::class, "store"])->name("insert-semester");
        Route::delete("delete/{id}", [SemesterController::class, "destroy"]);
        Route::put("status/{status}/{id}", [SemesterController::class, "status"]);
    });

    // administrator
    Route::prefix("admin")->group(function(){
        Route::get("/", [AdminController::class, "index"])->name("list-admin");
        Route::get("create", [AdminController::class, "create"])->name("create-admin");
        Route::post("insert", [AdminController::class, "store"])->name("insert-admin");
        Route::get("edit/{id}", [AdminController::class, "show"])->name("edit-admin");
        Route::put("update/{id}", [AdminController::class, "put"])->name("update-admin");
    });
});