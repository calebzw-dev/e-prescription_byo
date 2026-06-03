<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
<div class="card mt-4 shadow-sm">
<div class="card-header">
                        <h4 class="mb-0"> Plus 2 Pharmacy
                            <a href="plus2.php" class="btn btn-danger float-end">Back</a>
                        </h4>
</div>
<div class="card-body">
    <?php alertMessage(); ?>

    <head>
        
        <style>
            body{
                background-color: whitesmoke;
            }
            input{
                width: 40%;
                height: 5%;
                border: 1px;
                border-radius: 65px;
                padding: 8px 15px 8px 15px;
                margin: 10px 0px 15px 0px;
                box-shadow: 1px 1px 2px 1px grey;
            }
        </style>

    </head>
    <body>
        <center>
        <form action="" method="POST">
    <input type="text" name="drug_name" placeholder="enter drug name to search"/> <br/>
    <input type="submit" name="search" value="search data">
</form>
<br/>

<?php 
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'pharmacy1');

if(isset($_POST['search']))
{
    $drug_name = $_POST['drug_name'];

    $query = "SELECT * FROM plus2 where drug_name='$drug_name' ";
    $query_run = mysqli_query($connection,$query);

    // Check if any rows are returned from the query
    if(mysqli_num_rows($query_run) > 0) {
        while($row = mysqli_fetch_array($query_run))
        {
            ?>
            <form action="" method="POST">
            <label for="drug_name">Drug Name:</label>
            <br/>
            <input type="text" name="drug_name" id="drug_name" value="<?php echo $row['drug_name'] ?>" />
            <br/>
            <label for="quantity">Quantity:</label>
            <br/>
            <input type="text" name="quantity" id="quantity" value="<?php echo $row['quantity'] ?>" />
            <br/>
            <label for="unit_price">Unit Price:</label>
            <br/>
            <input type="text" name="unit_price" id="unit_price" value="<?php echo $row['unit_price'] ?>" />
            <br/>
            <label for="expiry_date">Expiry Date:</label>
            <br/>
            <input type="text" name="expiry_date" id="expiry_date" value="<?php echo $row['expiry_date'] ?>" />
            </form>
            <?php
        }
    } else {
        // Display the message if no rows are returned
        echo "Drug is not available !";
    }
}
?>

                
            
            

        </center>
    </body>
    <?php include('includes/footer.php'); ?>
