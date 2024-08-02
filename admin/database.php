<!-- Database class -->
<?php
<<<<<<< HEAD
    include "config.php";
=======
include 'config.php';
>>>>>>> c5c02735536a3512eaa4550905d14a384559512f
?>
<?php
Class Database{
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $dbname = DB_NAME;
<<<<<<< HEAD
    // public $dbport = DB_PORT;
=======
>>>>>>> c5c02735536a3512eaa4550905d14a384559512f
    public $link;
    public $error;
    public function __construct(){
        $this->connectDB();
    }

    private function connectDB(){
<<<<<<< HEAD
        $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if(!$this->link){
            $this->error="Connection fail" . $this->link->connect_error;
=======
        $this->link = new mysqli($this->host, $this->user, $this->pass,
        $this->dbname);
        if(!$this->link){
            $this->error="Connection fail".$this->link->connect_error;
>>>>>>> c5c02735536a3512eaa4550905d14a384559512f
            return false;
        }
    }
        
    // Select or Read data
    public function select($query){
        $result = $this->link->query($query) or
<<<<<<< HEAD
            die($this->link->error.__LINE__);
=======
        die($this->link->error.__LINE__);
>>>>>>> c5c02735536a3512eaa4550905d14a384559512f
        if($result->num_rows > 0){
            return $result;
        } else {
            return false;
        }
    }

        
    // Insert data
    public function insert($query){
<<<<<<< HEAD
        $insert_row = $this->link->query($query) or
=======
        $insert_row= $this->link->query($query) or
>>>>>>> c5c02735536a3512eaa4550905d14a384559512f
        die($this->link->error.__LINE__);
        if($insert_row){
            return $insert_row;
        } else {
            return false;
        }
    }
    // Update data
    public function update($query){
<<<<<<< HEAD
        $update_row = $this->link->query($query) or
=======
        $update_row= $this->link->query($query) or
>>>>>>> c5c02735536a3512eaa4550905d14a384559512f
            die($this->link->error.__LINE__);
        if($update_row){
            return $update_row;
        } else {
            return false;
        }
    }

    // Delete data
    public function delete($query){
<<<<<<< HEAD
        $delete_row = $this->link->query($query) or
        die($this->link->error.__LINE__);
        if($delete_row){
            return $delete_row;
        } else {
            return false;
=======
        $delete_row= $this->link->query($query) or
        die($this->link->error.__LINE__);
        if($delete_row){
        return $delete_row;
        } else {
        return false;
>>>>>>> c5c02735536a3512eaa4550905d14a384559512f
        }
    }
}