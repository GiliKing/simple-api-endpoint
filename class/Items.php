<?php


class Items {

    // set the connection database
    function __construct($db) {
        $this->conn = $db;
    }

    // set all the data for create to store in the database 
    public function setData($name, $description, $price, $category_id, $created) {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->category_id = $category_id;
        $this->created = $created;
    }

    // store all the data in the datbase
    public function create(){
        $name = $this->name;
        $description = $this->description;
        $price = $this->price;
        $category_id = $this->category_id;
        $created = $this->created;

        $createData = "INSERT INTO `items` (`name`, `description`, `price`, `category_id`, `created`) 
                VALUE('$name', '$description', '$price', '$category_id', '$created')";

        $result = mysqli_query($this->conn, $createData);

        if($result) {
            return true;
        } else {
            return false;
        }
    }

    // set id for reading of data
    public function setId($id) {
        $this->id = $id;
    }

    public function read() {
        $id = $this->id;

        if($id == '0') {
            // without single id search
            $getData = "SELECT * FROM `items`";

            $result_all = mysqli_query($this->conn, $getData);
    
            if($result_all) {

                $list_item = [];

                while ($row = mysqli_fetch_array($result_all, MYSQLI_ASSOC)) {
    
                    $name = $row["name"];
                    $description = $row["description"];
                    $price = $row["price"];
                    $category_id = $row["category_id"];
                    $created = $row['created'];
        
                    $total = new stdClass();
        
                    $total->name = $name;
                    $total->description = $description;
                    $total->price = $price;
                    $total->category_id = $category_id;
                    $total->creadted = $created;
        
        
                    Array_push($list_item, $total);
    
                };

                $data = $list_item;

                return $data;
            }

        } else {

            // for single search by id
            $getData = "SELECT * FROM `items` WHERE `id` = '$id' LIMIT 1";

            $result_single = mysqli_query($this->conn, $getData);
    
            if($result_single) {

                if(mysqli_num_rows($result_single) == 1) {

                    $list_item = [];

                    $row = mysqli_fetch_array($result_single, MYSQLI_ASSOC);

                    $name = $row["name"];
                    $description = $row["description"];
                    $price = $row["price"];
                    $category_id = $row["category_id"];
                    $created = $row['created'];
        
                    $total = new stdClass();
        
                    $total->name = $name;
                    $total->description = $description;
                    $total->price = $price;
                    $total->category_id = $category_id;
                    $total->creadted = $created;
        
        
                    Array_push($list_item, $total);

                    $data = $list_item;

                    return $data;
                }

            }
        }
    }
}
?>