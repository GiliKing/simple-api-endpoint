


<?php


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once './config/Database.php';
include_once './class/Country.php';

$database = new Database();
$db = $database->getConnection();


$items = new Items($db);

$checkId = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0';

$getpaginate = (isset($_GET['paginate']) && $_GET['paginate']) ? $_GET['paginate'] : 1;

$getsearch = (isset($_GET['search']) && $_GET['search']) ? $_GET['search'] : 0;

if($checkId == '0' && $getpaginate == '1' && $getsearch == '0') {

    $items->setId($checkId, $getpaginate, $getsearch);

}

if($checkId == '0' && $getpaginate !='1' && $getsearch == '0') {

    $items->setId(null, $getpaginate, null);

}

if($checkId != '0' && $getpaginate =='1' && $getsearch == '0') {

    $items->setId($checkId, null, null);

}

if($checkId == '0' && $getpaginate =='1' && $getsearch != '0') {

    $items->setId(null, null, $getsearch);

}

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