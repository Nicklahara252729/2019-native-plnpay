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
include('../theme/admin/menu.php');
include('../theme/admin/sidebar.php');
include('../theme/admin/right_menu.php');
?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <h2>Petugas</h2>
                    <ul class="breadcrumb padding-0">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">home</a></li>
                        <li class="breadcrumb-item active">petugas</li>
                    </ul>
                </div>            
                <div class="col-lg-7 col-md-7 col-sm-12">
                    <div class="input-group mb-0">
                        <input type="text" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="zmdi zmdi-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php if(isset($_GET['keyedit'])){ ?> 
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    </div>
                    <div class="body">
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
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                    	<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#defaultModal">Tambah data
                      <i class="mdi mdi-play-circle ml-1"></i>
                    </button>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
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
						<a class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus data ini ?');" href="petugas.php?key=<?php echo $row['id_admin']; ?>">Hapus </a>
						<a class="btn btn-warning" href="petugas.php?keyedit=<?php echo $row['id_admin']; ?>">Edit</a>
						</td>
						</tr>
						<?php $number++; } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                        <th>No</th>
						<th>Nama lengkap</th>
						<th>Username</th>
						<th>Level</th>
						<th>Tool</th>
                      </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table --> 
    </div>
</section>

<!-- Default Size -->
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">TAMBAH DATA</h4>
            </div>
            <div class="modal-body"> <form id="" action="" method="post" target="_self">
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
include('../theme/admin/end_theme.php');
?>