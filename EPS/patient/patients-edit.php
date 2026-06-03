<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
<div class="card mt-4 shadow-sm">
<div class="card-header">
                        <h4 class="mb-0">Edit Patient
                            <a href="patients-update.php" class="btn btn-danger float-end">Back</a>
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

         $patient = getById('patients', $paramValue);
         if($patient['status'] == 200)
         {
              ?>
 
 <input type="hidden" name="patientId" value="<?= $patient['data']['id']; ?>" />
<div class="row">
<div class="col-md-3 mb-3">
        <label for="">National ID *</label>
        <input type="text" name="national_id" required value="<?= $patient['data']['national_id']; ?>" class="form-control" placeholder="99-999999X-99?"/>
</div>
<div class="col-md-3 mb-3">
        <label for="">Name *</label>
        <input type="text" name="pname" required value="<?= $patient['data']['pname']; ?>" class="form-control" placeholder="name?"/>
</div>
<div class="col-md-3 mb-3">
        <label for="">Next of Kin *</label>
        <input type="text" name="fname" required value="<?= $patient['data']['fname']; ?>" class="form-control" placeholder="next of kin?"/>
</div>

<div class="col-md-3 mb-3">
        <label for="">Registration Date *</label>
        <input type="text" name="regi_date" required value="<?= $patient['data']['regi_date']; ?>" class="form-control" placeholder="regi_date?"/>
</div>
<div class="col-md-3 mb-3">
        <label for="">Email Address *</label>
        <input type="email" name="email" required value="<?= $patient['data']['email']; ?>" class="form-control" placeholder="email?"/>
</div>
<div class="col-md-3 mb-3">
        <label for="">Phone Number*</label>
        <input type="number" name="phone" required value="<?= $patient['data']['phone']; ?>" class="form-control" placeholder="phone?"/>
</div>
<div class="col-md-3 mb-3">
    <label for="sex">Sex</label>
    <select name="sex" class="form-control">
        <option value="" disabled selected hidden>choose sex?</option>
        <option value="male" <?php if ($patient['data']['sex'] == 'male') echo 'selected'; ?>>Male</option>
        <option value="female" <?php if ($patient['data']['sex'] == 'female') echo 'selected'; ?>>Female</option>
    </select>
</div>
<div class="col-md-3 mb-3">
        <label for="">Age *</label>
        <input type="number" name="age" required value="<?= $patient['data']['age']; ?>" class="form-control" placeholder="age?"/>
</div>
<div class="col-md-6 mb-3">
        <label for="">Address *</label>
        <input type="text" name="paddress" required value="<?= $patient['data']['paddress']; ?>" class="form-control" placeholder="address?"/>
</div>
<div class="col-md-3 mb-3">
    <label for="insurance">Insurance *</label>
    <select name="insurance" class="form-control">
        <option value="" disabled selected hidden>are you insured?</option>
        <option value="insured" <?php if ($patient['data']['insurance'] == 'insured') echo 'selected'; ?>>Insured</option>
        <option value="uninsured" <?php if ($patient['data']['insurance'] == 'uninsured') echo 'selected'; ?>>Uninsured</option>
    </select>
</div>

<div class="col-md-4 mb-3">
        <label for="">Proof of National ID *</label>
        <input type="file" name="images" class="form-control" />
        <img src="../<?= $patient['data']['images']; ?>" style="width:40px;height:40px;" alt="Img"/>
</div>
<div class="col-md-2 mb-3 text-end">
    <br/>
        <button type="submit" name="updatePatient" class="btn btn-primary">Update</button>
</div>
              <?php
         }
         else
         {
            echo '<h5>'.$patient['message'].'</h5>';
            return false;
         }
    ?>

    </form>
</div>
</div>
</div>
<?php include('includes/footer.php'); ?> 