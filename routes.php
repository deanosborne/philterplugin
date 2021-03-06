<?php

/**
 * Class to filer requests to the required methods.
 */
$api = new deanosborne\Philter\Classes\Api();

Route::options('/{any}', function() {
    $headers = [
        'Access-Control-Allow-Methods'=> 'POST, GET, OPTIONS, PUT, DELETE',
        'Access-Control-Allow-Headers'=> 'X-Requested-With, Content-Type, X-Auth-Token, Origin, Authorization'
    ];
    return \Response::make('You are connected to the API', 200, $headers);
})->where('any', '.*');

Route::options('api/v1/{all}', function() {
    if (Request::getMethod() == "OPTIONS") {
        echo('You are connected to the API');
        die();
    }
});

Route::options('api/v1/{any}/{all}', function() {
    if (Request::getMethod() == "OPTIONS") {
        echo('You are connected to the API');
        die();
    }
});

Route::get('api/v1/images', function() use ($api) {
    return $api->getImages();
});

Route::post('api/v1/login', function() use ($api) {
    return $api->login();
});

Route::post('api/v1/logout', function() use ($api) {
    return $api->logout();
});

Route::post('api/v1/registerUser/', function() use ($api) {
    return $api->registerUser();
});

Route::get('api/v1/images/user', function() use ($api) {
    return $api->getUserImages();
});

Route::get('api/v1/users', function() use ($api) {
    return $api->getUser();
});
Route::post('api/v1/addImage', function() use ($api) {
    return $api->addImage();
});

Route::get('api/v1/images/latest', function() use ($api) {
    return $api->getLatestImages();
});

// from module5
Route::delete('api/v1/users/delete/{image_id}', function($image_id) use ($api) {
   return $api->deleteImage($image_id);
});

Route::get('api/v1/images/others', function() use ($api) {
    return $api->getOthersImages();
});