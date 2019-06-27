<?php
class DB{

    // DataBase Configartion settings

    var $servername = "localhost";  
    var $username = "root";         
    var $password = "";             
    var $dbname = "school";     
    
    
    var $conn;
    function DB(){
        $this->conn = new mysqli($this->servername,$this->username,$this->password,$this->dbname);       
    } 
    function CheckConnection(){
    if ($this->conn->connect_error) {
        die("Connection failed: " . $this->conn->connect_error);
    } 
    echo "Connected successfully";
    }
    function ExecQuery($query){
        $result = $this->conn->query($query);

        if ( $result === TRUE) {
            return "successfull";
            $this->conn->close();
        } else {
            $rows = array();
            if($result){
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                     array_push($rows,$row);
                }
                return $rows;

            } else {
                return null;
            }
        }
        else{
            echo "Something Went Wrong. Query Not Executed";
        }

        }
    }
}
?>