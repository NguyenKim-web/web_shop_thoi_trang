<?php 
include 'header.php';
include 'slider.php';
include 'class/category_class.php';
?>

<?php
    $category = new Category;
   $show_category = $category->show_category();
?>
<!-- right side -->
<div class="admin-content-right">
    <div class="category-list">
        <h2>Danh sach danh muc</h2>
        <table>
            <tr>
                <th>Stt</th>
                <th>ID</th>
                <th>Danh muc</th>
                <th>Tuy bien</th>
            </tr>
            <?php
    if ($show_category) {  
        $i=0;
        while($result = $show_category->fetch_assoc()){
            $i++;
        }
     }

            ?>
            <tr>
                <td><?php echo $i?></td>
                <td><?php echo $result['category_id']?></td>
                <td><?php echo $result['category_name']?></td>
                <td><a href="category_edit.php?category_id =<?php echo $result['category_id']?>">Sua</a> | <a
                        href="category_del.php?category_id =<?php echo $result['category_id']?>">Xoa</a></td>
            </tr>
        </table>
    </div>
</div>
</div>
</body>

</html>