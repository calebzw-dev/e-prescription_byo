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
        <h4>Search Reviews </h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-7">
            
             <form action="" method="GET">
                <div class="input-group mb-3">
                
                    <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="National ID">
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
                    <th>National ID</th>
                    <th>Name</th>
                    <th>Next of Kin</th>
                    <th>Regi Date</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Sex</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Insurance</th>
                    <th>Image</th>
                    <th>Action</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <?php 
                       $con = mysqli_connect("localhost","root","","epsdb");

                       if(isset($_GET['search']))
                       {
                        $filtervalues = $_GET['search'];
                        $query = "SELECT * FROM patients WHERE CONCAT(national_id, pname, fname, regi_date, email, phone, sex, age, paddress, insurance,images) LIKE '%$filtervalues%' ";
                        $query_run = mysqli_query($con, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $item)
                            {
                                ?>
                                <tr>
                            <td><?= $item['national_id']?></td>
                            <td><?= $item['pname']?></td>
                            <td><?= $item['fname']?></td>
                            <td><?= $item['regi_date']?></td>
                            <td><?= $item['email']?></td>
                            <td><?= $item['phone']?></td>
                            <td><?= $item['sex']?></td>
                            <td><?= $item['age']?></td>
                            <td><?= $item['paddress']?></td>
                            <td><?= $item['insurance']?></td>
                            <td>
                            <img src="../<?= $item['images']; ?>" style="width:50px;height:50px;" alt="Img" />
                            </td>
                            <td>        
                                <a href="patients-edit.php?id=<?= $item['id']?>" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to edit this data?')">Edit</a> 
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