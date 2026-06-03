<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
<div class="card mt-4 shadow-sm">
<div class="card-header">
                        <h4 class="mb-0">Add Payment Confirmation
                            <a href="payments.php" class="btn btn-danger float-end">Back</a>
                        </h4>
</div>
<div class="card-body">
    <?php alertMessage(); ?>
    <form action="code.php" method="POST" id="add_form" enctype="multipart/form-data">

<?php $parmValue = checkParamId('id');
if(!is_numeric($parmValue)){
    echo '<h5>'.$parmValue.'</h5>';
    return false;
}

$payment = getById('uploads',$parmValue);
if($payment['status'] == 200){
?>
<input type="hidden" name="id" value="<?= $payment['data']['id']; ?>">
<div class=row>
<div class="col-md-3 mb-3">
        <label for="">National ID (99-999999X-99)?*</label>
        <input type="text" name="national_id" required value="<?= $payment['data']['national_id']; ?>" class="form-control" placeholder="99-999999X-99?"/>
</div>

<div class="col-md-3 mb-3">
    <label for="">Visit Date *</label>
    <input type="text" name="vdate"  required value="<?= $payment['data']['vdate']; ?>" class="form-control"/>
</div>
 
<div class="col-md-3 mb-3">
        <label for="">Paid in Cash *</label>
        <br/>
        <input type="checkbox" name="paid" <?= $payment['data']['paid'] == true ? 'checked':''; ?> style="width:30px;height:30px;" />
</div>

<div class="col-md-2 mb-3 text-end">
    <br/>
        <button type="submit" name="updatePay" class="btn btn-primary">Update</button>
</div>
<?php
}
else
{
      echo '<h5>'.$payment['message'].'</h5>';
}
?>
    </form>
</div>
</div>
</div>
<?php include('includes/footer.php'); ?> 