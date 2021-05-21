<?php
//include file koneksidbs.php untuk koneksi ke database
include ('koneksipsb.php');
//mengambil file dari library dompdf
require_once("dompdf/autoload.inc.php");
//menggunakan namespace Dompdf
use Dompdf\Dompdf;
$dompdf = new Dompdf();
//perintah query untuk mendapatkan data pada tabel di database
$query = mysqli_query($koneksi,"select * from data_pribadi");
//membuat judul serta header menggunakan kode html menggunakan operator concatination
$html = '<center><h3>Daftar Pendaftaran Siswa Baru</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
<tr>
<th>No</th>
<th>Jenis Pendaftaran</th>
<th>Tanggal Masuk</th>
<th>NIS</th>
<th>Nomor Peserta</th>
<th>Pernah/Tidak pernah PAUD</th>
<th>Pernah/Tidak pernah TK</th>
<th>Nomer Seri SKHUN</th>
<th>Nomer Seri Ijazah</th>
<th>Hobi</th>
<th>Cita-cita</th>
<th>Nama</th>
<th>Jenis Kelamin</th>
<th>NISN</th>
<th>NIK</th>
</tr>';
$no = 1;
//membaca data pada tabel didatabase serta meng-extractnya ke dalam variabel $row
while($row = mysqli_fetch_array($query))
{
    $html .= "<tr>
    <td>".$no."</td>
    <td>".$row['jenis_pendaftaran']."</td>
    <td>".$row['tgl_masuk']."</td>
    <td>".$row['nis']."</td>
    <td>".$row['nomor_peserta']."</td>
    <td>".$row['pernah_paud']."</td>
    <td>".$row['pernah_tk']."</td>
    <td>".$row['noseri_skhun']."</td>
    <td>".$row['noseri_ijasah']."</td>
    <td>".$row['hobi']."</td>
    <td>".$row['cita']."</td>
    <td>".$row['nama']."</td>
    <td>".$row['jenis_kel']."</td>
    <td>".$row['nisn']."</td>
    <td>".$row['nik']."</td>
    </tr>";
    $no++;
}
$html .= "</html>";
//konversi dari kode html menjadi bentuk pdf
$dompdf->loadHtml($html);
//setting ukuran dan orientasi kerras
$dompdf->SetPaper('Legal','landscape');
//rendering dari HTML ke PDF
$dompdf->render();
//melakukan output file pdf
$dompdf->stream('Export Daftar Pendaftaran.pdf');
?>