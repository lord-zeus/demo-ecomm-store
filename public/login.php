<?php require_once("../resources/config.php"); ?>

<?php include TEMPLATE_FRONT . DS . "header.php"; ?>   

    <!-- Page Content -->
    <div class="container">

      <header>
            <h1 class="text-center">Login</h1>
            <h2 class="text-center bg-danger"><?php display_message() ?></h2>
        <div class="col-sm-4 col-sm-offset-5">         
            <form class="" action="" method="post" enctype="multipart/form-data">
            <?php 

            if(isset($_POST['submit'])) {
                $username = escape_string($_POST['username']);
                $password = escape_string($_POST['password']);

                $query = query("SELECT * FROM users WHERE user_name = '{$username}' AND user_password = '{$password}'");

                confirm_query($query);

                if(mysqli_num_rows($query) == 0) {
                    set_message('Incorrect username/password combination');
                    redirect('login.php');    
                } else {
                    $_SESSION['username'] = $username;
                    redirect('admin');    
                }

            }

            ?>
                <div class="form-group"><label for="">
                    Username<input type="text" name="username" class="form-control"></label>
                </div>
                 <div class="form-group"><label for="password">
                    Password<input type="text" name="password" class="form-control"></label>
                </div>

                <div class="form-group">
                  <input type="submit" name="submit" class="btn btn-primary" >
                </div>
            </form>
        </div>  


    </header>


        </div>

    </div>
    <!-- /.container -->


<?php include TEMPLATE_FRONT . DS . "footer.php"; ?>   