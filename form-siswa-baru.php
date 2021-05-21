<!DOCTYPE HTML>
<html>
<head>
<title>Pendaftaran Siswa Baru</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<!--menggunakan css bootstrap untuk tampilan formulisr-->
<link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap.min.css">
<style>
.warning {color:#FF000;}
</style>
</head>
<body>
<?php
//memasukkan file koneksi untuk menghubungkan ke database
include "koneksipsb.php";


//mencegah inputan karakter yang tidak sesuai
function cek_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
//variabel yang akan diinputkan ketika terdapat kiriman form dari method POST
$error_jenis_pendaftaran="";
$error_tgl_masuk="";
$error_nis="";
$error_nomor_peserta="";
$error_pernah_paud="";
$error_pernah_tk="";
$error_noseri_skhun="";
$error_noseri_ijasah="";
$error_hobi="";
$error_cita="";
$error_nama="";
$error_jenis_kel="";
$error_nisn="";
$error_nik="";
$error_tempat_lahir="";
$error_tgl_lahir="";
$error_agama="";
$error_kebutuhan_khusus="";
$error_alamat_jln="";
$error_rt="";
$error_rw="";
$error_dusun="";
$error_kel_desa="";
$error_kecamatan="";
$error_kode_pos="";
$error_tinggal="";
$error_transportasi="";
$error_no_hp="";
$error_no_telp="";
$error_email="";
$error_kartu="";
$error_no_kartu="";
$error_kewarganegaraan="";
$error_negara="";



//menyimpan data ke dalam variabel serta pengecekan error
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST["jenis_pendaftaran"]))
    {
        $error_jenis_pendaftaran = "Jenis Pendaftaran tidak boleh kosong";
    }
    else {
        $jenis_pendaftaran= cek_input($_POST["jenis_pendaftaran"]);
    }
    if (empty($_POST["tgl_masuk"]))
    {
        $error_tgl_masuk = "Tanggal Masuk tidak boleh kosong";
    }
    else {
        $tgl_masuk= cek_input($_POST["tgl_masuk"]);
    }

    if (empty($_POST["nis"]))
    {
        $error_nis = "NIS tidak boleh kosong";
    }
    else {
        $nis= cek_input($_POST["nis"]);
        if (!is_numeric($nis))
        {
            $error_nis = "Inputan hanya boleh angka";
        }
    }
    if (empty($_POST["nomor_peserta"]))
    {
        $error_nomor_peserta = "Nomor Peserta tidak boleh kosong";
    }
    else {
        $nomor_peserta= cek_input($_POST["nomor_peserta"]);
        if (!is_numeric($nomor_peserta))
        {
            $error_nomor_peserta = "Inputan hanya boleh angka";
        }
    }
    if (empty($_POST["pernah_paud"]))
    {
        $error_pernah_paud = "Field ini tidak boleh kosong";
    }
    else {
        $pernah_paud= cek_input($_POST["pernah_paud"]);
    }
    if (empty($_POST["pernah_tk"]))
    {
        $error_pernah_tk = "Field ini tidak boleh kosong";
    }
    else {
        $pernah_tk= cek_input($_POST["pernah_tk"]);
    }
    if (empty($_POST["noseri_skhun"]))
    {
        $error_noseri_skhun = "Nomor Seri SKHUN tidak boleh kosong";
    }
    else {
        $noseri_skhun= cek_input($_POST["noseri_skhun"]);
        if (!is_numeric($noseri_skhun))
        {
            $error_noseri_skhun = "Inputan hanya boleh angka";
        }
    }
    if (empty($_POST["noseri_ijasah"]))
    {
        $error_noseri_ijasah = "Nomor Seri Ijasah tidak boleh kosong";
    }
    else {
        $noseri_ijasah= cek_input($_POST["noseri_ijasah"]);
        if (!is_numeric($noseri_ijasah))
        {
            $error_noseri_ijasah = "Inputan hanya boleh angka";
        }
    }
    if (empty($_POST["hobi"]))
    {
        $error_hobi = "Field ini tidak boleh kosong";
    }
    else {
        $hobi= cek_input($_POST["hobi"]);
    }
    if (empty($_POST["cita"]))
    {
        $error_cita= "Field ini tidak boleh kosong";
    }
    else {
        $cita= cek_input($_POST["cita"]);
    }
    if (empty($_POST["nama"]))
    {
        $error_nama = "Nama tidak boleh kosong";
    }
    else {
        $nama= cek_input($_POST["nama"]);
        if (!preg_match("/^[a-zA-Z]*$/",$nama))
        {
            $nameErr = "Inputan hanya boleh huruf dan spasi";
        }
    }
    if (empty($_POST["jenis_kel"]))
    {
        $error_jenis_kel = "Field ini tidak boleh kosong";
    }
    else {
        $jenis_kel= cek_input($_POST["jenis_kel"]);
    }
    if (empty($_POST["nisn"]))
    {
        $error_nisn = "NISN tidak boleh kosong";
    }
    else {
        $nisn= cek_input($_POST["nisn"]);
        if (!is_numeric($nisn))
        {
            $error_nisn = "Inputan hanya boleh angka";
        }
    }
    if (empty($_POST["nik"]))
    {
        $error_nik = "NIK  tidak boleh kosong";
    }
    else {
        $nik= cek_input($_POST["nik"]);
        if (!is_numeric($nik))
        {
            $error_nik = "Inputan hanya boleh angka";
        }
    }    
    if (empty($_POST["tempat_lahir"]))
    {
        $error_tempat_lahir = "Field ini tidak boleh kosong";
    }
    else {
        $tempat_lahir= cek_input($_POST["tempat_lahir"]);
    }
    if (empty($_POST["tgl_lahir"]))
    {
        $error_tgl_lahir = "Field ini tidak boleh kosong";
    }
    else {
        $tgl_lahir= cek_input($_POST["tgl_lahir"]);
    }
    if (empty($_POST["agama"]))
    {
        $error_agama= "Field ini tidak boleh kosong";
    }
    else {
        $agama= cek_input($_POST["agama"]);
    }
    if (empty($_POST["kebutuhan_khusus"]))
    {
        $error_kebutuhan_khusus = "Field ini tidak boleh kosong";
    }
    else {
        $kebutuhan_khusus= cek_input($_POST["kebutuhan_khusus"]);
    }
    if (empty($_POST["alamat_jln"]))
    {
        $error_alamat_jln = "Field ini tidak boleh kosong";
    }
    else {
        $alamat_jln= cek_input($_POST["alamat_jln"]);
    }
    if (empty($_POST["rt"]))
    {
        $error_rt = "RT tidak boleh kosong";
    }
    else {
        $rt= cek_input($_POST["rt"]);
        if (!is_numeric($rt))
        {
            $error_rt = "Inputan hanya boleh angka";
        }
    }
    if (empty($_POST["rw"]))
    {
        $error_rw = "RW tidak boleh kosong";
    }
    else {
        $rw= cek_input($_POST["rw"]);
        if (!is_numeric($rw))
        {
            $error_rw = "Inputan hanya boleh angka";
        }
    }
    if (empty($_POST["dusun"]))
    {
        $error_dusun = "Field ini tidak boleh kosong";
    }
    else {
        $dusun= cek_input($_POST["dusun"]);
    }
    if (empty($_POST["kel_desa"]))
    {
        $error_kel_desa = "Field ini tidak boleh kosong";
    }
    else {
        $kel_desa= cek_input($_POST["kel_desa"]);
    }
    if (empty($_POST["kecamatan"]))
    {
        $error_kecamatan = "Field ini tidak boleh kosong";
    }
    else {
        $kecamatan= cek_input($_POST["kecamatan"]);
    }
    if (empty($_POST["kode_pos"]))
    {
        $error_kode_pos = "Kode Pos tidak boleh kosong";
    }
    else {
        $kode_pos= cek_input($_POST["kode_pos"]);
        if (!is_numeric($kode_pos))
        {
        $error_kode_pos = "Inputan hanya boleh angka";
        }
    }
    if (empty($_POST["kode_pos"]))
    {
        $error_kode_pos= "Field ini tidak boleh kosong";
    }
    else {
        $kode_pos= cek_input($_POST["kode_pos"]);
    }
    if (empty($_POST["tinggal"]))
    {
        $error_tinggal = "Field ini tidak boleh kosong";
    }
    else {
        $tinggal= cek_input($_POST["tinggal"]);
    }
    if (empty($_POST["transportasi"]))
    {
        $error_transportasi = "Field ini tidak boleh kosong";
    }
    else {
        $transportasi= cek_input($_POST["transportasi"]);
    }
    if (empty($_POST["no_hp"]))
    {
        $error_no_hp = "Nomor Hape tidak boleh kosong";
    }
    else {
        $no_hp= cek_input($_POST["no_hp"]);
        if (!is_numeric($no_hp))
        {
        $error_no_hp = "Inputan hanya boleh angka";
        }
    }
    if (empty($_POST["no_telp"]))
    {
        $error_no_telp = "Nomor Hape tidak boleh kosong";
    }
    else {
        $no_telp= cek_input($_POST["no_telp"]);
        if (!is_numeric($no_telp))
        {
        $error_no_telp = "Inputan hanya boleh angka";
        }
    }
    if (empty($_POST["email"]))
    {
        $error_email = "Email tidak boleh kosong";
    }
    else {
        $email = cek_input($_POST["email"]);
        if (!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            $error_email = "Format email Invalid";
        }
    }
    if (empty($_POST["kartu"]))
    {
        $error_kartu = "Field ini tidak boleh kosong";
    }
    else {
        $kartu= cek_input($_POST["kartu"]);
    }
    if (empty($_POST["no_kartu"]))
    {
        $error_no_kartu = "Field ini tidak boleh kosong";
    }
    else {
        $no_kartu= cek_input($_POST["no_kartu"]);
    }
    if (empty($_POST["kewarganegaraan"]))
    {
        $error_kewarganegaraan = "Field ini tidak boleh kosong";
    }
    else {
        $kewarganegaraan= cek_input($_POST["kewarganegaraan"]);
    }
    if (empty($_POST["negara"]))
    {
        $error_negara = "Field ini tidak boleh kosong";
    }
    else {
        $negara= cek_input($_POST["negara"]);
    }
    

        //query sql untuk insert data
        $query="INSERT INTO data_pribadi SET jenis_pendaftaran='$jenis_pendaftaran', 
        tgl_masuk='$tgl_masuk', nis='$nis', nomor_peserta='$nomor_peserta', 
        pernah_paud='$pernah_paud', pernah_tk='$pernah_tk', noseri_skhun='$noseri_skhun',
        noseri_ijasah='$noseri_ijasah', hobi='$hobi', cita='$cita',
        nama='$nama', jenis_kel='$jenis_kel', nisn='$nisn', nik='$nik',
        tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', agama='$agama',
        kebutuhan_khusus='$kebutuhan_khusus', alamat_jln='$alamat_jln', rt='$rt',
        rw='$rw', dusun='$dusun', kel_desa='$kel_desa', kecamatan='$kecamatan',
        kode_pos='$kode_pos', tinggal='$tinggal', transportasi='$transportasi', 
        no_hp='$no_hp', no_telp='$no_telp', email='$email', kartu='$kartu',
        no_kartu='$no_kartu', kewarganegaraan='$kewarganegaraan', negara='$negara'";
        mysqli_query($koneksi, $query);


        //pengecekan kondisi berhasil tidaknya eksekusi query
        if ($query){
            echo "<div class='alert alert-success'>Selamat $nama anda telah berhasil mendaftar!</div>";
        } else {
            echo "<div class=alert alert-danger'>Pendaftaran Gagal.</div?";
        }
    
}
?>
<div class="row">
<div class="col-md-6">
<div class="card">
    <div class="card-header">
        Formulir Pendaftaran Siswa Baru
    </div>
    <div class="card-body">
    <!--Setiap inputan form akan di kirimkan pada method=POST-->
    <form id="form" method="POST" action="">
    
    <div class="alert alert-primary">
    <strong>Registrasi Peserta Didik</strong>
    </div>

    <div class="row">
        <div class="col-sm-5">
            <div class="form-group">
            <label>Jenis Pendaftaran</label>
            <select  name="jenis_pendaftaran" class="form-control">
            <option>-Pilih-</option>
            <option value="01">Siswa Baru</option>
            <option value="02">Pindahan</option>
            </select>
            </div>
        </div>
        <div class="col-sm-5">
        <div class="form-group">
        <label>Tanggal Masuk Sekolah</label>
        <input type="date" name="tgl_masuk" class="form-control">
        </div>
        </div>
        <div class="col-sm-7">
        <div class="form-group">
        <label>NIS</label>
        <input type="text" name="nis" class="form-control <?php echo ($error_nis !="" ? "is-invalid" : ""); ?>" placeholder="Masukkan NIS">
        <span class="warning"><?php echo $error_nis ?></span>
        </div>
        </div>
        <div class="col-sm-7">
        <div class="form-group">
        <label>Nomor Peserta Ujian</label>
        <input type="text" name="nomor_peserta" class="form-control <?php echo ($error_nomor_peserta !="" ? "is-invalid" : ""); ?>" 
        placeholder="Masukkan Nomor Peserta">
        <span class="warning"><?php echo $error_nomor_peserta; ?></span>
        </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-7">
        <div class="form-group">
        <label>Apakah pernah PAUD</label>
        <div class="custom-control custom-radio">
		<input type="radio" id="Radio1" name="pernah_paud" class="custom-control-input" value="ya">
		<label class="custom-control-label" for="Radio1">Ya</label>
	    </div>
	    <div class="custom-control custom-radio">
		<input type="radio" id="Radio2" name="pernah_paud" class="custom-control-input" value="tidak">
		<label class="custom-control-label" for="Radio2">Tidak</label>
	    </div>
        </div>
        </div>
        <div class="col-sm-7">
        <div class="form-group">
        <label>Apakah pernah TK</label>
        <div class="custom-control custom-radio">
		<input type="radio" id="Radiotk1" name="pernah_tk" class="custom-control-input" value="ya">
		<label class="custom-control-label" for="Radiotk1">Ya</label>
	    </div>
	    <div class="custom-control custom-radio">
		<input type="radio" id="Radiotk2" name="pernah_tk" class="custom-control-input" value="tidak">
		<label class="custom-control-label" for="Radiotk2">Tidak</label>
	    </div>
        </div>
        </div>
        <div class="col-sm-7">
        <div class="form-group">
        <label>No. Seri SKHUN Sebelumnya</label>
        <input type="text" name="noseri_skhun" class="form-control <?php echo ($error_noseri_skhun !="" ? "is-invalid" : ""); ?>" 
        placeholder="Masukkan Nomor Seri SKHUN">
        <spam class="warning"><?php echo $error_noseri_skhun; ?></span>
        </div>
        </div>
        <div class="col-sm-7">
        <div class="form-group">
        <label>No. Seri Ijazah Sebelumnya</label>
        <input type="text" name="noseri_ijasah" class="form-control <?php echo ($error_noseri_ijasah !="" ? "is-invalid" : ""); ?>" 
        placeholder="Masukkan Nomor Seri Ijazah">
        <span class="warning"><?php echo $error_noseri_ijasah; ?></span>
        </div>
        </div>
        <br>
    </div>

    <div class="row">
        <div class="col-sm-4">
        <div class="form-group">
        <label>Hobi</label>
        <select class="form-control" name="hobi">
        <option>-pilih-</option>
        <option value="Olahraga">Olahraga</option>
        <option value="Kesenian">Kesenian</option>
        <option value="Membaca">Membaca</option>
        <option value="Menulis">Menulis</option>
        <option value="Traveling">Traveling</option>
        <option value="Lainnya">Lainnya</option>
        </select>
        </div>
        </div>
        <div class="col-sm-4">
        <div class="form-group">
        <label>Cita-cita</label>
        <select class="form-control" name="cita">
        <option>-pilih-</option>
        <option value="PNS">PNS</option>
        <option value="TNI/POLRI">TNI/POLRI</option>
        <option value="Guru/Dosen">Guru/Dosen</option>
        <option value="Dokter">Dokter</option>
        <option value="Politikus">Politikus</option>
        <option value="Wiraswasta">Wiraswasta</option>
        <option value="Seni/lukis/artis/sejenis">Seni/lukis/artis/sejenis</option>
        <option value="Lainnya">Lainnya</option>
        </select>
        </div>
        </div>
    </div>

    <div class="alert alert-primary">
    <strong>Data Pribadi</strong>
    </div>

    <div class="row">
        <div class="col-sm-10">
            <div class="form-group">
            <label for="nama" class="col-form-label">Nama</label>
            <input type="text" name="nama" class="form-control <?php echo ($error_nama !="" ? "is-invalid" : "");?>"
            id="nama" placeholder="Nama"><span class="warning"><?php echo $error_nama; ?></span>
            </div>
        </div>
        <div class="col-sm-4">
        <div class="form-group">
        <label>Jenis Kelamin</label>
        <div class="custom-control custom-radio">
		<input type="radio" id="Radiojk1" name="jenis_kel" class="custom-control-input" value="Laki-laki">
		<label class="custom-control-label" for="Radiojk1">Laki-laki</label>
	    </div>
	    <div class="custom-control custom-radio">
		<input type="radio" id="Radiojk2" name="jenis_kel" class="custom-control-input" value="Perempuan">
		<label class="custom-control-label" for="Radiojk2">Perempuan</label>
	    </div>
        </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-5">
        <div class="form-group">
        <label>NISN</label>
        <input type="text" name="nisn" class="form-control <?php echo ($error_nisn !="" ? "is-invalid" : ""); ?>" 
        placeholder="Masukkan NISN">
        <span class="warning"><?php echo $error_nisn; ?></span>
        </div>
        </div>
        <div class="col-sm-7">
        <div class="form-group">
        <label>NIK</label>
        <input type="text" name="nik" class="form-control <?php echo ($error_nik !="" ? "is-invalid" : ""); ?>" 
        placeholder="Masukkan NIK">
        <span class="warning"><?php echo $error_nik; ?></span>
        </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-7">
        <div class="form-group">
        <label>Tempat Lahir</label>
        <input type="text" name="tempat_lahir" class="form-control <?php echo ($error_tempat_lahir !="" ? "is-invalid" : ""); ?>" 
        placeholder="Masukkan tempat lahir">
        <span class="warning"><?php echo $error_tempat_lahir; ?></span>
        </div>
        </div>
        <div class="col-sm-5">
        <div class="form-group">
        <label>Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" class="form-control <?php echo ($error_tgl_lahir !="" ? "is-invalid" : ""); ?>" 
        placeholder="Masukkan tanggal lahir">
        <span class="warning"><?php echo $error_tgl_lahir; ?></span>
        </div>
        </div>
        <div class="col-sm-5">
        <div class="form-group">
        <label>Agama </label>
        <select class="form-control" name="agama">
        <option>-pilih-</option>
        <option>Islam</option>
        <option>Kristen/Protestan</option>
        <option>Katolik</option>
        <option>Hindu</option>
        <option>Buddha</option>
        <option>Khong Hu Chu</option>
        </select>
        </div>
        </div>
        <div class="col-sm-5">
        <div class="form-group">
        <label>Berkebutuhan Khusus </label>
        <select class="form-control" name="kebutuhan_khusus">
        <option>-Tidak--</option>
        <option>Netra</option>
        <option>Rungu</option>
        <option>Grahita ringan</option>
        <option>Grahita sedang</option>
        <option>Daksa ringan</option>
        <option>Daksa sedang</option>
        <option>Laras</option>
        <option>Wicara</option>
        <option>Tuna ganda</option>
        <option>Hiperaktif</option>
        <option>Cerdas istimewa</option>
        <option>Bakar istimewa</option>
        <option>Kesulitan belajar</option>
        <option>Narkoba</option>
        <option>Indigo</option>
        <option>Down sindrome</option>
        <option>Autis</option>

        </select>
        </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-7">
        <div class="form-group">
        <label>Alamat Jalan</label>
        <input type="text" name="alamat_jln" class="form-control <?php echo ($error_alamat_jln !="" ? "is-invalid" : ""); ?>" 
        placeholder="Masukkan alamat jalan">
        <span class="warning"><?php echo $error_alamat_jln; ?></span>
        </div>
        </div>
    </div>
        <div class="row">
        <div class="col-sm-4">
        <div class="form-group">
        <label>RT</label>
        <input type="text" name="rt" class="form-control <?php echo ($error_rt !="" ? "is-invalid" : ""); ?>" 
        placeholder="Masukkan RT">
        <span class="warning"><?php echo $error_rt; ?></span>
        </div>
        </div>
        <div class="col-sm-4">
        <div class="form-group">
        <label>RW</label>
        <input type="text" name="rw" class="form-control <?php echo ($error_rw !="" ? "is-invalid" : ""); ?>" 
        placeholder="Masukkan RW">
        <span class="warning"><?php echo $error_rw; ?></span>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
        <div class="form-group">
        <label>Nama Dusun</label>
        <input type="text" name="dusun" class="form-control <?php echo ($error_dusun !="" ? "is-invalid" : ""); ?>" 
        placeholder="Masukkan Nama Dusun">
        <span class="warning"><?php echo $error_dusun; ?></span>
        </div>
        </div>
        <div class="col-sm-7">
        <div class="form-group">
        <label>Nama Kelurahan/Desa</label>
        <input type="text" name="kel_desa" class="form-control <?php echo ($error_kel_desa !="" ? "is-invalid" : ""); ?>" 
        placeholder="Masukkan Kelurahan/Desa">
        <span class="warning"><?php echo $error_kel_desa; ?></span>
        </div>
        </div>
        <div class="col-sm-7">
        <div class="form-group">
        <label>Kecamatan</label>
        <input type="text" name="kecamatan" class="form-control <?php echo ($error_kecamatan !="" ? "is-invalid" : ""); ?>" 
        placeholder="Masukkan kecamatan">
        <span class="warning"><?php echo $error_kecamatan; ?></span>
        </div>
        </div>
        <div class="col-sm-4">
        <div class="form-group">
        <label>Kode Pos</label>
        <input type="text" name="kode_pos" class="form-control <?php echo ($error_kode_pos!="" ? "is-invalid" : ""); ?>" 
        placeholder="Masukkan kode pos">
        <span class="warning"><?php echo $error_kode_pos; ?></span>
        </div>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-5">
        <div class="form-group">
        <label>Tempat Tinggal</label>
        <select class="form-control" name="tinggal">
        <option>-pilih-</option>
        <option>Bersama orang tua</option>
        <option>Wali</option>
        <option>Kos</option>
        <option>Asrama</option>
        <option>Panti Asuhan</option>
        <option>Lainnya</option>
        </select>
        </div>
        </div>
        <div class="col-sm-5">
        <div class="form-group">
        <label>Moda Transportasi</label>
        <select class="form-control" name="transportasi">
        <option>-pilih-</option>
        <option>Jalan kaki</option>
        <option>Kendaraan pribadi</option>
        <option>Kendaraan umum/Angkot/Pete-pete</option>
        <option>Jemputan Sekolah</option>
        <option>Kereta Api</option>
        <option>Ojek</option>
        <option>Andong/Bandi/Sado/Dokar/Beca</option>
        <option>Perahu penyebrangan/Rakit/Getek</option>
        <option>Lainnya</option>
        </select>
        </div>
        </div>
        <div class="col-sm-4">
        <div class="form-group">
        <label>Nomor HP</label>
        <input type="text" name="no_hp" class="form-control <?php echo ($error_no_hp !="" ? "is-invalid" : ""); ?>" 
        placeholder="Masukkan nomor HP">
        <span class="warning"><?php echo $error_no_hp; ?></span>
        </div>
        </div>
        <div class="col-sm-4">
        <div class="form-group">
        <label>Nomor Telepon</label>
        <input type="text" name="no_telp" class="form-control  <?php echo ($error_no_telp !="" ? "is-invalid" : ""); ?>" 
        placeholder="Masukkan nomor telepon">
        <span class="warning"><?php echo $error_no_telp; ?></span>
        </div>
        </div>
        <div class="col-sm-4">
        <div class="form-group">
        <label>Email Pribadi</label>
        <input type="text" name="email" class="form-control <?php echo($error_email !="" ? "is-invalid":""); ?>"
        id="email" placeholder="Masukkan email" >
        <span class="warning"><?php echo $error_email; ?></span>
        </div>
        </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
        <div class="form-group">
        <label>Penerima KPS/PKH/KIP</label>
        <div class="custom-control custom-radio">
		<input type="radio" id="Radiocard1" name="kartu" class="custom-control-input" value="ya">
		<label class="custom-control-label" for="Radiocard1">Ya</label>
	    </div>
	    <div class="custom-control custom-radio">
		<input type="radio" id="Radiocard2" name="kartu" class="custom-control-input" value="tidak">
		<label class="custom-control-label" for="Radiocard2">Tidak</label>
	    </div>
        </div>
        </div>
        <div class="col-sm-4">
        <div class="form-group">
        <label>No. KPS/PKH/KIP</label>
        <input type="text" name="no_kartu" class="form-control">
        </div>
        </div>
    </div>

    <div class="row">
    <div class="col-sm-4">
        <div class="form-group">
        <label>Kewarganegaraan</label>
        <div class="custom-control custom-radio">
		<input type="radio" id="Radiokwn1" name="kewarganegaraan" class="custom-control-input" value="Indonesia">
		<label class="custom-control-label" for="Radiokwn1">Indonesia(WNI)</label>
	    </div>
	    <div class="custom-control custom-radio">
		<input type="radio" id="Radiokwn2" name="kewarganegaraan" class="custom-control-input" value="Asing">
		<label class="custom-control-label" for="Radiokwn2">Asing(WNA)</label>
	    </div>
        </div>
        </div>
        <div class="col-sm-4">
        <div class="form-group">
        <label>Negara</label>
        <input type="text" name="negara" class="form-control <?php echo ($error_negara !="" ? "is-invalid" : ""); ?>">
        <span class="warning"><?php echo $error_negara; ?></span>
        </div>
        </div>
    </div>
    <!--tombol untuk submit form dan reset isiform-->
    <div class="form-group row">
    <div class="col-sm-10">
    <button type="submit" name="submit" class="btn btn-primary">Daftar</button>
    <button type="reset" class="btn btn-secondary">Reset</button>
    <a href="exportexcel.php"><button type="button" class="btn btn-secondary">Export to Excel</button></a>
    <!--tombol untuk export ke pdf-->
    <a href="exportpdf.php"><button type="button" class="btn btn-secondary">Export to PDF</button></a>
    </div>
    </div>    
    </form>

    </div>
</div>
</div>
</div>
</body>
</html>