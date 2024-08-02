<?php 
include 'header.php';
include 'slider.php';
include 'class/brand_class.php';
?>

<?php
    $brand = new Brand;
   $show_brand = $brand->show_brand();
?>
<!-- right side -->
<div class="admin-content-right">
    <div class="category-list">
        <h2>Danh sach loai san pham</h2>
        <table>
            <tr>
                <th>Stt</th>
                <th>ID</th>
                <th>Danh muc</th>
                <th>Loai san pham</th>
                <th>Tuy bien</th>
            </tr>
            <?php
    if ($show_brand) {  
        $i=0;
        while($result = $show_brand->fetch_assoc()){
            $i++;
        }
     }

            ?>
            <tr>
                <td><?php echo $i?></td>
                <td><?php echo $result['brand_id']?></td>
                <td><?php echo $result['category_name']?></td>
                <td><?php echo $result['brand_name']?></td>
                <td><a href="brand_edit.php?brand_id =<?php echo $result['brand_id']?>">Sua</a> | <a
                        href="brand_del.php?brand_id =<?php echo $result['brand_id']?>">Xoa</a></td>
            </tr>
        </table>
    </div>
</div>
</div>
</body>

</html>