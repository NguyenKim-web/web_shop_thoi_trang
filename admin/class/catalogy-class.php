<?php
    include "../database.php";
?>
<?php
class Catalogy {
    private $db;
    public function __construct(){
        $this ->db = new Database();
    }
    public function insert_catalogy($catagoly_name){
        $query = "INSERT INTO tbl_catagoly (catalogy_name) VALUES ('$catagoly_name')";
        $result = $this ->db -> insert($query);
        return $result;
    }
}
?>