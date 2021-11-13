<?php 
include('../library/utama.php');
include('../theme/admin/start_theme.php');
// panggil class
$call  = new database();
$call->koneksi();
if(isset($_POST['username']) && $_POST['password']){
    $proses = $call->login($_POST['username'], md5($_POST['password']));
}
?>
<main class="page-content">
            <div class="page-inner">
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-3 center">
                            <div class="login-box">
                                <a href="#" class="logo-name text-lg text-center">Sri Payment</a>
                                <p class="text-center m-t-md">Please login into your account.</p>
                                <form class="m-t-md" action="" target="_self" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Username" required name="username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" required name="password"> 
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block">Login</button>
                                    
                                </form>
                                <p class="text-center m-t-xs text-sm">2015 &copy; Modern by Steelcoders.</p>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
<?php 
include('../theme/admin/end_theme.php');
?>