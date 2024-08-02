<?php 
include 'header.php';
include 'slider.php';
include 'class/category_class.php';
?>

<?php
    $category = new Category;
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $category_name = $_POST['category_name'];
        $insert_category = $category->insert_category($category_name);
    }

?>
<!-- right side -->
<div class="admin-content-right">
    <div class="category">
        <h2>Them danh muc</h2>
        <form action="" method="POST">
            <input required type="text" name="category_name" placeholder="Nhap ten danh muc">
            <button type="submit">Them</button>
        </form>
    </div>
</div>
</div>
</body>

</html>