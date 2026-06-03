<?php 
    $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/")+1);
?>

<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Registration</div>
                            
                            <a class="nav-link
                            <?= ($page == 'register.php')? 'collapse active':'collapsed'; ?>" 
                            href="#" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapseRegister" 
                            aria-expanded="false" aria-controls="collapseRegister">


                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                               Register
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse <?= ($page == 'register.php') ? 'show':''; ?>" 
                            id="collapseRegister" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link <?= $page == 'register.php' ? 'active':''; ?>" href="register.php">Create Password</a>
                                </nav>
                            </div>  

                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:
                            Patient
                        </div>
                    
                    </div>
                </nav>
            </div>
            