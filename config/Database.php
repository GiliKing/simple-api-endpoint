
<?php

class Database {
    private $_host  = 'us-cdbr-east-06.cleardb.net';
    private $_user  = 'b1672a420eb63d';
    private $_password   = "a6e5c671";
    private $_database  = "heroku_709f95d041c95ca";

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