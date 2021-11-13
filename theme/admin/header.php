<div class="header">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                    <div class="logo">
                        <a href="index.html"><img src="../asset/admin/images/logo.png" alt=""></a>
                    </div>

                    <span class="nav-control">
                        <i class="fa fa-bars"></i>
                    </span>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="header-search">
                        <form action="#">
                            <div class="form-group">
                                <i class="icofont icofont-search"></i>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                    
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="header-user-profile">
                        <div class="dropdown">
                            <div data-toggle="dropdown">
                                <p> <?php echo $_SESSION['nama_admin']; ?> :
                                    <span><?php echo $_SESSION['level']; ?></span></p>
                                <img src="../asset/admin/images/thumb/1.png" alt="">
                            </div>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /# header -->