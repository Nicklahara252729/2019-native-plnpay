<?php 
session_start();
include('../library/utama.php');
//panggil class
$call  = new database();
$call->koneksi();
if(isset($_POST['username']) && $_POST['password']){
    $proses = $call->login($_POST['username'], md5($_POST['password']));
}

include('../theme/admin/start_theme.php');
?>
<div class="content-body">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-md-offset-3" style="margin: 0 auto;">
                    <div class="card">
                        <form id="" action="" method="post" target="_self">
                        <div class="card-body">
              
                        
                          <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username" name="username">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-key"></i></span>
                    </div>
                    <input type="password" class="form-control" placeholder="Password" name="password">
                  </div>
                </div>
                        
            
            <div class="card-footer">
                          <button type="submit" class="btn btn-success">Login</button>
                        </div>
            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /# content body -->

<?php 
include('../theme/admin/end_theme.php');
?>