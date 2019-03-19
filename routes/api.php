<?php

Route::resource("meeting", "meetingController", [
    "except" => ["edit", "create"]
]);
Route::resource("meeting/registration", "RegistrationController", [
    "only" => ["store", "destroy"]
]);

Route::group(["prefix" => 'user'], function () {
    Route::resource("/", "userController");
//
//    Route::post("signin", "userController@signin");
});


