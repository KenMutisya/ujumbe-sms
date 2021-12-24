<?php
use Illuminate\Support\Facades\Route;
use Kenmush\UjumbeSMS\Http\Controllers\UjumbeSMSController;

Route::get('/', [UjumbeSMSController::class,'index']);