<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php include('includes/header.php'); ?>
<body>
<div class="container">
<div class="row">
<div class="col-md-12">
    <div class="card mt-4">
        <div class="card-header">
        <h4>Search Your Authentication Details </h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-7">
            
             <form action="" method="GET">
                <div class="input-group mb-3">
                
                    <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Email">
                    <input type="text" required value="<?php echo $_SESSION['loggedInUser']['pname']; ?>" class="form-control"  readonly>
                    <button type="submit" class="btn btn-primary" >Search</button>
                </div>
             </form>
            </div>
         </div>
      </div>
  </div>
</div>

<div class="col-md-12">
    <div class="card mt-4">
    <div class="card-header">
        <h4>Your Personal Details </h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Receptionist</th>
                    <th>Action</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <?php 
                       $con = mysqli_connect("localhost","root","","epsdb");

                       if(isset($_GET['search']))
                       {
                        $filtervalues = $_GET['search'];
                        $query = "SELECT * FROM admins WHERE CONCAT(id, pname, email, phone, receptionist) LIKE '%$filtervalues%' ";
                        $query_run = mysqli_query($con, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $adminItem)
                            {
                                ?>
                                <tr>
                            <td><?= $adminItem['id']?></td>
                            <td><?= $adminItem['pname']?></td>
                            <td><?= $adminItem['email']?></td>
                            <td><?= $adminItem['phone']?></td>
                            <td>
                            <?php 
                                      if($adminItem['receptionist'] == 1){
                                        echo '<span class="badge bg-danger">Receptionist</span>';
                                      }
                            ?>
                            </td>
                             <td>         
                                <a href="register-edit.php?id=<?= $adminItem['id']?>" class="btn btn-success btn-sm">Edit</a>
                    
                             </td>
                                </tr>
                                <?php
                            }
                        }    
                             else
                        {
                            ?>
                            <tr>
                            <td colspan="4">No Record Found</td>
                            </tr>
                            <?php
                        }
                            
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php alertMessage(); ?>
</body>
</html>
<?php include('includes/footer.php'); ?> 