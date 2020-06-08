<?php  require_once("../resources/config.php");    ?>
<?php include(TEMPLATE_FRONT . DS . "HEADER.PHP") ?>

    <!-- Page Content -->
    <div class="container">
  
        <!-- Jumbotron Header -->
        <header>
<h1 class="booksxo"> All Our Books</h1>
        </header>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">


    <?php  get_product();  ?>
        <!-- /.row -->

        <hr>

        <?php include(TEMPLATE_FRONT . DS . "FOOTER.PHP") ?>

