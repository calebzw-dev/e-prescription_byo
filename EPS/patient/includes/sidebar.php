<?php 
    $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/")+1);
?>

<div id="layoutSidenav_nav">
<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">

                            <a class="nav-link" href="http://127.0.0.1:3000/user" target="_blank" rel="noopener noreferrer">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-robot"></i></div>
                                MediBot
                            </a>
                            <!-- <div class="sb-sidenav-menu-heading">Manage Case</div> -->

                            <a class="nav-link 
                            <?= ($page == 'patients-create.php') || ($page == 'patients-update.php') ? 'collapse active':'collapsed'; ?>" 
                            href="#" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapsePatient" 
                            aria-expanded="false" aria-controls="collapsePatient">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-injured"></i></div>
                               Patient
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse <?= ($page == 'patients-create.php') || ($page == 'patients-update.php')  ? 'show':''; ?>" 
                            id="collapsePatient" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link <?= $page == 'patients-create.php' ? 'active':''; ?>" href="patients-create.php"> Add Details</a>
                                    <a class="nav-link <?= $page == 'patients-update.php' ? 'active':''; ?>" href="patients-update.php"> View Details</a>
                                </nav>
                            </div>

                            <!-- <div class="sb-sidenav-menu-heading">Main</div> -->

                            <a class="nav-link 
                            <?= ($page == 'prescriptions-update.php') ? 'collapse active':'collapsed'; ?>"
                            href="#" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapsePrescription" aria-expanded="false" aria-controls="collapsePrescription">
                                <div class="sb-nav-link-icon"><i class="fas fa-prescription"></i></div>
                                Prescriptions
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse <?= ($page == 'prescriptions-update.php') ? 'show':''; ?>"                            
                            id="collapsePrescription" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link <?= $page == 'prescriptions-update.php' ? 'active':''; ?>" href="prescriptions-update.php"> View Prescriptions</a>
                                </nav>
                            </div>

                            <a class="nav-link  
                            <?= ($page == 'plus2.php.') || ($page == 'emergency.php') || ($page == 'supermed.php') ? 'collapse active':'collapsed'; ?>"
                            href="#" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapsePharmacy" aria-expanded="false" aria-controls="collapsePharmacy">
                                <div class="sb-nav-link-icon"><i class="fas fa-medkit"></i></div>
                                Pharmacies
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse <?= ($page == 'plus2.php') || ($page == 'emergency.php')|| ($page == 'supermed.php') ? 'show':''; ?>" 
                            id="collapsePharmacy" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link <?= $page == 'plus2.php' ? 'active':''; ?> " href="plus2.php">Insured</a>
                                    <a class="nav-link <?= $page == 'emergency.php' ? 'active':''; ?>" href="emergency.php">Uninsured</a>
                                    <a class="nav-link <?= $page == 'supermed.php' ? 'active':''; ?>" href="supermed.php">In/Uninsured </a>
                                </nav>
                            </div>
                            <a class="nav-link 
                            <?= ($page == 'payment.php') || ($page == 'uploads.php') ? 'collapse active':'collapsed'; ?>" 
                            href="#" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapsePayment" 
                            aria-expanded="false" aria-controls="collapsePayment">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-sack-dollar"></i></div>
                               Payment 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse <?= ($page == 'payment.php') || ($page == 'uploads.php') ? 'show':''; ?>" 
                            id="collapsePayment" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link <?= $page == 'payment.php' ? 'active':''; ?>" href="payment.php">Uploads</a>
                                    <a class="nav-link <?= $page == 'uploads.php' ? 'active':''; ?>" href="uploads.php">View Uploads</a>
                                </nav>
                            </div>
                            <a class="nav-link
                            <?= ($page == 'register-update.php') ? 'collapse active':'collapsed'; ?>" 
                            href="#" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapseAdmins" 
                            aria-expanded="false" aria-controls="collapseAdmins">


                                <div class="sb-nav-link-icon"><i class="fa-solid fa-lock"></i></div>
                               Password
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse <?= ($page == 'register-update.php') ? 'show':''; ?>" 
                            id="collapseAdmins" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
            
                                    <a class="nav-link <?= $page == 'register-update.php' ? 'active':''; ?>" href="register-update.php">Change Password</a>
                                </nav>
                            </div>  


                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        patient <?= $_SESSION['loggedInUser']['pname']; ?>
                    </div>
                </nav>
            </div>
            