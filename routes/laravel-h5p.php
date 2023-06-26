<?php

Route::prefix('admin/h5p')->group(function () {
    Route::group(['middleware' => ['web']], function () {
        if (config('laravel-h5p.use_router') == 'EDITOR' || config('laravel-h5p.use_router') == 'ALL') {
            Route::resource('h5p', "Hareom284\LaravelH5p\Http\Controllers\H5pController");
            Route::group(['middleware' => ['auth']], function () {
                Route::get(
                    'library',
                    "Hareom284\LaravelH5p\Http\Controllers\LibraryController@index"
                )->name('h5p.library.index');
                Route::get(
                    'library/show/{id}',
                    "Hareom284\LaravelH5p\Http\Controllers\LibraryController@show"
                )->name('h5p.library.show');
                Route::post(
                    'library/store',
                    "Hareom284\LaravelH5p\Http\Controllers\LibraryController@store"
                )->name('h5p.library.store');
                Route::delete(
                    'library/destroy',
                    "Hareom284\LaravelH5p\Http\Controllers\LibraryController@destroy"
                )->name('h5p.library.destroy');
                Route::get(
                    'library/restrict',
                    "Hareom284\LaravelH5p\Http\Controllers\LibraryController@restrict"
                )->name('h5p.library.restrict');
                Route::post(
                    'library/clear',
                    "Hareom284\LaravelH5p\Http\Controllers\LibraryController@clear"
                )->name('h5p.library.clear');
            });

            // ajax
            Route::match(
                ['GET', 'POST'],
                'ajax/libraries',
                'Hareom284\LaravelH5p\Http\Controllers\AjaxController@libraries'
            )->name('h5p.ajax.libraries');
            Route::get('ajax', 'Hareom284\LaravelH5p\Http\Controllers\AjaxController')->name('h5p.ajax');
            Route::get(
                'ajax/libraries',
                'Hareom284\LaravelH5p\Http\Controllers\AjaxController@libraries'
            )->name('h5p.ajax.libraries');
            Route::get(
                'ajax/single-libraries',
                'Hareom284\LaravelH5p\Http\Controllers\AjaxController@singleLibrary'
            )->name('h5p.ajax.single-libraries');
            Route::get(
                'ajax/content-type-cache',
                'Hareom284\LaravelH5p\Http\Controllers\AjaxController@contentTypeCache'
            )->name('h5p.ajax.content-type-cache');
            Route::post(
                'ajax/library-install',
                'Hareom284\LaravelH5p\Http\Controllers\AjaxController@libraryInstall'
            )->name('h5p.ajax.library-install');
            Route::post(
                'ajax/library-upload',
                'Hareom284\LaravelH5p\Http\Controllers\AjaxController@libraryUpload'
            )->name('h5p.ajax.library-upload');
            Route::post(
                'ajax/rebuild-cache',
                'Hareom284\LaravelH5p\Http\Controllers\AjaxController@rebuildCache'
            )->name('h5p.ajax.rebuild-cache');
            Route::post('ajax/files', 'Hareom284\LaravelH5p\Http\Controllers\AjaxController@files')->name('h5p.ajax.files');
            Route::post(
                'ajax/finish',
                'Hareom284\LaravelH5p\Http\Controllers\AjaxController@finish'
            )->name('h5p.ajax.finish');
            Route::post(
                'ajax/content-user-data',
                'Hareom284\LaravelH5p\Http\Controllers\AjaxController@contentUserData'
            )->name('h5p.ajax.content-user-data');

            //nonce
            Route::match(['GET', 'POST'], 'ajax/{nonce}/libraries', 'Hareom284\LaravelH5p\Http\Controllers\AjaxController@libraries');
            Route::post('ajax/{nonce}/files', 'Hareom284\LaravelH5p\Http\Controllers\AjaxController@files');
            Route::get('ajax/{nonce}/libraries', 'Hareom284\LaravelH5p\Http\Controllers\AjaxController@libraries');
            Route::get('ajax/{nonce}/single-libraries', 'Hareom284\LaravelH5p\Http\Controllers\AjaxController@singleLibrary');
        }

        // export
        //    if (config('laravel-h5p.use_router') == 'EXPORT' || config('laravel-h5p.use_router') == 'ALL') {
        Route::get('h5p/embed/{id}', 'Hareom284\LaravelH5p\Http\Controllers\EmbedController')->name('h5p.embed');
        Route::get('h5p/export/{id}', 'Hareom284\LaravelH5p\Http\Controllers\DownloadController')->name('h5p.export');
        //    }
    });
});

Route::get('h5p/embed/{id}', 'Hareom284\LaravelH5p\Http\Controllers\EmbedController')->name('h5p.embed.client');

Route::get('/', function () {
    return 'hello world';
});
