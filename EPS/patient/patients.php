<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
<div class="card mt-4 shadow-sm">
<div class="card-header">
                        <h4 class="mb-0">Patients
                            <a href="patients-create.php" class="btn btn-primary float-end">Add Patient</a>
                        </h4>
</div>
<div class="card-body">

<?php alertMessage(); ?>

<?php 
         $patients = getAll('patients');
         if (!$patients){
                 echo '<h4> Something Went Wrong!</h4>';
                 return false;
         }
         if(mysqli_num_rows($patients) >0)
         {

    ?>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>National ID</th>
                    <th>Name</th>
                    <th>Father's Name</th>
                    <th>Spouse Name</th>
                    <th>Regi Date</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Sex</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Insurance</th>
                    <th>Signs & Symptoms</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
</tr>
</thead>
<tbody>
    
    <?php foreach($patients as $item) : ?>
                 <tr>
                            <td><?= $item['national_id']?></td>
                            <td><?= $item['pname']?></td>
                            <td><?= $item['fname']?></td>
                            <td><?= $item['sname']?></td>
                            <td><?= $item['regi_date']?></td>
                            <td><?= $item['email']?></td>
                            <td><?= $item['phone']?></td>
                            <td><?= $item['sex']?></td>
                            <td><?= $item['age']?></td>
                            <td><?= $item['paddress']?></td>
                            <td><?= $item['insurance']?></td>
                            <td><?= $item['symptoms']?></td>
                            <td>
                                <img src="../<?= $item['images']; ?>" style="width:50px;height:50px;" alt="Img" />
                            </td>
                            <td>
                                <?php 
                                      if($item['status'] == 1){
                                        echo '<span class="badge bg-danger">Not Reviewed</span>';
                                      }else{
                                        echo '<span class="badge bg-primary">Reviewed</span>';
                                      }
                                      ?>
                             </td>
                             <td>
                                <a target="_blank" href="patientprint.php?id=<?= $item['id']?>" class="btn btn-info btn-sm"><i class="fa fa-file-pdf-o"></i>Print</a>         
                                <a href="patients-edit.php?id=<?= $item['id']?>" class="btn btn-success btn-sm">Edit</a>
                                <a 
                                href="patients-delete.php?id=<?= $item['id']?>" 
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this data?')"
                                >
                                Delete
                            </a>
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
                               <tr>
                            <h4 colspan="mb-0">No Record Found</h4>
                        </tr>
                        <?php
         }
         ?>
         </div>
    </div>
</div>
 <?php include('includes/footer.php'); ?>          