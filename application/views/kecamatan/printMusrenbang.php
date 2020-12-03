<center>
   <h3>HASIL KESEPAKATAN MUSRENBANG <br> KOTA TANGERANG SELATAN <br> KECAMATAN <?= strtoupper($musrenbang['Kecamatan']) ?> TAHUN <?= date('yy', $musrenbang['date']) ?></h3>
</center>

<table border="1" style="border-spacing: 0;" width="100%">
   <tr>
      <th colspan="1" width="25%" style="text-align:left; padding-left:8px">
         Kecamatan
      </th>
      <td colspan="2" style="text-align:left; padding-left:8px">
         <?= ucfirst($musrenbang['Kecamatan']) ?>
      </td>
   </tr>
   <tr>
      <th colspan="1" style="text-align:left; padding-left:8px">
         Tgl/Bln/Tahun
      </th>
      <td colspan="2" style="text-align:left; padding-left:8px">
         <?= date('d-m-yy', $musrenbang['date']) ?>
      </td>
   </tr>
   <tr>
      <th colspan="1" style="text-align:left; padding-left:8px">
         Jenis Kegiatan
      </th>
      <td colspan="2" style="text-align:left; padding-left:8px">
         <?= ucfirst($musrenbang['jenis_kegiatan']) ?>
      </td>
   </tr>
   <tr>
      <th colspan="1" style="text-align:left; padding-left:8px">
         Sasaran
      </th>
      <td colspan="2" style="text-align:left; padding-left:8px">
         <?= ucfirst($musrenbang['sasaran']) ?>
      </td>
   </tr>
   <tr>
      <th colspan="1" style="text-align:left; padding-left:8px">
         Keterangan Sasaran
      </th>
      <td colspan="2" style="text-align:left; padding-left:8px">
         <?= ucfirst($musrenbang['keterangan']) ?>
      </td>
   </tr>
   <tr>
      <th colspan="1" style="text-align:left; padding-left:8px">
         Volume
      </th>
      <td colspan="2" style="text-align:left; padding-left:8px">
         <?= $musrenbang['volume'] ?> &#13221
      </td>
   </tr>
   <tr>
      <th colspan="1" style="text-align:left; padding-left:8px">
         Lokasi
      </th>
      <td colspan="2" style="text-align:left; padding-left:8px">
         <?= ucfirst($musrenbang['lokasi']) ?>
      </td>
   </tr>
   <tr>
      <th colspan="1" style="text-align:left; padding-left:8px">
         Biaya
      </th>
      <td colspan="2" style="text-align:left; padding-left:8px">
         Rp.<?= number_format($musrenbang['biaya'], 2, ",", "."); ?>
      </td>
   </tr>
   <tr>
      <th colspan="3" style="padding: 10px 0; background-color: #c4c4c4">Persetujuan Kepala Bidang Instansi Terkait</th>
   </tr>
   <tr>
      <th>Nama Instansi</th>
      <th width="21%">Keputusan Instansi</th>
      <th>Keterangan</th>
   </tr>
   <?php foreach ($persetujuan as $p) : ?>
      <tr>
         <th style="text-align:left; padding-left:8px"><?= $p['nama_instansi'] ?>a</th>
         <?php if ($p['status'] == 'Diproses' || $p['status'] == '') : ?>

            <td>
               <center style="color:grey">Diproses</center>
            </td>
            <td style="padding-left:8px"><?= $p['keterangan'] ?></td>
         <?php elseif ($p['status'] == 'Disetujui') : ?>
            <td>
               <center style="color:green">Disetujui</center>
            </td>
            <td style="padding-left:8px"><?= $p['keterangan'] ?></td>
         <?php elseif ($p['status'] == 'Tidak Disetujui') : ?>
            <td>
               <center style="color:danger">Tidak Disetujui</center>
            </td>
            <td style="padding-left:8px"><?= $p['keterangan'] ?></td>
         <?php elseif ($p['status'] == 'Tidak Terkait') : ?>
            <td>
               <center style="color:orange">Tidak Terkait</center>
            </td>
            <td style="padding-left:8px"><?= $p['keterangan'] ?></td>
         <?php endif; ?>
      </tr>
   <?php endforeach; ?>
   </tr>
   <tr>
      <th colspan="3" style="padding: 10px 0; background-color: #c4c4c4">Keputusan Pemerintah</th>
   </tr>
   <tr>
      <?php if ($pengesahan['keputusan'] == 'Disetujui') : ?>
         <th colspan="3" style="background-color:#99fc81">
            <h3>Disetujui</h3>
         </th>
      <?php elseif ($pengesahan['keputusan'] == 'Diproses') : ?>
         <th colspan="3" style="background-color:#f5e98e">
            <h3>Diproses</h3>
         </th>
      <?php elseif ($pengesahan['keputusan'] == 'Ditolak') : ?>
         <th colspan="3" style="background-color:#f77e7e">
            <h3>Tidak Disetujui</h3>
         </th>
      <?php endif; ?>
   </tr>
</table>

<?php
$path = 'assets/img/ttd.png';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>

<div style="float:right">
   <h4>Mengetahui,</h4>
   <h4>Wali Kota Tangerang Selatan</h4>
   <img src="<?php echo $base64 ?>" width="200" height="70" style="margin-top:10px" />
   <h4><?= $verifikator['name'] ?></h4>
</div>