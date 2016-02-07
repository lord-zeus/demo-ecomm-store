<?php require_once("../resources/config.php"); ?>

<?php include TEMPLATE_FRONT . DS . "header.php"; ?>   

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron">
            <h1>Shop</h1>
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
                $query = "SELECT * FROM products";
                $results = query($query);
                confirm_query($query);

                while($row = fetch_array($results)): 
            
            ?>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="../resources/<?php echo display_image($row['product_image']); ?>" alt="" height="150">
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
            ?>


        </div>
        <!-- /.row -->

        <hr>

    </div>
    <!-- /.container -->


<?php include TEMPLATE_FRONT . DS . "footer.php"; ?>   