<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
<div class="card mt-4 shadow-sm">
<div class="card-header">
                        <h4 class="mb-0">Add Payment Confirmation
                            <a href="payment.php" class="btn btn-danger float-end">Back</a>
                        </h4>
</div>
<div class="card-body">
    <?php alertMessage(); ?>
    <form action="code.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $pay['data']['id']; ?>">    
<div class=row>
<div class="col-md-3 mb-3">
        <label for="">National ID (99-999999X-99)?*</label>
        <input type="text" name="national_id" required class="form-control" placeholder="99-999999X-99?" />
</div>

<div class="col-md-3 mb-3">
    <label for="vdate">Visit Date *</label>
    <input type="date" name="vdate" id="vdate" required class="form-control" placeholder="visit date?" value="<?php echo isset($_POST['vdate']) ? $_POST['vdate'] : ''; ?>"/>
</div>

<div class="col-md-4 mb-3">
        <label for="">Proof of Payment*</label>
        <input type="file" name="images" class="form-control" multiple/>
</div>
    
<div class="col-md-2 mb-3 text-end">
    <br/>
        <button type="submit" name="savePay" class="btn btn-primary">Save</button>
</div>
    </form>
</div>
</div>
</div>
<?php include('includes/footer.php'); ?> 