<?php
class database{
    public $host   ="localhost";
    public $user   ="root";
    public $pass   ="";
    public $dbname ="finalproject";


    public $con;
    public $error;


    public function __construct(){
        $this->connectDB();
    }

    private function connectDB(){

        $this->con = new mysqli($this->host,$this->user,$this->pass,$this->dbname);
        $this->con->set_charset('utf8');
        if(!$this->con){
            $this->error = "connection fail" .$this->con->connect_error;

            return false;
        }
    }

    //select or read database

    public function select($query){
        $result = $this->con->query($query) or die ($this->con->error.__LINE__);
        if($result->num_rows > 0){
            return $result;
        }
        else{
            return false;
        }

    }

    //data insert

    public function insert($query){
        $insert_row  = $this->con->query($query) or die ($this->con->error.__LINE__);
        if($insert_row){
            header("location:?msg=".urlencode('data insert successfully'));
            exit();
        }
        else
        {
            die("Error:(".$this->con->errno.")".$this->con->error);
        }

    }

    //update data
    public function update($query){
        $update_row  = $this->con->query($query) or die ($this->con->error.__LINE__);
        if($update_row){
            header("location:policestationhome.php?msg=".urlencode('data update successfully'));
            exit();
        }
        else
        {
            die("Error:(".$this->con->errno.")".$this->con->error);
        }

    }

    //delete data
    public function delete($query){
        $delete_row  = $this->con->query($query) or die ($this->con->error.__LINE__);
        if($delete_row){
            header("location:policestationhome.php?msg=".urlencode('data delete successfully'));
            exit();
        }
        else
        {
            die("Error:(".$this->con->errno.")".$this->con->error);
        }

    }

}

 ?>
