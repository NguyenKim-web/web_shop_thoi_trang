<?php 

include 'class/brand_class.php';
$brand = new Brand;
//-----dang xem xet ----->
// if (!isset($_POST['category_id']) || $_POST['category_id']==null) {
//     echo "<script>window.location = 'categorylist.php'</script>";
// }else{
    $brand_id = $_POST["brand_id"];
// }
$del_brand = $brand->del_brand($brand_id);

?>