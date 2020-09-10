<?php

Route::middleware('web')->group(function () {
    Route::get('/simonridley/trackingcodemanager/', 'TrackingCodeManagerController@index')->name('simonridley.tracking-code-manager.index');
    Route::post('/simonridley/trackingcodemanager/', 'TrackingCodeManagerController@update')->name('simonridley.tracking-code-manager.update');
});
