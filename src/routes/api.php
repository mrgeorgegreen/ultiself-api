<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HabitsController;

Route::get('/habits',
    [HabitsController::class, 'habits']
);
