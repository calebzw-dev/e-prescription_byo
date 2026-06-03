<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
<div class="card mt-4 shadow-sm">
<div class="card-header">
                        <h4 class="mb-0">Edit Payment Confirmation
                            <a href="upload.php" class="btn btn-danger float-end">Back</a>
                        </h4>
</div>
<div class="card-body">
    <?php alertMessage(); ?>
    <form action="code.php" method="POST" enctype="multipart/form-data">
    <?php 
         $paramValue = checkParamId('id');
         if(!is_numeric($paramValue)){
            echo '<h5>'.$paramValue.'</h5>';
            return false;
         }

         $pay = getById('uploads', $paramValue);
         if($pay['status'] == 200)
         {
              ?>
 
 <input type="hidden" name="payId" value="<?= $pay['data']['id']; ?>" />
<div class=row>

<div class="col-md-3 mb-3">
    <label for="">Visit Date *</label>
    <input type="text" name="vdate" required value="<?= $pay['data']['vdate']; ?>" class="form-control"/>
</div>

<div class="col-md-4 mb-3">
        <label for="">Proof of Payment *</label>
        <input type="file" name="images" class="form-control" />
        <img src="../<?= $pay['data']['images']; ?>" style="width:40px;height:40px;" alt="Img"/>
</div>
    
<div class="col-md-2 mb-3 text-end">
    <br/>
        <button type="submit" name="updatePay" class="btn btn-primary">Update</button>
</div>
<?php
         }
         else
         {
            echo '<h5>'.$pay['message'].'</h5>';
            return false;
         }
    ?>
    </form>
</div>
</div>
</div>
<?php include('includes/footer.php'); ?> 