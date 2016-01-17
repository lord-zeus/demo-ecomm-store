<?php 

require_once('../../resources/config.php');

include(TEMPLATE_BACK . '/header.php'); 

if(!isset($_SESSION['username'])) {
    redirect('../../public');
}

?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->


                <?php 
                
                if($_SERVER['REQUEST_URI'] == '/ecomm-store/public/admin/' || $_SERVER['REQUEST_URI'] == '/ecomm-store/public/admin/index.php') {
                    include(TEMPLATE_BACK . '/admin_content.php');    
                }
                
                if(isset($_GET['orders'])) {
                    include(TEMPLATE_BACK . '/orders.php');    
                }
                
                if(isset($_GET['add_product'])) {
                    include(TEMPLATE_BACK . '/add_product.php');    
                }
                if(isset($_GET['categories'])) {
                    include(TEMPLATE_BACK . '/categories.php');    
                }
                if(isset($_GET['products'])) {
                    include(TEMPLATE_BACK . '/products.php');    
                }
                
                ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php 

include(TEMPLATE_BACK . '/footer.php'); 

?>
