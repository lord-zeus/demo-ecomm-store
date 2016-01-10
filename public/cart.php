<!-- Configuration-->
<?php require_once("../resources/config.php"); ?>

<?php

if(isset($_GET['add'])) {

    $query = query("SELECT * FROM products WHERE product_id=" . escape_string($_GET['add']) . " ");
    
    confirm_query($query);
    
    while($row = fetch_array($query)) {
        if($row['product_quantity'] > $_SESSION['product_'.$_GET['add']]) {
            $_SESSION['product_'.$_GET['add']] += 1;
            redirect('checkout.php');            
                      
        } else {
            set_message('Sorry, we only have ' . $row['product_quantity'] . ' of ' . $row['product_title'] . ' in stock.');    
            redirect('checkout.php');
        }
    }

//    $_SESSION['product_' . $_GET['add']] += 1; 
//    
//    redirect("index.php");
}

if(isset($_GET['remove'])) {
    $_SESSION['product_'.$_GET['remove']] -= 1;
    
    if($_SESSION['product_'.$_GET['remove']] < 1) {
        unset($_SESSION['item_total']);
        unset($_SESSION['item_quantity']);
        redirect('checkout.php');    
    } else {
        redirect('checkout.php');    
    }
}

if(isset($_GET['delete'])) {
    $_SESSION['product_'.$_GET['delete']] = 0;
    unset($_SESSION['item_total']);
    unset($_SESSION['item_quantity']);
    
    redirect('checkout.php');    
}


function cart() {
    //init value of cart total
    $total = 0;
    
    //init total item quantity
    $item_quantity = 0;
    
    //paypal vars
    $item_name = 1;
    $item_number = 1; 
    $amount = 1;
    $quantity = 1;
    
    //init value of number of product titles; increments by 1 in each foreach iteration
    $counter = 1;
    print_r($_SESSION);
    //loop through all products
    foreach($_SESSION as $name => $value) {
        
        //get only the products that have a quantity > 0 (they have been added to cart)
        if($value > 0) {
            //get only the "product_" $_SESSION key
            if(substr($name, 0, 8) == "product_") {
                
                //extract the product id number
                $id = substr($name, 8);

                $query = query('SELECT * FROM products WHERE product_id ='.escape_string($id));

                confirm_query($query);
                
                

                while($row = fetch_array($query)) {
                    //each product will have its own respective subtotal
                    $sub_total = $row['product_price'] * $value;
                    $item_quantity += $value;
                    
                    $product = 
                        '<tr>
                            <td>'.$row['product_title'].'</td>
                            <td>$'.$row['product_price'].'</td>
                            <td>'.$value.'</td>
                            <td>$'.$sub_total.'</td>
                            <td>
                                <a class="btn btn-success" href="cart.php?add='.$row['product_id'].'"><span class="glyphicon glyphicon-plus"></span></a>
                                <a class="btn btn-warning" href="cart.php?remove='.$row['product_id'].'"><span class="glyphicon glyphicon-minus"></span></a>
                                <a class="btn btn-danger" href="cart.php?delete='.$row['product_id'].'"><span class="glyphicon glyphicon-remove"></span></a>
                            </td>
                        </tr>
                        <input type="hidden" name="item_name_'.$item_name.'" value="'.$row['product_title'].'">
                        <input type="hidden" name="item_number_'.$item_number.'" value="'.$row['product_id'].'">
                        <input type="hidden" name="amount_'.$amount.'" value="'.$row['product_price'].'">
                        <input type="hidden" name="quantity_'.$quantity.'" value="'.$value.'">';

                    echo $product;
                    
                    $item_name++;
                    $item_number++; 
                    $amount++;
                    $quantity++;
                    
                    //with each iteration of foreach, increase the cart total by the current iteration's subtotal and set it to the $_SESSION['item_total']
                    $_SESSION['item_total'] = $total += $sub_total;
                    $_SESSION['item_quantity'] = $item_quantity;
                    
                    //echo the current iteration's grand total
//                    echo $counter.' '.$_SESSION['item_total'];
            
                    //increment the product_title counter
//                    $counter++;
                }  
            }
        }
    }

}

function show_paypal() {
    
    if(isset($_SESSION['item_quantity'])) {
        $paypal_btn = '<input type="image" name="upload" border="0" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
alt="PayPal - The safer, easier way to pay online">';
    
        return $paypal_btn;   
    }
}

?>












