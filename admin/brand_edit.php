<?php 
include 'header.php';
include 'slider.php';
include 'class/brand_class.php';
?>

<?php
    $brand = new Brand;
    ///*---doi xem xet--->
    // if (!isset($_POST['category_id']) || $_POST['category_id']==null) {
    //     //Sai chua sua
    //     //Using JS:
    //     //<script>window.location="category_list.php";</script>
    //     //Using php:
    //     //header('Location: category_list.php');end();
    //     echo "<script>window.location = 'category_list.php'</script>";
    // }else{
    //get du lieu   
    $brand_id = $_GET['brand_id']; // or $_PORT["brand_id"]
    // }
    $get_brand = $brand->get_brand($brand_id);
    if($get_brand){
        $resultA = $get_brand->fetch_assoc();
    }
    // post du lieu
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $category_id = $_POST['category_id'];
        $brand_name = $_POST['brand_name'];
        $update_brand = $brand->update_brand($category_id, $brand_name, $brand_id);
    }

?>
<style>
select {
    width: 180px;
    height: 30px;
    margin-bottom: 20px;
}
</style>
<!-- right side -->
<div class="admin-content-right">
    <div class="category">
        <h2>Them loai san pham</h2>
        <form action="" method="POST">
            <select name="category_id" id="">
                <option value="#">--Select</option>
                <?php
                    $show_category = $brand ->show_category();
                    if($show_category){while($result = $show_category->fetch_assoc()){

                ?>
                <option <?php if($resultA['category_id'] ==$result['category_id']) echo "SELECTED"; ?>
                    value="<?php echo $result['category_id']?>"><?php echo $result['category_name']?></option>
                <?php
                    }}
                ?>
            </select> <br>
            <input required type="text" name="brand_name" placeholder="Nhap ten loai san pham"
                value="<?php echo $resultA['brand_name'] ?>">
            <button type="submit">Sua</button>
        </form>
    </div>
</div>
</div>
</body>

</html>