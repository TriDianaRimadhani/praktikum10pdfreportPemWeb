<?php
//include file koneksidbs.php untuk koneksi ke database
include ('koneksidbs.php');
//mengambil file dari library dompdf
require_once("dompdf/autoload.inc.php");
//menggunakan namespace Dompdf
use Dompdf\Dompdf;
$dompdf = new Dompdf();
//perintah query untuk mendapatkan data pada tabel di database
$query = mysqli_query($koneksi,"select * from tb_siswa");
//membuat judul serta header menggunakan kode html menggunakan operator concatination
$html = '<center><h3>Daftar Nama Siswa</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
<tr>
<th>No</th>
<th>Nama</th>
<th>Kelas</th>
<th>Alamat</th>
</tr>';
$no = 1;
//membaca data pada tabel didatabase serta meng-extractnya ke dalam variabel $row
while($row = mysqli_fetch_array($query))
{
    $html .= "<tr>
    <td>".$no."</td>
    <td>".$row['nama']."</td>
    <td>".$row['kelas']."</td>
    <td>".$row['alamat']."</td>
    </tr>";
    $no++;
}
$html .= "</html>";
//konversi dari kode html menjadi bentuk pdf
$dompdf->loadHtml($html);
//setting ukuran dan orientasi kerras
$dompdf->SetPaper('A4','potrait');
//rendering dari HTML ke PDF
$dompdf->render();
//melakukan output file pdf
$dompdf->stream('laporan_siswa.pdf');
?>