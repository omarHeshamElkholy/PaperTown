<?php  require_once("../resources/config.php");    ?>
<?php include(TEMPLATE_FRONT . DS . "HEADER.PHP") ?>

         <!-- Contact Section -->

        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Sell us your book</h2>
                    <h3 class="section-subheading text-muted">
                    <?php display_message();   ?>
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" method="post" >
                    <?php sell_book();   ?>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control" placeholder="Your Phone *" id="phone" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="bookSold" class="form-control" placeholder="What you're selling *" id="email" required data-validation-required-message="Please enter the name of your book.">
                                    <p class="help-block text-danger"></p>
                                </div>

                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                    <input type="text" name="link" class="form-control" placeholder="Goodreads Link *" id="email" required data-validation-required-message="Please provide a Goodreads link.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="Condition" class="form-control" placeholder="Condition of your book *" id="email" required data-validation-required-message="Please enter the condition of your book.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="Comments" placeholder="Comments" id="comment"></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button name="submit" type="submit" class="btn btn-xl">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->
<?php include(TEMPLATE_FRONT .  "/footer.php");?>