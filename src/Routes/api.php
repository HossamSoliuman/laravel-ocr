<?php

use Hossam\LaravelOcr\Controllers\OfflineOcrController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function () {
    Route::post('offline-ocr/image', [OfflineOcrController::class, 'image']);
    Route::get('offline-ocr/languages', [OfflineOcrController::class, 'languages']);
});
