<?php 
include 'header.php';
include 'slider.php';
include 'class/product_class.php'; 
?>

<?php
$product = new Product;
if($_SERVER['REQUEST_METHOD']==='POST'){
    // var_dump($_PORT, $_FILES);

    //*----kiem tra du lieu dau vao */
    // echo '<pre>';
    // echo print_r($_POST);
    // echo print_r($_FILES);
    // echo '</pre>';

    //*----kiem tra hinh mo ta(nhieu file) dau vao */
    // echo '<pre>';
    // echo print_r($_FILES['product_imgs']['name']);
    // echo '</pre>';

    // $category_id = $_POST['category_id'];
    // $brand_name = $_POST['brand_name'];
    $insert_product = $product->insert_product($_POST, $_FILES);
}

?>


<!-- right side -->
<div class="admin-content-right">
    <div class="product-add">
        <h2>Them san pham</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="">Nhap ten san pham <span style="color:red">*</span></label>
            <input name="product_name" required type="text" placeholder="Nhap ten san pham"> <br>
            <label for="">Chon danh muc <span style="color:red">*</span></label>
            <select name="category_id" id="category_id">
                <option value="">--Select category</option>
                <?php 
                     $show_category = $product ->show_category();
                     if($show_category){while($result = $show_category->fetch_assoc()){
                ?>
                <option value="<?php echo $result['category_id'] ?><?php echo $result['category_name'] ?>"></option>
                <?php
                     }}
                ?>
            </select> <br>
            <label for="">Chon loai san pham <span style="color:red">*</span></label>
            <select name="brand_id" id="brand_id">
                <option value="#">--Select brand</option>
                <?php 
                     $show_brand = $product ->show_brand();
                     if($show_brand){while($result = $show_brand->fetch_assoc()){
                ?>
                <option value="<?php echo $result['brand_id'] ?><?php echo $result['brand_name'] ?>"></option>
                <?php
                     }}
                ?>
            </select> <br>
            <label for="">Gia san pham <span style="color:red">*</span></label>
            <input name="product_price" required type="text" placeholder="Gia san pham"> <br>
            <label for="">Gia khuyen mai <span style="color:red">*</span></label>
            <input name="product_price_new" required type="text" placeholder="Gia khuyen mai"> <br>
            <label for="">Mo ta san pham <span style="color:red">*</span></label>
            <textarea name="product_desc" cols="30" rows="10" id="" placeholder="Mo ta san pham"></textarea> <br>
            <label for="">Anh san pham <span style="color:red">*</span></label>
            <span style="color:red"><?php if(isset($insert_product)){
                echo $insert_product;
            } ?></span>
            <input type="file" name="product_img" id=""><br>
            <label for="">Anh mo ta (Co the chon nhieu file) <span style="color:red">*</span></label>
            <input multiple type="file" name="product_imgs[]" id=""><br>
            <button type="submit">Them</button>
        </form>
    </div>
</div>
</div>
</body>
<script>
$(document).ready(function() {
    $('#category_id').change(function() {
        let x = $(this).val()
        $.get("product_add_ajax.php", {
            category_id: x
        }, function(data) {
            $("#brand_id").html(data);
        })
    })
});
</script>

</html>