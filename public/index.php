<?php require_once("../resources/config.php"); ?>

<?php include TEMPLATE_FRONT . DS . "header.php"; ?>   
   
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!--Categories here-->
            <?php include TEMPLATE_FRONT . DS . "side_nav.php"; ?>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <!--Carousel-->
                        <?php include TEMPLATE_FRONT . DS . "slider.php"; ?>
                    </div>

                </div>

                <div class="row">

                    <?php
                    
                    get_products();
                    
                    ?>
                   
<!--
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">
                            <div class="caption">
                                <h4 class="pull-right">$24.99</h4>
                                <h4><a href="product.html">First Product</a>
                                </h4>
                                <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                                <a class="btn btn-primary" target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">View Tutorial</a>
                            </div>
                        </div>
                    </div>
-->

                   
                   


                    
                    

                    

                </div><!--row-->

            </div>

        </div>

    </div>
    <!-- /.container -->

<?php include TEMPLATE_FRONT . DS . "footer.php"; ?>   