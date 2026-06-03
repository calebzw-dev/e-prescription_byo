<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
<div class="card mt-4 shadow-sm">
<div class="card-header">
                        <h4 class="mb-0">Add Patient Details
                            <a href="patients-create.php" class="btn btn-danger float-end">Back</a>
                        </h4>
</div>
<div class="card-body">
    <?php alertMessage(); ?>
    <form action="code.php" method="POST" enctype="multipart/form-data">
<div class=row>
<div class="col-md-3 mb-3">
        <label for="">National ID (99-999999X-99)?*</label>
        <input type="text" name="national_id" required class="form-control" placeholder="99-999999X-99?" />
</div>
<div class="col-md-3 mb-3">
        <label for="">Name *</label>
        <input type="text" name="pname" required class="form-control" placeholder="name?"/>
</div>
<div class="col-md-3 mb-3">
        <label for="">Next of Kin's Name *</label>
        <input type="text" name="fname" required class="form-control" placeholder="father?"/>
</div>

<div class="col-md-3 mb-3">
    <label for="regi_date">Registration Date *</label>
    <input type="date" name="regi_date" id="regi_date" required class="form-control" placeholder="regi date?"/>
</div>

<div class="col-md-3 mb-3">
        <label for="">Email Address *</label>
        <input type="email" name="email" required class="form-control" placeholder="email?"/>
</div>
<div class="col-md-3 mb-3">
        <label for="">Phone Number *</label>
        <input type="number" name="phone" required class="form-control" placeholder="phone?" />
</div>
<div class="col-md-3 mb-3">
    <label for="sex">Sex *</label>
    <select name="sex" required class="form-control">
        <option value="" disabled selected hidden>choose sex?</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select>
</div>
<div class="col-md-3 mb-3">
        <label for="">Age *</label>
        <input type="number" name="age" required class="form-control" placeholder="age?"/>
</div>
<div class="col-md-6 mb-3">
        <label for="">Home Address *</label>
        <input type="text" name="paddress" required class="form-control" placeholder="address?" />
</div>
<div class="col-md-3 mb-3">
    <label for="insurance">Insurance *</label>
    <select name="insurance" required class="form-control">
        <option value="" disabled selected hidden>are you insured??</option>
        <option value="insured">Insured</option>
        <option value="uninsured">Uninsured</option>
    </select>
</div>

<div class="col-md-4 mb-3">
        <label for="">Proof of National ID*</label>
        <input type="file" name="images" required class="form-control" multiple/>
</div>
    
<div class="col-md-2 mb-3 text-end">
    <br/>
        <button type="submit" name="savePatient" class="btn btn-primary">Save</button>
</div>
    </form>
</div>
</div>
</div>
<?php include('includes/footer.php'); ?> 