<?php 
session_start();
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
include('../theme/admin/header.php');
include('../theme/admin/menu.php');
?>
<div class="content-body">
        <div class="container">
        	<?php if(isset($_GET['keyedit'])){ ?> 
        	<div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
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
                        <button class="btn btn-light">Cancel</button>
                      </form>
            			</div>
                      </div>
                    </div>
                </div>
              <?php } ?>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#creat-event">Tambah data
                      <i class="mdi mdi-play-circle ml-1"></i>
                    </button>
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
						<a class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus data ini ?');" href="petugas.php?key=<?php echo $row['id_admin']; ?>"><i class="fa fa-trash"></i> </a>
						<a class="btn btn-warning" href="petugas.php?keyedit=<?php echo $row['id_admin']; ?>"><i class="fa fa-pencil"></i></a>
						</td>
						</tr>
						<?php $number++; } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /# content body -->

    <!-- Modal -->
    <div class="modal fade creat-event" id="creat-event">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>TAMBAH DATA</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="" action="" method="post" target="_self">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-12">
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
<?php 
include('../theme/admin/footer.php');
include('../theme/admin/end_theme.php');
?>