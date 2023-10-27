<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;
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
    $data = array();
    for ($i=990; $i < 1000; $i++) { 
        $response = Http::get('https://prediction.cryptocoindailypress.com/api/adsmanegement/'.$i);
        $status = $response->status();
        $body= $response->body();
        $collection  = $response->collect();
        echo $i;
        if($collection['success'] == 1){
            $data[] = $i;
        }
    }
    $output = '[' . implode(',', $data) . ']';
    dd($output);
});
