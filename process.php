<?php
require 'vendor/autoload.php';

use Aws\DynamoDb\DynamoDbClient;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect user data from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $country = $_POST['country'];

    // Create DynamoDB client
    $client = new DynamoDbClient([
        'version' => 'latest',
        'region' => 'us-east-1',
        'credentials' => [
            'key' => 'ACCESSKEY',
            'secret' => 'SECRETKEY'
        ]
    ]);

    // Prepare DynamoDB item
    $params = [
        'TableName' => 'GuestBook2',
        'Item' => [
            'userId' => [
                'S' => uniqid()
            ],
            'name' => [
                'S' => $name
            ],
            'email' => [
                'S' => $email
            ],
            'country' => [
                'S' => $country
            ]
        ]
    ];

    try {
        $result = $client->putItem($params);
        echo 'User added successfully!<br>';
        echo '<button onclick="window.location.href=\'/\'">Return Home</button>';
    } catch (Exception $e) {
        echo 'Error adding user: ' . $e->getMessage() . '<br>';
        echo '<button onclick="window.location.href=\'/\'">Return Home</button>';
    }

    

}