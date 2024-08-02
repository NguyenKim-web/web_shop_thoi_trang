<?php
    include 'database.php';
?>
<?php
    class Product{
        private $db;
        public function __construct(){
            $this->db = new Database();
            // echo '<pre>';
            // print_r($this->db);
            // echo '</pre>';
        }
        public function show_category(){
            $query = "SELECT * FROM tbl_category ORDER BY category_id DESC";
            $result = $this->db->select($query);
            return $result;
        } 
        
        public function show_brand(){
            // $query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC";
            $query = "SELECT tbl_brand.*, tbl_category.category_name  
            FROM tbl_brand INNER JOIN tbl_category ON  tbl_brand.category_id = tbl_category.category_id
            ORDER BY tbl_brand.brand_id DESC";
            $result = $this->db->select($query);
            return $result;
        }
        
        public function show_brand_ajax($category_id){
            $query = "SELECT * FROM tbl_brand WHERE category_id = '$category_id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function insert_product(){
            $product_name = $_POST["product_name"];
            $category_id = $_POST["category_id"];
            $brand_id = $_POST["brand_id"];
            $product_price = $_POST["product_price"];
            $product_price_new = $_POST["product_price_new"];
            $product_desc = $_POST["product_desc"];
            $product_img = $_FILES["product_img"]['name'];
            $file_target= basename($_FILES["product_img"]['name']);
            $file_type = strtolower(pathinfo($product_img, PATHINFO_EXTENSION));
            $file_size = $_FILES['$product_img']['size'];

            if(file_exists("uploads/$file_target")){
                $alert = "File exits";
                return $alert;
            }else{
                if($file_type != "jpg" && $file_type != "png"&& $file_type != "jpeg"){
                    $alert = "Chon file jpg, png, jpeg";
                    return $alert;
                }else{
                    if($file_size>1000000){
                        $alert = "Chon file nho hon 1MB";
                        return $alert;
                    }else{ 
                //luu anh vao trong folder 'uploads'
                move_uploaded_file($_FILES['$product_img']['tmp_name'], "uploads/".$_FILES['$product_img']['name']);
        

                $query = "INSERT INTO tbl_product (
                product_name,
                category_id,
                brand_id,
                product_price,
                product_price_new,
                product_desc,
                product_img,
                ) VALUES (
                '$product_name',
                '$category_id',
                '$brand_id',
                '$product_price',
                '$product_price_new',
                '$product_desc',
                '$product_img)')";
                $result = $this->db->insert($query);
                if($result){
                    $query = "SELECT * FROM tbl_product ORDER BY product_id DESC LIMIT 1";
                    $result = $this->db->select($query)->fetch_assoc();
                    $product_id = $result["product_id"];
                    $file_name = $_FILES['$product_img']['name'];
                    $file_tmp = $_FILES['$product_img']['tmp_name'];




                    //vong lap de lay tung file anh de dua vao db
                    foreach($file_name as $key => $value){
                        move_uploaded_file($file_tmp[$key], $value);
                        $query = "INSERT INTO tbl_product_imgs (product_id, product_imgs) VALUE ('$product_id', '$value') ";
                        $result = $this->db->insert($query);
                    }

                }
                }
                }
            }

            // header('location: brand_list.php');
            return $result;   
        }
        




        //ham ko dung den
        public function get_category($category_id){
            $query = "SELECT * FROM tbl_category WHERE category_id = '$category_id'";
            $result = $this->db->select($query);
            return $result;
        } 
        public function get_brand($brand_id){
            $query = "SELECT * FROM tbl_brand WHERE brand_id = '$brand_id'";
            $result = $this->db->select($query);
            return $result;
        }


        public function update_category($category_name, $category_id){
            $query = "UPDATE tbl_category SET category_name = '$category_name' WHERE category_id = '$category_id'";
            $result = $this->db->update($query);
            header('location: category_list.php');
            return $result;
        }
        public function update_brand($category_id, $brand_name, $brand_id){
            $query = "UPDATE tbl_brand SET brand_name = '$brand_name', category_id = '$category_id' WHERE brand_id = '$brand_id'";
            $result = $this->db->update($query);
            header('location: brand_list.php');
            return $result;
        }



        public function del_category($category_id){
            $query = "DELETE FROM tbl_category  WHERE category_id = '$category_id'";
            $result = $this->db->delete($query);
            header('location: category_list.php');
            return $result;
        } 
         public function del_brand($brand_id){
            $query = "DELETE FROM tbl_brand  WHERE brand_id = '$brand_id'";
            $result = $this->db->delete($query);
            header('location: brand_list.php');
            return $result;
        }
    }
?>