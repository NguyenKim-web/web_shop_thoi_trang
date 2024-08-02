<?php 
include 'header.php';
include 'slider.php';
include 'class/brand_class.php';
?>

<?php
    $brand = new Brand;
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $category_id = $_POST['category_id'];
        $brand_name = $_POST['brand_name'];
        $insert_brand = $brand->insert_brand($category_id, $brand_name);
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
                <option value="<?php echo $result['category_id']?>"><?php echo $result['category_name']?></option>
                <?php
                    }}
                ?>
                <option value="">Nu</option>
            </select> <br>
            <input required type="text" name="brand_name" placeholder="Nhap ten loai san pham">
            <button type="submit">Them</button>
        </form>
    </div>
</div>
</div>
</body>

</html>