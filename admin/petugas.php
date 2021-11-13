<?php 
session_start();
if($_SESSION['status']!=TRUE){
            header("location:login.php");
        }
include('../library/utama.php');
include('../theme/admin/start_theme.php');
include('../theme/admin/navbar_satu.php');
include('../theme/admin/navbar_dua.php');
include('../theme/admin/search.php');

// panggil class
$call  = new database();
$call->koneksi();

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
?>
<main class="page-content content-wrap">
            <?php 
            include('../theme/admin/navigation.php');
            include('../theme/admin/menu.php');
            ?>
            <div class="page-inner">
              <?php include('../theme/admin/page_title.php');?>  
                <div id="main-wrapper">
                    <?php if(isset($_GET['keyedit'])){ ?> 
                    <div class="row">
                        <div class="col-md-12">
                            <form id="" action="" method="post" target="_self">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="modal-title" id="myModalLabel">Edit petugas</h4>
                                                </div>
                                                <div class="modal-body">
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
                                                </div>
                                                <div class="modal-footer">
                                                    <a type="button" class="btn btn-default" href="petugas.php">Cancel</a>
                                                    <button type="submit" id="add-row" class="btn btn-success">Simpan perubahan</button>
                                                </div>
                                            </div>
                                        
                                    </form>
                        </div>
                    </div>
                <?php } ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Petugas</h4>
                                </div>
                                <div class="panel-body">
                                    <button type="button" class="btn btn-success m-b-sm" data-toggle="modal" data-target="#myModal">Tambah Petugas</button>
                                    <!-- Modal -->
                                    <form id="" action="" method="post" target="_self">
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Tambah petugas</h4>
                                                </div>
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
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" id="add-row" class="btn btn-success">Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>

                                    <div class="table-responsive">
                                        <table id="example3" class="display table" style="width: 100%; cellspacing: 0;">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama lengkap</th>
                                                    <th>Username</th>
                                                    <th>Level</th>
                                                    <th>Tool</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama lengkap</th>
                                                    <th>Username</th>
                                                    <th>Level</th>
                                                    <th>Tool</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php $number=1; 
                                                foreach($data as $row){ ?>
                                                <tr>
                                                    <td align="center"><?php echo $number; ?></td>
                                                    <td><?php echo $row['nama_admin']; ?></td>
                                                    <td><?php echo $row['username']; ?></td>
                                                    <td><?php echo $row['nama_level']; ?></td>
                                                    <td>
                                                        <a class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus data ini ?');" href="petugas.php?key=<?php echo $row['id_admin']; ?>"><i class="fa fa-trash"></i></a>
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
                </div><!-- Main Wrapper -->
                <?php include('../theme/admin/footer.php');?>
            </div><!-- Page Inner -->
</main><!-- Page Content -->
<?php 
include('../theme/admin/navbar_tiga.php');
include('../theme/admin/end_theme.php');
?>

        