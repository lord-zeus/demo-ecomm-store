<?php 

$upload_dir = "uploads";

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
        
        $product_image = display_image($row['product_image']);
        
        $product = /*<<<DELIMITER*/

        '<div class="col-sm-4 col-lg-4 col-md-4">
            <div class="thumbnail">
                <a href="item.php?id='.$row['product_id'].'"><img src="../resources/'.$product_image.'" alt="" height="200"></a>
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

//////////////////// ADMIN PRODUCTS ///////////////////////////
function display_image($picture) {
    global $upload_dir;
    return $upload_dir . DS . $picture;
}


function get_products_in_admin() {
    $query = query("SELECT * FROM products");
    confirm_query($query);
    
    while($row = fetch_array($query)) {
    
        $category = show_product_category($row['product_category_id']);
        
        $product_image = display_image($row['product_image']);
        
        $product = /*<<<DELIMITER*/

            '<tr>
                <td>'.$row['product_id'].'</td>
                <td>'.$row['product_title'].'
                    <br>
                    <a href="index.php?edit_product&id='.$row['product_id'].'"><img src="../../resources/'.$product_image.'" alt="" height="100"></a>
                </td>
                <td>'.$category.'</td>
                <td>'.$row['product_price'].'</td>
                <td>'.$row['product_quantity'].'</td>
                <td><a href="../../resources/templates/back/delete_product.php?id='.$row['product_id'].'" class="btn btn-danger"><i class="fa fa-fw fa-times"></i>Delete</a></td>
            </tr>'

        /*DELIMITER*/;
    
        echo $product;
    }
}

function show_product_category($product_category_id) {
    $category_query = query("SELECT * FROM categories WHERE cat_id = $product_category_id");
    confirm_query($category_query);
    
    while($row = fetch_array($category_query)) {
        return $row['cat_title'];    
    }
    
}


function add_product() {
    if(isset($_POST['publish'])) {
        $product_title          = escape_string($_POST['product_title']);
        $product_category_id    = escape_string($_POST['product_category_id']);
        $product_price          = escape_string($_POST['product_price']);
        $product_quantity       = escape_string($_POST['product_quantity']);
        $product_description    = escape_string($_POST['product_description']);
        $short_desc             = escape_string($_POST['short_desc']);
        $product_image          = escape_string($_FILES['file']['name']);
        $image_tmp_location     = escape_string($_FILES['file']['tmp_name']);
        
        move_uploaded_file($image_tmp_location, UPLOAD_DIR.DS.$product_image);
        
        $query = query("INSERT INTO products(product_title, product_category_id, product_price, product_quantity, product_description, product_short_desc, product_image) VALUES('$product_title', '$product_category_id', '$product_price', '$product_quantity', '$product_description', '$short_desc', '$product_image')");
        
        $last_id = last_id();
        
        confirm_query($query);
        
        set_message("New product #$last_id just added");
        
        redirect("index.php?products");
    }
}

function show_categories_add_product() {
    $query = query("SELECT * FROM categories");
    confirm_query($query);

    while($row = fetch_array($query)) {
        $cat_id = $row['cat_id'];    
        $cat_title = $row['cat_title'];

    echo "<option value='{$cat_id}'>{$cat_title}</option>";

    }

}


///////////////////////////UPDATE PRODUCT////////////////////////////
function update_product() {
    if(isset($_POST['update'])) {
        $product_title          = escape_string($_POST['product_title']);
        $product_category_id    = escape_string($_POST['product_category_id']);
        $product_price          = escape_string($_POST['product_price']);
        $product_quantity       = escape_string($_POST['product_quantity']);
        $product_description    = escape_string($_POST['product_description']);
        $short_desc             = escape_string($_POST['short_desc']);
        $product_image          = escape_string($_FILES['file']['name']);
        $image_tmp_location     = escape_string($_FILES['file']['tmp_name']);
        
        if(empty($product_image)) {
            $query = query("SELECT product_image FROM products WHERE product_id = ".escape_string($_GET['id']));
            confirm_query($query);
            
            $pic = fetch_array($query);
            
            $product_image = $pic['product_image'];
        }
        
        move_uploaded_file($image_tmp_location, UPLOAD_DIR.DS.$product_image);
        
        $query = "UPDATE products SET ";
        $query.= "product_title = '$product_title', ";
        $query.= "product_category_id = '$product_category_id', ";
        $query.= "product_price = '$product_price', ";
        $query.= "product_quantity = '$product_quantity', ";
        $query.= "product_description = '$product_description', ";
        $query.= "product_short_desc = '$short_desc', ";
        $query.= "product_image = '$product_image' ";
        $query.= "WHERE product_id = '".escape_string($_GET['id'])."'";
        
        $send_query = query($query);
        
        confirm_query($query);
        
        set_message("Product #".$_GET['id']." updated");
        
        redirect("index.php?products");
    }
}



?>












