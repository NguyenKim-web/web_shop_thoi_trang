<?php 
include 'class/product_class.php'; 
$product = new Product;
$category_id = $_GET['category_id'];

?>

<?php 
    $show_brand = $product ->show_brand_ajax($category_id);
    if($show_brand){while($result = $show_brand->fetch_assoc()){
?>
<option value="<?php echo $result['brand_id'] ?><?php echo $result['brand_name'] ?>"></option>
<?php
        }}
?>