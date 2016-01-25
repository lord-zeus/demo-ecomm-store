<?php 

//helper functions
function set_message($msg) {
    if(!empty($msg)) {
        $_SESSION['message'] = $msg;
    } else {
        $msg = "";
    }
}

function display_message() {
    if(isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}   

function redirect($location) {
    header("Location: $location");
}

function query($sql) {
    global $connection;
    return mysqli_query($connection, $sql);
}

function confirm_query($query) {
    global $connection;
    if(!$query) {
        die("QUERY FAILED " . mysqli_error($connection));    
    }
}

function escape_string($string) {
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result) {
    global $connection;
    return mysqli_fetch_array($result);
}

function last_id() {
    global $connection;
    return mysqli_insert_id($connection);
}

////////////////// FRONT END FUNCTIONS ///////////////////////

//get products
function get_products() {
    $query = query("SELECT * FROM products");
    confirm_query($query);

    while($row = fetch_array($query)) {
        $product = /*<<<DELIMITER*/

        '<div class="col-sm-4 col-lg-4 col-md-4">
            <div class="thumbnail">
                <a href="item.php?id='.$row['product_id'].'"><img src="'.$row['product_image'].'" alt=""></a>
                <div class="caption">
                    <h4 class="pull-right">$'.$row['product_price'].'</h4>
                    <h4><a href="item.php?id='.$row['product_id'].'">'.$row['product_title'].'</a>
                    </h4>
                    <p>See more snippets like this online store item at <a href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                    <a class="btn btn-primary" href="../resources/cart.php?add='.$row['product_id'].'">Add to Cart</a>
                </div>
            </div>
        </div>'

    /*DELIMITER*/;

        echo $product;
    }
}

//get categories
function get_categories() {
    $query = query("SELECT * FROM categories");
    confirm_query($query);

    while($row = fetch_array($query)) {
        $cat_id = $row['cat_id'];    
        $cat_title = $row['cat_title'];

    echo "<a href='category.php?id=$cat_id' class='list-group-item'>$cat_title</a>";

    }

}

function get_products_shop_page() {
    $query = query("SELECT * FROM products");
    confirm_query($query);

    while($row = fetch_array($query)) {
        $cat_id = $row['cat_id'];    
        $cat_title = $row['cat_title'];

    echo "<a href='category.php?id=$cat_id' class='list-group-item'>$cat_title</a>";

    }

}

////////////////// BACK END FUNCTIONS ///////////////////////
function display_orders() {
    $query = query("SELECT * FROM orders");
    confirm_query($query);
        
    while($row = fetch_array($query)) {
        $orders = "<tr>
                <td>{$row['order_id']}</td>
                <td>{$row['order_amount']}</td>
                <td>{$row['order_transaction']}</td>
                <td>{$row['order_currency']}</td>
                <td>{$row['order_status']}</td>    
                <td><a href='../../resources/templates/back/delete_order.php?id={$row['order_id']}' class='btn btn-danger'><i class='fa fa-fw fa-times'></i>Delete</a></td>
            </tr>";
        
        echo $orders;
    }
}


?>