<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


// Get all customers
$app->get('/api/customers', function(Request $request, Response $response){
    $sql = "SELECT * FROM customers";

    try{
        $db = DB::connect();
        $stmt = $db->query($sql);
        $customers = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;

        echo json_encode($customers);

    }catch (PDOException $e)
    {
        echo '{"error" : {"text": '.$e->getMessage().'}}';
    }

});


// Get a single customer data
$app->get('/api/customer/{id}', function(Request $request, Response $response){
    $id = $request->getAttribute('id');

    $sql = "SELECT * FROM customers WHERE id = :id";

    try{
        $db = DB::connect();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $customer = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;

        echo json_encode($customer);

    }catch (PDOException $e)
    {
        echo '{"error" : {"text": '.$e->getMessage().'}}';
    }

});


// Get a single customer data
$app->post('/api/customer/add', function(Request $request, Response $response)
{
    $first_name = $request->getParam('first_name');
    $last_name = $request->getParam('last_name');
    $phone = $request->getParam('phone');
    $email = $request->getParam('$email');
    $address = $request->getParam('address');
    $city = $request->getParam('city');
    $state = $request->getParam('state');

    $sql = "INSERT INTO customers (first_name, last_name, phone, email, address, city, state) VALUES 
            (:first_name, :last_name, :phone, :email, :address, :city, :state)";

    try{
        $db = DB::connect();
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':first_name'   =>  $first_name,
            ':last_name'    =>  $last_name,
            ':phone'        =>  $phone,
            ':email'        =>  $email,
            ':address'      =>  $address,
            ':city'         =>  $city,
            ':state'        =>  $state
        ]);

        echo '{"notice": {"text": "Customer Added"}}';

    }catch (PDOException $e)
    {
        echo '{"error" : {"text": '.$e->getMessage().'}}';
    }

});












