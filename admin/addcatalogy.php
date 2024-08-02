<?php
include 'header.php';
include 'slider.php';
include 'class/catalogy-class.php';
?>
<?php
    $catalogy = new Catalogy();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $catalogy_name = $_POST['$catalogy_name'];
        $insert_catalogy = $catalogy ->insert_catalogy($catalogy_name);
    }
?>

<div class="admin-content-right">
    <div class="catagoly">
        <h2>Them danh muc</h2>
        <form action="" method="POST">
            <input type="text" name="catagoly_name" placeholder="Nhap ten danh muc">
            <button type="submit">Them</button>
        </form>
    </div>
</div>
</div>
</body>

</html>