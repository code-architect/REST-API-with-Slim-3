<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


// Get all customers
$app->get('/api/customers', function(Request $request, Response $response){
    echo 'customers';
});