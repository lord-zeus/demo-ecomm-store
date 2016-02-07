<?php require_once("../resources/config.php"); ?>

<?php include TEMPLATE_FRONT . DS . "header.php"; ?>   

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            <h1>
            <?php 
                if(isset($_GET['id'])) {
                    $the_cat_id = $_GET['id'];
                    $cat_name_query = "SELECT * FROM categories WHERE cat_id = $the_cat_id";
                    
                    $cat_results = query($cat_name_query);
                    
                    while($row = fetch_array($cat_results)) {
                        
                        echo $row['cat_title'];
                    }
                    
                }
                
                
            ?>
            </h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
            <p><a class="btn btn-primary btn-large">Call to action!</a>
            </p>
        </header>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Latest Features</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">
            
            <?php 
            
            if(isset($_GET['id'])):
            
                $the_cat_id = escape_string($_GET['id']);   
                
                $query = "SELECT * FROM products WHERE product_category_id = $the_cat_id";
                $results = query($query);
                confirm_query($query);

                while($row = fetch_array($results)): 
            
            ?>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="../resources/<?php echo display_image($row['product_image']); ?>" alt="">
                    <div class="caption">
                        <h3><?php echo $row['product_title'] ?></h3>
                        <p>asdfhlasfjkl asflkj;al lkasjf lkjl;asjf lk</p>
                        <p>
                            <a href="../resources/cart.php?add=<?php echo $row['product_id']; ?>" class="btn btn-primary">Buy Now!</a> 
                            <a href="item.php?id=<?php echo $row['product_id']?>" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>
            
            <?php
            
                endwhile;
            endif;
            
            ?>


        </div>
        <!-- /.row -->

        <hr>

    </div>
    <!-- /.container -->


<?php include TEMPLATE_FRONT . DS . "footer.php"; ?>   