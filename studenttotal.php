<?php
use Aws\DynamoDb\DynamoDbClient;

$client = new DynamoDbClient([
    'version' => 'latest',
    'region' => 'us-east-1',
    'credentials' => [
        'key' => 'ACCESSKEY',
        'secret' => 'SECRETKEY'
    ]
]);


$params = [
    'TableName' => 'GuestBook2'
];

$result = $client->scan($params);
$totalStudents = count($result['Items']);

echo json_encode(['totalStudents' => $totalStudents]);