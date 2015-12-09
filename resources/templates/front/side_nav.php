<div class="col-md-3">
    <p class="lead">Shop Name</p>
    <div class="list-group">
    <?php 

        $query = "SELECT * FROM categories";

        $select_cats = query($query);
        
        confirm_query($select_cats);

        while($row = fetch_array($select_cats)) {
            $cat_id = $row['cat_id'];    
            $cat_title = $row['cat_title'];

        echo "<a href='#' class='list-group-item'>$cat_title</a>";

        }

    ?>

<!--
        <a href="category.html" class="list-group-item">Category 1</a>
        <a href="#" class="list-group-item">Category 2</a>
        <a href="#" class="list-group-item">Category 3</a>
-->
    </div>
</div>