<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
     <div class="card mt-4 shadow-sm">
        <div class="card-header">
                        <h4 class="mb-0">Cash Payments
                        <a href="payments.php" class="btn btn-primary float-end">Confirm</a>
                        </h4>
</div>
<div class="card-body">
<?php alertMessage(); ?>
<?php 
         $admins = getAll('uploads');
         if (!$admins){
                 echo'<h4> Something Went Wrong!</h4>';
                 return false;
         }
         if(mysqli_num_rows($admins) > 0)
         {

    ?>
    <div class="table-responsive">
        <table class="table table-stripped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>National ID</th>
                    <th>Visit Date</th>
                    <th>Proof of Payment</th>
                    <th>Paid</th>
                    <th>Action</th>
</tr>
</thead>
<tbody>
    
    <?php foreach($admins as $adminItem) : ?>
                 <tr>
                            <td><?= $adminItem['id']?></td>
                            <td><?= $adminItem['national_id']?></td>
                            <td><?= $adminItem['vdate']?></td>
                            <td>
                                <img src="../<?= $item['images']; ?>" style="width:50px;height:50px;" alt="Img" />
                            </td>
                            <td>
                            <?php 
                                      if($adminItem['paid'] == 1){
                                        echo '<span class="badge bg-primary">Paid</span>';
                                      }
                                      else{
                                        echo '<span class="badge bg-danger">Not Paid</span>';
                                      }
                            ?>
                            </td>
                             <td>         
                                <a href="payment.php?id=<?= $adminItem['id']?>" class="btn btn-success btn-sm">Edit</a>
                                <a href="admins-delete.php?id=<?= $adminItem['id']?>" class="btn btn-danger btn-sm">Delete</a>
                             </td>
                 </tr>
                 <?php endforeach; ?>
                 
                   </tbody>
                </table>
            </div>
            <?php 
         }
         else
         {
            ?>
                  <h4 colspan="mb-0">No Record Found</h4>
            <?php
         }
         ?>
         </div>
    </div>
</div>
 <?php include('includes/footer.php'); ?>                       