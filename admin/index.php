<?php include('includes/header.php'); ?>

<div class="container-fluid px-4" style="background-image: url('assets/img/background3.jpg'); background-size: cover; background-position: center; height: 100vh;">

        
        
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-white mt-4">Dashboard</h1>
            <?php alertMessage(); ?>
        </div>
                                
        <div class="col-md-3 mb-3">
            <div class="card card-body bg-primary">
                <p class="text-sm mb-0 text-captalize">Total Category</p>
                    <h5 class="fw-bold mb-0">
                        <?= getCount('categories'); ?>
                    </h5>                     
                     </div>
                </div>

                <div class="col-md-3 mb-3">
            <div class="card card-body bg-warning p-3">
                <p class="text-sm mb-0 text-captalize">Total Products</p>
                    <h5 class="fw-bold mb-0">
                        <?= getCount('products'); ?>
                    </h5>                    
                     </div>
                </div>

                <div class="col-md-3 mb-3">
            <div class="card card-body bg-info p-3">
                <p class="text-sm mb-0 text-captalize">Total Admins</p>
                    <h5 class="fw-bold mb-0">
                        <?= getCount('admins'); ?>
                    </h5>                    
                     </div>
                </div>

                <div class="col-md-3 mb-3">
            <div class="card card-body bg-danger p-3">
                <p class="text-sm mb-0 text-captalize">Total Customers</p>
                    <h5 class="fw-bold mb-0">
                        <?= getCount('customers'); ?>
                    </h5>                    
                     </div>
                </div>

                <div class="col-md-12 mb-3">
                    <hr>
                <h5 class="text-white">Orders</h5>
                </div> 
                
                <div class="col-md-3 mb-3">
            <div class="card card-body p-3">
                <p class="text-sm mb-0 text-captalize">Total Orders</p>
                    <h5 class="fw-bold mb-0">
                        <?php 
                             $todayDate = date('Y-m-d');
                             $todayOrders = mysqli_query($conn,"SELECT * FROM WHERE order_date='$todayDate' ");
                             if($todayOrders){
                                if(mysqli_num_rows($todayOrders) > 0){
                                    $totalCount = mysqli_num_rows($todayOrders);
                                    echo $totalCountOrOrders;
                                }else{
                                    echo "0";
                             }
                            }else{
                                echo 'something went wrong';
                            }

                        ?>
                    </h5>                    
                     </div>
                </div> 
                <div class="col-md-3 mb-3">
            <div class="card card-body p-3">
                <p class="text-sm mb-0 text-captalize">Total Orders</p>
                    <h5 class="fw-bold mb-0">
                        <?= getCount('orders'); ?>
                    </h5>                     
                     </div>
            </div>

            </div>
</div>
</div>

 <?php include('includes/footer.php'); ?>