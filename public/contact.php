
<!-- Configuration-->

<?php require_once("../resources/config.php"); ?>


<!-- Header and nav-->
<?php include(TEMPLATE_FRONT .  "/header.php");?>

         <!-- Contact Section -->

        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contact Us</h2>
                    <h3 class="section-subheading bg-danger"><?php display_message() ?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <form name="sentMessage" id="contactForm" method="post">
                    <?php 

                    if(isset($_POST['submit'])) {
                        $to = "email@address.com";
                        $from_name = $_POST['name'];
                        $subject = $_POST['subject'];
                        $email = $_POST['email'];
                        $message = $_POST['message'];

                        $headers = "From: {$from_name} {$email}";

                        $send_email = mail($to, $subject, $message, $headers);

                        if(!$send_email) {
                            set_message('Error!');
                            redirect('contact.php');
                        } else {
                            set_message('Sent!');
                            redirect('contact.php');
                        }
                    }


                    ?>
                        <div class="row">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control" placeholder="Your Subject *" id="phone" required data-validation-required-message="Please enter your subject.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="message" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" name="submit" class="btn btn-xl">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->
<?php include(TEMPLATE_FRONT .  "/footer.php");?>