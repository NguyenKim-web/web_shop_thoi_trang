<?php 

include 'class/category_class.php';
$category = new Category;
if (!isset($_POST['category_id']) || $_POST['category_id']==null) {
    echo "<script>window.location = 'category_list.php'</script>";
}else{
    $category_id = $_POST["category_id"];
}
$del_category = $category->del_category($category_id);

?>