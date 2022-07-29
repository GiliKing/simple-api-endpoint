<?php



// instanciation of items
class Items {

    // set the connection database
    function __construct($db) {
        $this->conn = $db;
    }

    // set id for reading of data
    public function setId($id, $paginate, $getsearch) {
        $this->id = $id;
        $this->paginate = $paginate;
        $this->search = $getsearch;
    }

    // read event (read by id, paginate, serach)
    public function read() {
        $id = $this->id;
        $paginate = $this->paginate;
        $search = $this->search;

        // return [$id, $paginate];


        if($id == '0') {
            // without single id search
            $getData = "SELECT * FROM `currency`";

            $result_all = mysqli_query($this->conn, $getData);
    
            if($result_all) {

                $list_item = [];

                while ($row = mysqli_fetch_array($result_all, MYSQLI_ASSOC)) {
    
                    $iso_code = $row["iso_code"];
                    $iso_numeric_code = $row["iso_numeric_code"];
                    $common_name = $row["common_name"];
                    $official_name = $row["official_name"];
                    $symbol = $row['symbol'];
        
                    $total = new stdClass();
        
                    $total->iso_code = $iso_code;
                    $total->iso_numeric_code = $iso_numeric_code;
                    $total->common_name = $common_name;
                    $total->official_name = $official_name;
                    $total->symbol = $symbol;
        
        
                    Array_push($list_item, $total);
    
                };

                $data = $list_item;

                return $data;
            }

        }
        
        if($id != '0' && $paginate == null && $search == null){

            // for single search by id
            $getData = "SELECT * FROM `currency` WHERE `id` = '$id' LIMIT 1";

            $result_single = mysqli_query($this->conn, $getData);
    
            if($result_single) {

                if(mysqli_num_rows($result_single) == 1) {

                    $list_item = [];

                    $row = mysqli_fetch_array($result_single, MYSQLI_ASSOC);

                    $iso_code = $row["iso_code"];
                    $iso_numeric_code = $row["iso_numeric_code"];
                    $common_name = $row["common_name"];
                    $official_name = $row["official_name"];
                    $symbol = $row['symbol'];
        
                    $total = new stdClass();
        
                    $total->iso_code = $iso_code;
                    $total->iso_numeric_code = $iso_numeric_code;
                    $total->common_name = $common_name;
                    $total->official_name = $official_name;
                    $total->symbol = $symbol;
        
        
                    Array_push($list_item, $total);

                    $data = $list_item;

                    return $data;
                }

            }
        }


        // if paginate is equal to 1
        if($paginate == '1') {

            $getData = "SELECT * FROM `currency`";

            $result_all = mysqli_query($this->conn, $getData);
    
            if($result_all) {

                $list_item = [];

                while ($row = mysqli_fetch_array($result_all, MYSQLI_ASSOC)) {
    
                    $iso_code = $row["iso_code"];
                    $iso_numeric_code = $row["iso_numeric_code"];
                    $common_name = $row["common_name"];
                    $official_name = $row["official_name"];
                    $symbol = $row['symbol'];
        
                    $total = new stdClass();
        
                    $total->iso_code = $iso_code;
                    $total->iso_numeric_code = $iso_numeric_code;
                    $total->common_name = $common_name;
                    $total->official_name = $official_name;
                    $total->symbol = $symbol;
        
        
                    Array_push($list_item, $total);
    
                };

                $data = $list_item;

                return $data;
            }
        }
        
        if($paginate != '1'  && $id == null && $search == null){

            $no_of_records_per_page = 5;
            $offset = ($paginate - 1) * $no_of_records_per_page;

            $total_pages_query = "SELECT count(*) FROM `currency`";
            $result = mysqli_query($this->conn, $total_pages_query);
            
            if($result) {

                $total_rows = mysqli_fetch_array($result)[0];


                $total_pages = ceil($total_rows/ $no_of_records_per_page);

                $another_query = "SELECT * FROM `currency` LIMIT $offset, $no_of_records_per_page";

                $another_result = mysqli_query($this->conn, $another_query);

                if($another_result) {

                    $list_item = [];


                    while($row = mysqli_fetch_array($another_result, MYSQLI_ASSOC)) {

                        // return $another_result;

                        $iso_code = $row["iso_code"];
                        $iso_numeric_code = $row["iso_numeric_code"];
                        $common_name = $row["common_name"];
                        $official_name = $row["official_name"];
                        $symbol = $row['symbol'];
            
                        $total = new stdClass();
            
                        $total->iso_code = $iso_code;
                        $total->iso_numeric_code = $iso_numeric_code;
                        $total->common_name = $common_name;
                        $total->official_name = $official_name;
                        $total->symbol = $symbol;
            
            
                        Array_push($list_item, $total);

                    }

                    $data = $list_item;

                    return $data;
                }
                
            }
        }


        // search for keywords

        if($search ==  '0') {
             // without single id search
             $getData = "SELECT * FROM `currency`";

             $result_all = mysqli_query($this->conn, $getData);
     
            if($result_all) {
 
                $list_item = [];
 
                while ($row = mysqli_fetch_array($result_all, MYSQLI_ASSOC)) {
     
                    $iso_code = $row["iso_code"];
                    $iso_numeric_code = $row["iso_numeric_code"];
                    $common_name = $row["common_name"];
                    $official_name = $row["official_name"];
                    $symbol = $row['symbol'];
        
                    $total = new stdClass();
        
                    $total->iso_code = $iso_code;
                    $total->iso_numeric_code = $iso_numeric_code;
                    $total->common_name = $common_name;
                    $total->official_name = $official_name;
                    $total->symbol = $symbol;
        
        
                    Array_push($list_item, $total);
     
                };
 
                 $data = $list_item;
 
                return $data;
            }
 
        }

        if($search != '0'  && $id == null && $paginate == null) {

            $getData = "SELECT * FROM `currency` WHERE `official_name` LIKE '%$search%'";

            $result_all = mysqli_query($this->conn, $getData);

            if($result_all) {

                $list_item = [];

                while ($row = mysqli_fetch_array($result_all, MYSQLI_ASSOC)) {
    
                    $iso_code = $row["iso_code"];
                    $iso_numeric_code = $row["iso_numeric_code"];
                    $common_name = $row["common_name"];
                    $official_name = $row["official_name"];
                    $symbol = $row['symbol'];
        
                    $total = new stdClass();
        
                    $total->iso_code = $iso_code;
                    $total->iso_numeric_code = $iso_numeric_code;
                    $total->common_name = $common_name;
                    $total->official_name = $official_name;
                    $total->symbol = $symbol;
        
        
                    Array_push($list_item, $total);
    
                };

                $data = $list_item;

                return $data;

            }
        }
    }

}

?>