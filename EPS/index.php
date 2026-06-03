<?php include('includes/header.php');?>

<div class="py-5" style="background-image: url('assets/images/background3.jpg'); background-size: cover; background-position: center; height: 100vh;">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 py-5 text-right">


            <?php alertMessage(); ?>

            <h1 class="text-white bg" >EPS System</h1>

            <?php if(!isset($_SESSION['loggedIn'])) : ?>
            <a href="login.php" class="btn btn-primary mt-4">Login</a>
            <?php endif; ?>
             </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php');?>