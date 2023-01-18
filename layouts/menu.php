<?php
$sqlmenu="SELECT *
    FROM category
    ORDER BY cat_id";
$querymenu = mysqli_query($conn,$sqlmenu);
?>

<div id="menu" class="collapse navbar-collapse">
    <ul>

        <?php
        foreach($querymenu as $item)
        {
        ?>

            <li class="menu-item"><a href="../category.php?cat_id=<?php echo $item['cat_id']?>&cat_name=<?php echo $item['cat_name']?>"><?php echo $item['cat_name']?></a></li>

        <?php
        }
        ?>
        <!-- <li class="menu-item"><a href="../category.php">iPhone</a></li>
        <li class="menu-item"><a href="../category.php">Samsung</a></li>
        <li class="menu-item"><a href="../category.php">HTC</a></li>
        <li class="menu-item"><a href="../category.php">Nokia</a></li>
        <li class="menu-item"><a href="../category.php">Sony</a></li>
        <li class="menu-item"><a href="../category.php">Blackberry</a></li> -->
    </ul>
</div>