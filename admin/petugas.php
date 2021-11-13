<?php 
session_start();
error_reporting(0);
include('../library/utama.php');
//panggil class
$call  = new database();
$call->koneksi();
if($_SESSION['status']!=TRUE){
            header("location:login.php");
        }
//show data
$data    = $call->tampil_petugas();
//show level
$level    = $call->tampil_level();

//delete data
if(isset($_GET['key'])){
$key   =$_GET['key'];
$hapus =$call->hapus_petugas($key);
}

//simpan data
if(isset($_POST['username'])){
        $simpan_data =$call->insert_petugas($_POST['nama'],$_POST['username'],$_POST['password'],$_POST['level']);
}

//simpan data
if(isset($_POST['usernameedit'])){
        $simpan_data =$call->update_petugas($_GET['keyedit'],$_POST['namaedit'],$_POST['usernameedit'],$_POST['passwordedit'],$_POST['leveledit']);
}
include('../theme/admin/start_theme.php');
?>
<div class="content-wrapper">
	<?php if(isset($_GET['keyedit'])){ ?> 
		<div class="card">
            <div class="card-body">              
            	<h4 class="card-title">Edit data</h4>
              <div class="row">
                <div class="col-12">
                  <form class="forms-sample" method="post" target="_self">
                        <div class="form-group">
                        	<input type="text" id="name-input" class="form-control" placeholder="Name" required name="namaedit" value="<?php echo $call->baca_petugas("nama_admin",$_GET['keyedit']); ?>">
                        </div>
                        <div class="form-group">
							<input type="text" id="position-input" class="form-control" placeholder="Username" required name="usernameedit" value="<?php echo $call->baca_petugas("username",$_GET['keyedit']); ?>">
						</div>
						<div class="form-group">
							<input type="password" id="age-input" class="form-control" placeholder="Password"  name="passwordedit">
						</div>
						<div class="form-group">
							<select name="leveledit" id="level" class="form-control">
												<?php foreach($level as $shows){ ?>
                                                                    <option value="<?php echo $shows['id_level']; ?>" <?php if($call->baca_petugas("id_level",$_GET['keyedit']) == $shows['id_level']){echo"selected";} ?> > <?php echo $shows['nama_level']; ?></option>
                                                                <?php }?>
                                                            </select>
                                                        </div>
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                        <a href="petugas.php" class="btn btn-light">Cancel</a>
                      </form>
                </div>
              </div>
            </div>
          </div>
<?php } ?>

          <div class="card">
            <div class="card-body">              
            	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">Tambah Data<i class="icon-control-play ml-1"></i></button>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table id="order-listing" class="table">
                    <thead>
                      <tr>
                          <th>No</th>
						<th>Nama lengkap</th>
						<th>Username</th>
						<th>Level</th>
						<th>Tool</th>
                      </tr>
                    </thead>
                    <tbody>
                    	<?php $number=1; 
						foreach($data as $row){ ?>
						<tr>
						<td align="center"><?php echo $number; ?></td>
						<td><?php echo $row['nama_admin']; ?></td>
						<td><?php echo $row['username']; ?></td>
						<td><?php echo $row['nama_level']; ?></td>
						<td>
						<a class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus data ini ?');" href="petugas.php?key=<?php echo $row['id_admin']; ?>"><i class="icon-trash"></i> </a>
						<a class="btn btn-warning" href="petugas.php?keyedit=<?php echo $row['id_admin']; ?>"><i class="icon-pencil"></i></a>
						</td>
						</tr>
						<?php $number++; } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

<!-- Modal starts -->
                  <div class="text-center">
                  </div>
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Tambah petugas</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form id="" action="" method="post" target="_self">
                        <div class="modal-body">
                          <div class="form-group">
                                                            <input type="text" id="name-input" class="form-control" placeholder="Name" required name="nama">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" id="position-input" class="form-control" placeholder="Username" required name="username">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="password" id="age-input" class="form-control" placeholder="Password" required name="password">
                                                        </div>
                                                        <div class="form-group">
                                                            <select name="level" id="level" class="form-control">
                                                                <?php foreach($level as $show){ ?>
                                                                    <option value="<?php echo $show['id_level']; ?>"><?php echo $show['nama_level']; ?></option>
                                                                <?php }?>
                                                            </select>
                                                        </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-success">Submit</button>
                          <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                      </div>
                    </div>
                  </div>
                  <!-- Modal Ends -->

</div>
<?php 
include('../theme/admin/end_theme.php');
?>