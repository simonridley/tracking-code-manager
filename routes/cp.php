<?php

Route::middleware('statamic.cp.authenticated')->group(function () {
    Route::get('/simonridley/trackingcodemanager/', '\Simonridley\TrackingCodeManager\Http\Controllers\TrackingCodeManagerController@index')->name('simonridley.tracking-code-manager.index');
    Route::post('/simonridley/trackingcodemanager/', '\Simonridley\TrackingCodeManager\Http\Controllers\TrackingCodeManagerController@update')->name('simonridley.tracking-code-manager.update');
});
