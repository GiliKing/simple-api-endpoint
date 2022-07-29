
<?php

class Database {
    private $_host  = 'localhost';
    private $_user  = 'root';
    private $_password   = "";
    private $_database  = "money";

    public function getConnection(){		
		// $conn = new mysqli($this->_host, $this->_user, $this->_password, $this->_database);
		// if($conn->connect_error){
		// 	die("Error failed to connect to MySQL: " . $conn->connect_error);
		// } else {
		// 	return $conn;
		// }

        $conn = mysqli_connect($this->_host, $this->_user, $this->_password, $this->_database);

        if($conn->connect_error) {
			die("Error failed to connect to MySQL: " . $conn->connect_error);
        } else {
            return $conn;
        }
    }
}


?>