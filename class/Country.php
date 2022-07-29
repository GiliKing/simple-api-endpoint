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
            $getData = "SELECT * FROM `country`";

            $result_all = mysqli_query($this->conn, $getData);
    
            if($result_all) {

                $list_item = [];

                while ($row = mysqli_fetch_array($result_all, MYSQLI_ASSOC)) {
    
                    $continent = $row["continent"];
                    $currency_code = $row["currency_code"];
                    $iso2_code = $row["iso2_code"];
                    $iso3_code = $row["iso3_code"];
                    $iso_numeric_code = $row['iso_numeric_code'];
                    $fips_code = $row['fips_code'];
                    $calling_code = $row['calling_code'];
                    $common_name = $row['common_name'];
                    $official_name = $row['official_name'];
                    $endonym = $row['endonym'];
                    $demonym = $row['demonym'];
        
                    $total = new stdClass();
        
                    $total->continent = $continent;
                    $total->currency_code = $currency_code;
                    $total->iso2_code = $iso2_code;
                    $total->iso3_code = $iso3_code;
                    $total->iso_numeric_code = $iso_numeric_code;
                    $total->fips_code = $fips_code;
                    $total->calling_code = $calling_code;
                    $total->common_name = $common_name;
                    $total->official_name = $official_name;
                    $total->endonym = $endonym;
                    $total->demonym = $demonym;
        
        
                    Array_push($list_item, $total);
    
                };

                $data = $list_item;

                return $data;
            }

        }
        
        if($id != '0' && $paginate == null && $search == null){

            // for single search by id
            $getData = "SELECT * FROM `country` WHERE `id` = '$id' LIMIT 1";

            $result_single = mysqli_query($this->conn, $getData);
    
            if($result_single) {

                if(mysqli_num_rows($result_single) == 1) {

                    $list_item = [];

                    $row = mysqli_fetch_array($result_single, MYSQLI_ASSOC);

                    $continent = $row["continent"];
                    $currency_code = $row["currency_code"];
                    $iso2_code = $row["iso2_code"];
                    $iso3_code = $row["iso3_code"];
                    $iso_numeric_code = $row['iso_numeric_code'];
                    $fips_code = $row['fips_code'];
                    $calling_code = $row['calling_code'];
                    $common_name = $row['common_name'];
                    $official_name = $row['official_name'];
                    $endonym = $row['endonym'];
                    $demonym = $row['demonym'];
        
                    $total = new stdClass();
        
                    $total->continent = $continent;
                    $total->currency_code = $currency_code;
                    $total->iso2_code = $iso2_code;
                    $total->iso3_code = $iso3_code;
                    $total->iso_numeric_code = $iso_numeric_code;
                    $total->fips_code = $fips_code;
                    $total->calling_code = $calling_code;
                    $total->common_name = $common_name;
                    $total->official_name = $official_name;
                    $total->endonym = $endonym;
                    $total->demonym = $demonym;
        
        
                    Array_push($list_item, $total);

                    $data = $list_item;

                    return $data;
                }

            }
        }


        // if paginate is equal to 1
        if($paginate == '1') {

            $getData = "SELECT * FROM `country`";

            $result_all = mysqli_query($this->conn, $getData);
    
            if($result_all) {

                $list_item = [];

                while ($row = mysqli_fetch_array($result_all, MYSQLI_ASSOC)) {
    
                    $continent = $row["continent"];
                    $currency_code = $row["currency_code"];
                    $iso2_code = $row["iso2_code"];
                    $iso3_code = $row["iso3_code"];
                    $iso_numeric_code = $row['iso_numeric_code'];
                    $fips_code = $row['fips_code'];
                    $calling_code = $row['calling_code'];
                    $common_name = $row['common_name'];
                    $official_name = $row['official_name'];
                    $endonym = $row['endonym'];
                    $demonym = $row['demonym'];
        
                    $total = new stdClass();
        
                    $total->continent = $continent;
                    $total->currency_code = $currency_code;
                    $total->iso2_code = $iso2_code;
                    $total->iso3_code = $iso3_code;
                    $total->iso_numeric_code = $iso_numeric_code;
                    $total->fips_code = $fips_code;
                    $total->calling_code = $calling_code;
                    $total->common_name = $common_name;
                    $total->official_name = $official_name;
                    $total->endonym = $endonym;
                    $total->demonym = $demonym;
        
        
                    Array_push($list_item, $total);
    
                };

                $data = $list_item;

                return $data;
            }
        }
        
        if($paginate != '1'  && $id == null && $search == null){

            $no_of_records_per_page = 5;
            $offset = ($paginate - 1) * $no_of_records_per_page;

            $total_pages_query = "SELECT count(*) FROM `country`";
            $result = mysqli_query($this->conn, $total_pages_query);
            
            if($result) {

                $total_rows = mysqli_fetch_array($result)[0];


                $total_pages = ceil($total_rows/ $no_of_records_per_page);

                $another_query = "SELECT * FROM `country` LIMIT $offset, $no_of_records_per_page";

                $another_result = mysqli_query($this->conn, $another_query);

                if($another_result) {

                    $list_item = [];


                    while($row = mysqli_fetch_array($another_result, MYSQLI_ASSOC)) {

                        // return $another_result;

                        $continent = $row["continent"];
                        $currency_code = $row["currency_code"];
                        $iso2_code = $row["iso2_code"];
                        $iso3_code = $row["iso3_code"];
                        $iso_numeric_code = $row['iso_numeric_code'];
                        $fips_code = $row['fips_code'];
                        $calling_code = $row['calling_code'];
                        $common_name = $row['common_name'];
                        $official_name = $row['official_name'];
                        $endonym = $row['endonym'];
                        $demonym = $row['demonym'];
                
                        $total = new stdClass();
            
                        $total->continent = $continent;
                        $total->currency_code = $currency_code;
                        $total->iso2_code = $iso2_code;
                        $total->iso3_code = $iso3_code;
                        $total->iso_numeric_code = $iso_numeric_code;
                        $total->fips_code = $fips_code;
                        $total->calling_code = $calling_code;
                        $total->common_name = $common_name;
                        $total->official_name = $official_name;
                        $total->endonym = $endonym;
                        $total->demonym = $demonym;
            
            
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
             $getData = "SELECT * FROM `country`";

             $result_all = mysqli_query($this->conn, $getData);
     
            if($result_all) {
 
                $list_item = [];
 
                while ($row = mysqli_fetch_array($result_all, MYSQLI_ASSOC)) {
     
                    $continent = $row["continent"];
                    $currency_code = $row["currency_code"];
                    $iso2_code = $row["iso2_code"];
                    $iso3_code = $row["iso3_code"];
                    $iso_numeric_code = $row['iso_numeric_code'];
                    $fips_code = $row['fips_code'];
                    $calling_code = $row['calling_code'];
                    $common_name = $row['common_name'];
                    $official_name = $row['official_name'];
                    $endonym = $row['endonym'];
                    $demonym = $row['demonym'];
        
                    $total = new stdClass();
        
                    $total->continent = $continent;
                    $total->currency_code = $currency_code;
                    $total->iso2_code = $iso2_code;
                    $total->iso3_code = $iso3_code;
                    $total->iso_numeric_code = $iso_numeric_code;
                    $total->fips_code = $fips_code;
                    $total->calling_code = $calling_code;
                    $total->common_name = $common_name;
                    $total->official_name = $official_name;
                    $total->endonym = $endonym;
                    $total->demonym = $demonym;
        
        
                    Array_push($list_item, $total);
     
                };
 
                 $data = $list_item;
 
                return $data;
            }
 
        }

        if($search != '0'  && $id == null && $paginate == null) {

            $getData = "SELECT * FROM `country` WHERE `official_name` LIKE '%$search%'";

            $result_all = mysqli_query($this->conn, $getData);

            if($result_all) {

                $list_item = [];

                while ($row = mysqli_fetch_array($result_all, MYSQLI_ASSOC)) {
    
                    $continent = $row["continent"];
                    $currency_code = $row["currency_code"];
                    $iso2_code = $row["iso2_code"];
                    $iso3_code = $row["iso3_code"];
                    $iso_numeric_code = $row['iso_numeric_code'];
                    $fips_code = $row['fips_code'];
                    $calling_code = $row['calling_code'];
                    $common_name = $row['common_name'];
                    $official_name = $row['official_name'];
                    $endonym = $row['endonym'];
                    $demonym = $row['demonym'];
        
                    $total = new stdClass();
        
                    $total->continent = $continent;
                    $total->currency_code = $currency_code;
                    $total->iso2_code = $iso2_code;
                    $total->iso3_code = $iso3_code;
                    $total->iso_numeric_code = $iso_numeric_code;
                    $total->fips_code = $fips_code;
                    $total->calling_code = $calling_code;
                    $total->common_name = $common_name;
                    $total->official_name = $official_name;
                    $total->endonym = $endonym;
                    $total->demonym = $demonym;
        
        
                    Array_push($list_item, $total);
    
                };

                $data = $list_item;

                return $data;

            }
        }
    }

}

?>