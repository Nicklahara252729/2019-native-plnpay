<?php
class database{
    private $n_host="localhost";
    private $n_user="root";
    private $n_pass="satusampe250599";
    private $n_db="2019_web_native_plnpay";
    
    function __construct(){
    	error_reporting(0);
    }

    function koneksi(){
        mysql_connect($this->n_host,$this->n_user,$this->n_pass);
        mysql_select_db($this->n_db) or die ("database tidak ada");
    }

    function login($username,$password){
    	$sql = mysql_query("select * from admin join level on (level.id_level = admin.id_level) where admin.username='$username' and admin.password='$password' ");
    	$rows = mysql_num_rows($sql);
    	$view = mysql_fetch_array($sql);
    	if($rows > 0){
    		session_start();
    		$_SESSION['status'] = TRUE;
    		$_SESSION['nama_admin'] = $view['nama_admin'];
    		$_SESSION['username'] = $view['username'];
    		$_SESSION['level'] = $view['nama_level'];
    		header("location:index.php");
    	}else{
    		echo"<script>alert('pengguna tidak ditemukan');</script>";
    	}
    }

    function logout(){
    	session_destroy();
    	echo"<script>window.location.href='login.php'</script>";
    }

    function akses(){
    	session_start();
    	if($_SESSION['status']!=TRUE){
    		echo"<script>window.location.href='login.php'</script>";
    	}else{
    		echo"<script>window.location.href='index.php'</script>";
    	}
    }

    //----------- tampil 
    function tampil_petugas(){
    	$sql = mysql_query("select * from admin join level on (level.id_level = admin.id_level) ");
        while ($row = mysql_fetch_array($sql))
            $data[]=$row;
        return $data;
    }

    function tampil_pelanggan(){
    	$sql = mysql_query("select * from pelanggan join tarif on (tarif.id_tarif = pelanggan.id_tarif) ");
        while ($row = mysql_fetch_array($sql))
            $data[]=$row;
        return $data;
    }

    function tampil_level(){
    	$sql = mysql_query("select * from level");
        while ($row = mysql_fetch_array($sql))
            $data[]=$row;
        return $data;
    }

    function tampil_tarif(){
    	$sql = mysql_query("select * from tarif");
        while ($row = mysql_fetch_array($sql))
            $data[]=$row;
        return $data;
    }

    function tampil_penggunaan(){
    	$sql = mysql_query("select * from penggunaan join pelanggan on (pelanggan.id_pelanggan = penggunaan.id_pelanggan)");
        while ($row = mysql_fetch_array($sql))
            $data[]=$row;
        return $data;
    }

    function tampil_tagihan(){
    	$sql = mysql_query("select * from tagihan join penggunaan on (penggunaan.id_penggunaan = tagihan.id_penggunaan) join pelanggan on (pelanggan.id_pelanggan = tagihan.id_pelanggan) join tarif on (pelanggan.id_tarif = tarif.id_tarif) where tagihan.status='belum bayar'");
        while ($row = mysql_fetch_array($sql))
            $data[]=$row;
        return $data;
    }

    function tampil_pembayaran($keyword){
    	$bulan = date('M');
    	$tahun = date('Y');
    	$sql = mysql_query("select * from tagihan join penggunaan on (penggunaan.id_penggunaan = tagihan.id_penggunaan) join pelanggan on (pelanggan.id_pelanggan = tagihan.id_pelanggan) join tarif on (pelanggan.id_tarif = tarif.id_tarif) where tagihan.bulan='$bulan' and tagihan.tahun='$tahun' and pelanggan.id_pelanggan='$keyword' or pelanggan.nomor_kwh='$keyword'");
        while ($row = mysql_fetch_array($sql))
            $data[]=$row;
        return $data;
    }

    function tampil_laporan(){
    	$sql = mysql_query("select * from tagihan join penggunaan on (penggunaan.id_penggunaan = tagihan.id_penggunaan) join pelanggan on (pelanggan.id_pelanggan = tagihan.id_pelanggan) join tarif on (pelanggan.id_tarif = tarif.id_tarif) where tagihan.status='sudah dibayar'");
        while ($row = mysql_fetch_array($sql))
            $data[]=$row;
        return $data;
    }

    function tampil_struk($key){
    	$sql = mysql_query("select * from tagihan join penggunaan on (penggunaan.id_penggunaan = tagihan.id_penggunaan) join pelanggan on (pelanggan.id_pelanggan = tagihan.id_pelanggan) join tarif on (pelanggan.id_tarif = tarif.id_tarif) join pembayaran on (pembayaran.id_tagihan = tagihan.id_tagihan) where tagihan.id_tagihan='$key'");
        while ($row = mysql_fetch_array($sql))
            $data[]=$row;
        return $data;
    }

    function tampil_check($id_pelanggan,$no_meter){
    	$bulan = date('M');
    	$tahun = date('Y');
    	$sql = mysql_query("select * from tagihan join penggunaan on (penggunaan.id_penggunaan = tagihan.id_penggunaan) join pelanggan on (pelanggan.id_pelanggan = tagihan.id_pelanggan) join tarif on (pelanggan.id_tarif = tarif.id_tarif) join pembayaran on (pembayaran.id_tagihan = tagihan.id_tagihan) where tagihan.id_pelanggan='$id_pelanggan' or pelanggan.nomor_kwh and tagihan.bulan='$bulan' and tagihan.tahun='$tahun'");
        while ($row = mysql_fetch_array($sql))
            $data[]=$row;
        return $data;
    }

    //----------- hapus
	function hapus_petugas($key){
        $sql= mysql_query("delete from admin where id_admin='$key'");
        if($sql){
        	echo"<script>window.location.href='petugas.php'</script>";
    	}
    }

    function hapus_pelanggan($key){
        $sql= mysql_query("delete from pelanggan where id='$key'");
        if($sql){
        	echo"<script>window.location.href='pelanggan.php'</script>";
    	}
    }

    function hapus_tarif($key){
        $sql= mysql_query("delete from tarif where id_tarif='$key'");
        if($sql){
        	echo"<script>window.location.href='tarif.php'</script>";
    	}
    }

    function hapus_penggunaan($key){
        $sql= mysql_query("delete from penggunaan where id_penggunaan='$key'");
        if($sql){
        	echo"<script>window.location.href='penggunaan.php'</script>";
    	}
    }

    //---------- simpan
    function insert_petugas($name,$username,$password,$level){
        $sql=mysql_query("insert into admin set nama_admin='$name', username='$username', password=md5('$password'),id_level='$level'");
        if($sql){
        	echo"<script>window.location.href='petugas.php'</script>";
        }
    }

    function insert_pelanggan($id_pelanggan,$no_meter,$nama,$alamat,$tarif){
        $sql=mysql_query("insert into pelanggan set id_pelanggan='$id_pelanggan', nomor_kwh='$no_meter', nama_pelanggan='$nama', alamat='$alamat', id_tarif='$tarif'");
        if($sql){
        	echo"<script>window.location.href='pelanggan.php'</script>";
        }else{
        	echo"fail";
        }
    }

    function insert_tarif($kodetarif,$daya,$tarifperkwh,$adminbank,$kategori){
        $sql=mysql_query("insert into tarif set kodetarif='$kodetarif', daya='$daya', tarifperkwh='$tarifperkwh', adminbank='$adminbank', kategori='$kategori'");
        if($sql){
        	echo"<script>window.location.href='tarif.php'</script>";
        }else{
        	echo"fail";
        }
    }

    function insert_penggunaan($id_pelanggan,$bulan,$tahun,$meter_awal){
        $sql=mysql_query("insert into penggunaan set id_pelanggan='$id_pelanggan', bulan ='$bulan', tahun='$tahun', meter_awal ='$meter_awal'");
        if($sql){
        	echo"<script>window.location.href='penggunaan.php'</script>";
        }else{
        	echo"fail";
        }
    }

    function insert_pembayaran($paid,$id_tagihan,$id_pelanggan,$total){
    	$bulan = date('M');
    	if($paid > $total){
    		echo"<script>alert('nominal yang dimasukkan melebihi total pembayaran');</script>";
    	}elseif ($paid < $total) {
    		echo"<script>alert('nominal yang dimasukkan kurang dari total pembayaran');</script>";
    	}
    	else{
	        $sql=mysql_query("insert into pembayaran set id_tagihan='$id_tagihan', id_pelanggan ='$id_pelanggan', bulan_bayar ='$bulan',  	total_bayar ='$total'");
	        $sqldua = mysql_query("update tagihan set status='sudah dibayar' where id_tagihan='$id_tagihan'");
	        if($sql && $sqldua){
	        	echo"<script>window.location.href='struk.php?key=".$id_tagihan."'</script>";
	        	//header("location:struk.php?".$id_tagihan);
	        	//echo"ok";
	        }else{
	        	echo"fail";
	        }
    	}
    }

    //--------- read edit
    function baca_petugas($row,$keyedit){
        $sql =mysql_query("select * from admin   where id_admin='$keyedit'");
        $data=mysql_fetch_array($sql);
        if($row == "nama_admin")
            return $data['nama_admin'];
        else if($row == "username")
            return $data['username'];
        else if($row == "id_level")
            return $data['id_level'];
        
    }

    function baca_pelanggan($row,$keyedit){
        $sql =mysql_query("select * from pelanggan where id='$keyedit'");
        $data=mysql_fetch_array($sql);
        if($row == "id_pelanggan")
            return $data['id_pelanggan'];
        else if($row == "nomor_kwh")
            return $data['nomor_kwh'];
        else if($row == "nama_pelanggan")
            return $data['nama_pelanggan'];
        else if($row == "alamat")
            return $data['alamat'];
        else if($row == "id_tarif")
            return $data['id_tarif'];
    }

    function baca_tarif($row,$keyedit){
        $sql =mysql_query("select * from tarif where id_tarif='$keyedit'");
        $data=mysql_fetch_array($sql);
        if($row == "kodetarif")
            return $data['kodetarif'];
        else if($row == "daya")
            return $data['daya'];
        else if($row == "tarifperkwh")
            return $data['tarifperkwh'];
        else if($row == "adminbank")
            return $data['adminbank'];
        else if($row == "kategori")
            return $data['kategori'];
    }

    function baca_penggunaan($row,$keyedit){
        $sql =mysql_query("select * from penggunaan where id_penggunaan='$keyedit'");
        $data=mysql_fetch_array($sql);
        if($row == "id_pelanggan")
            return $data['id_pelanggan'];
        else if($row == "bulan")
            return $data['bulan'];
        else if($row == "tahun")
            return $data['tahun'];
        else if($row == "meter_awal")
            return $data['meter_awal'];
        else if($row == "meter_akhir")
            return $data['meter_akhir'];
    }

    //-------- update
    function update_petugas($key,$name,$username,$password,$level){
    	if(isset($password)){
    		$sql=mysql_query("update admin set nama_admin='$name', username='$username', password=md5('$password'),id_level='$level' where id_admin='$key'");
    	}else{
    		$sql=mysql_query("update admin set nama_admin='$name', username='$username',id_level='$level' where id_admin='$key'");	
    	}
    	
        if($sql){
        	echo"<script>window.location.href='petugas.php'</script>";
        }
    }

    function update_pelanggan($key,$id_pelanggan,$no_meter,$nama,$alamat,$tarif){
    	$sql=mysql_query("update pelanggan set id_pelanggan='$id_pelanggan', nomor_kwh='$no_meter', nama_pelanggan='$nama', alamat='$alamat', id_tarif='$tarif' where id='$key'");	
        if($sql){
        	echo"<script>window.location.href='pelanggan.php'</script>";
        }
    }

    function update_tarif($key,$kodetarif,$daya,$tarifperkwh,$adminbank,$kategori){
    	$sql=mysql_query("update tarif set kodetarif='$kodetarif', daya='$daya', tarifperkwh='$tarifperkwh', adminbank='$adminbank', kategori='$kategori' where id_tarif='$key'");	
        if($sql){
        	echo"<script>window.location.href='tarif.php'</script>";
        }
    }

    function update_penggunaan($key,$id_pelanggan,$bulan,$tahun,$meter_awal){
    	$sql=mysql_query("update penggunaan set id_pelanggan='$id_pelanggan', bulan ='$bulan', tahun='$tahun', meter_awal ='$meter_awal'  where id_penggunaan='$key'");	
        if($sql){
        	echo"<script>window.location.href='penggunaan.php'</script>";
        }else{
        	echo"fail";
        }
    }

    function update_meter_akhir($key,$id_pelanggan,$bulan,$tahun,$meter_awal,$meter_akhir){
    	$sum_meter = $meter_akhir - $meter_awal;
    	$sql=mysql_query("update penggunaan set meter_akhir ='$meter_akhir'  where id_penggunaan='$key'");	
    	$sql_dua= mysql_query("insert into tagihan set id_penggunaan='$key', id_pelanggan='$id_pelanggan', bulan ='$bulan', tahun='$tahun', jumlah_meter='$sum_meter', status='belum bayar'");
        if($sql && $sql_dua){
        	echo"<script>window.location.href='meter_akhir.php'</script>";
        }else{
        	echo"fail";
        }
    }

}
?>