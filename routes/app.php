

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortUrlController;


Route::middleware('auth')->group(function (){

Route::get('/short_urls', [ShortUrlController::class , 'list'])
->name('short_urls.list');


Route::get('/short_urls/create' , [ShortUrlController::class,  'create'])
->name('short_urls.create');

Route::post('/short_urls', [ShortUrlController::class , 'store'])
->name('short_urls.store');


Route::get('/{code}', [ShortUrlController::class, 'redirect'])
    ->name('short_urls.redirect');



});

?>