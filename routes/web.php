<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SubDepartmentController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\OwnerRoleController;
use App\Http\Controllers\CustodianController;
use App\Http\Controllers\CustodianRoleController;
use App\Http\Controllers\DataUploaderController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\CMSController;
use App\Http\Controllers\ProcessResourceController;
use App\Http\Controllers\ResourceController;


Route::middleware(['guest'])->group(function () {

    Route::view('/', 'welcome')->name('welcome');

    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

Route::middleware(['auth'])->group(function () {
    Route::view('/compliance', 'process/compliance')->name('compliance');
    Route::post('/logout', [LoginController::class, 'destroy'])->name('login.destroy');

    // ------------------- INITIAL SETUP -------------------

    Route::resource('locations', LocationController::class);
    Route::resource('departments', DepartmentController::class);
    Route::resource('sub-departments', SubDepartmentController::class);
    Route::resource('owners', OwnerController::class);
    Route::resource('owner-roles', OwnerRoleController::class);
    Route::get('/upload-owners', [DataUploaderController::class, 'createOwner'])->name('upload.owner.create');
    Route::post('/upload-owners', [DataUploaderController::class, 'uploadOwners'])->name('upload.owners.store');
    Route::resource('custodian-roles', CustodianRoleController::class);
    Route::resource('custodians', CustodianController::class);
    Route::get('/upload-custodians', [DataUploaderController::class, 'createCustodian'])->name('upload.custodians.create');
    Route::post('/upload-custodians', [DataUploaderController::class, 'uploadCustodian'])->name('upload.custodians.store');


    // ------------------- USERS -------------------

    Route::middleware('superadmin')->group(function () {
        Route::resource('users', UserController::class);
    });

    Route::get('/process', [ProcessController::class, 'index'])->name('ciso-process.index');
    Route::get('/process/{process:process_id}', [ProcessController::class, 'show'])->name('process.view.show');

    // ------------------Process Resources-------------------------

    Route::get('/resource/{process:process_id}/checklist/', [ProcessResourceController::class, 'checklist'])->name('process.resource.checklist');
    Route::get('/resource/{process:process_id}/videos/', [ProcessResourceController::class, 'videos'])->name('process.resource.videos');
    Route::get('/video/stream/{resource}', [ProcessResourceController::class, 'stream'])->name('secure.video.stream');
    Route::get('/resource/{process:process_id}/template/', [ProcessResourceController::class, 'template'])->name('process.resource.template');
    Route::get('/resource/template/{resource}', [ProcessResourceController::class, 'pdfTemplate'])->name('process.resource.template.pdf');
    Route::get('/resource/{process:process_id}/glossary/', [ProcessResourceController::class, 'glossary'])->name('process.resource.glossary');
    Route::delete('/resources/{resource}', [ProcessResourceController::class, 'destroy'])->name('process.resource.destroy');

    // ------------MANAGE GRC DOMAIN RESOURCES CONTENT--------------

    Route::resource('cms', CMSController::class);
    Route::get('/create-resource/{process}', [ResourceController::class, 'create'])->name('resource.create');
    Route::post('/upload-resource', [ResourceController::class, 'store'])->name('resource.store');
});
