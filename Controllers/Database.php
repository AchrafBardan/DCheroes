<?php

    class Database{

        public function __construct()
        {
            $this->servername = "localhost";
            $this->username = "root";
            $this->password = "";
            $this->dbname = "dcheroes";
        }

        public function query($query)
        {
            // Create connection
            $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

            

            if ($conn->connect_error) {
                echo $conn->connect_error;
                return;
            }
            else{
                return $conn->query($query);
            }
        }

    }
    

    

    
?>
