<?php

use App\Http\Controllers\api\v1\PostApiController;

use Illuminate\Support\Facades\Route;


// //Restful api
// //api add in app.php

Route::prefix('v1')->group(function () {
    Route::apiResource('post', PostApiController::class);

});

