<?php

use App\Http\Controllers\AuthorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::resource('authors', AuthorController::class);
