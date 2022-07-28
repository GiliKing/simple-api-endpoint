

<?php


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/Database.php';
include_once '../class/Items.php';

$database = new Database();
$db = $database->getConnection();


$items = new Items($db);

$checkId = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0';

$items->setId($checkId);

if($items->read()) {

    $data = $items->read();
    http_response_code(200);     
    echo json_encode($data);

} else {   

    http_response_code(404);     
    echo json_encode(
        array("message" => "No item found.")
    );
}



?>