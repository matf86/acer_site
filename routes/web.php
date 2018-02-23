<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', ['as' => 'o_nas', function() {

    $data = \Symfony\Component\Yaml\Yaml::parse(file_get_contents(__DIR__.'/../resources/content/home-page.yaml'));

    return view('home-page', ['data' => $data]);
}]);

$router->get('/worki_pape', [ 'as' => 'worki_pape', function() {

    $data = \Symfony\Component\Yaml\Yaml::parse(file_get_contents(__DIR__.'/../resources/content/product_pape.yaml'));

    return view('product', ['data' => $data]);
}]);

$router->get('/worki_termokurczliwe', [ 'as' => 'worki_termo', function() {

    $data = \Symfony\Component\Yaml\Yaml::parse(file_get_contents(__DIR__.'/../resources/content/product_termo.yaml'));

    return view('product', ['data' => $data]);
}]);

$router->get('/kontakt', ['as' => 'kontakt', function () {

    $data = \Symfony\Component\Yaml\Yaml::parse(file_get_contents(__DIR__.'/../resources/content/contact_page.yaml'));

    return view('contact',  ['data' => $data]);
}]);

$router->post('/kontakt', 'ContactFormController@sendContactMessage');