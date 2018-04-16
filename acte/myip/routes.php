<?php

Route::get('/api/ip/json', 'Acte\Myip\Classes\Myip@json');
Route::get('/api/ip/raw', 'Acte\Myip\Classes\Myip@raw');
