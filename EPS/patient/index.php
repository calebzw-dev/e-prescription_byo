<?php include('includes/header.php'); ?>

<div class="container-fluid px-4" style="background-color: black; height: 83vh;">

<div class="row justify-content-center">
    <div class="col-md-6 text-center">
        <h1 class="text-white mt-4">Welcome <?= $_SESSION['loggedInUser']['pname']; ?> !<br/>
        Please kindly enter your details.</h1>
        <?php alertMessage(); ?>
    </div>
</div>
                                

<?php include('includes/footer.php'); ?>
