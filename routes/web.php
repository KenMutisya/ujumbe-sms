<?php

use Kenmush\UjumbeSMS\Http\Controllers\UjumbeSMSController;

Route::get('/', [UjumbeSMSController::class, 'index']);