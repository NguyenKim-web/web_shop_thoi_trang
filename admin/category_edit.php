<?php 
include 'header.php';
include 'slider.php';
include 'class/category_class.php';
?>
<!-- lay va show du lieu ra trang web -->
<?php
    $category = new Category;
    if (!isset($_POST['category_id']) || $_POST['category_id']==null) {
        //Sai chua sua
        //Using JS:
        //<script>window.location="category_list.php";</script>
        //Using php:
        //header('Location: category_list.php');end();
        echo "<script>window.location = 'category_list.php'</script>";
    }else{
        $category_id = $_GET["category_id"]; // or $_PORT["category_id"]
    }
    $get_category = $category->get_category($category_id);
    if($get_category){
        $result = $get_category->fetch_assoc();
    }
?>
<!-- dua du lieu vao -->
<?php
    // $category = new Category;
    // if($_SERVER['REQUEST_METHOD']==='POST'){
    //     $category_name = $_POST['category_name'];
    //     $insert_category = $category->insert_category($category_name);
    // }
?>
<!-- update du lieu -->
<?php
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $category_name = $_POST['category_name'];
        $update_category = $category->update_category($category_name, $category_id);
    }

?>
<!-- right side -->
<div class="admin-content-right">
    <div class="category">
        <h2>Them danh muc</h2>
        <form action="" method="POST">
            <input required type="text" name="category_name" placeholder="Nhap ten danh muc"
                value="<?php echo $result['category_name']?>">
            <button type="submit">Them</button>
        </form>
    </div>
</div>
</div>
</body>

</html>