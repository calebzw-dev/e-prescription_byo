<?php 
    $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/")+1);
?>

<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Add Information</div>

                            <a class="nav-link 
                            <?= ($page == 'patients-create.php.php') ? 'collapse active':'collapsed'; ?>" 
                            href="#" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapsePatient" 
                            aria-expanded="false" aria-controls="collapsePatient">


                                <div class="sb-nav-link-icon"><i class="fas fa-user-injured"></i></div>
                               Patients
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse <?= ($page == 'patients-create.php') ? 'show':''; ?>" 
                            id="collapsePatient" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link <?= $page == 'patients-create.php' ? 'active':''; ?>" href="patients-create.php">Add Your Details</a>
                                    
                                </nav>
                            </div>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        patient 
                    </div>
                </nav>
            </div>
            