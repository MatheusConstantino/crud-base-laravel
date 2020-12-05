<?php

//Rotas caso comandos laravel venham a falhar, comandos como "autoload", "install", "clear cache" entre outros

//Clear Cache facade value:
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function () {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function () {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function () {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function () {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function () {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});




Auth::routes();

        //Rota da home
        Route::get('/', 'Site\FormContatoController@cadastro')->name('cadastro');
        Route::get('/home', 'Site\FormContatoController@cadastro')->name('cadastro');

        //Rotas de cadastro de usuário
        Route::get('/cadastro', 'Site\FormContatoController@cadastro')->name('cadastro');
        Route::post('/cadastro-send', 'Site\FormContatoController@enviaContato')->name('enviaContato');

        //Rotas de cadastro de conta, Id utilizado é referente ao usuário
        Route::get('/conta/{id}', 'Site\FormContatoController@conta')->name('conta');
        Route::post('/conta-send', 'Site\FormContatoController@enviaConta')->name('enviaConta');

        //Rotas de entrada e saida
        Route::post('/entrada-send', 'Site\BalanceController@enviaEntrada')->name('enviaEntrada');
        Route::post('/saida-send', 'Site\BalanceController@enviaSaida')->name('enviaSaida');

        //Rotas para extrato, Id usado nesta rota é referente a conta
        //Dentro dessa tela, as contas são feitas em JS conforme solicitado
        Route::get('/extrato/{id}', 'Site\BalanceController@extrato')->name('extrato');

