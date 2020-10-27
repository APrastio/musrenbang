<center><h2>HASIL KESEPAKATAN MUSRENBANG <br> KOTA TANGERANG SELATAN <br> TAHUN <?= date('Y') ?> <br> DI KECAMATAN <?= strtoupper($musrenbang['Kecamatan']) ?></h2></center><hr/><br/>

<table border="1" width="100%"> 
   <tr>
      <th><h3>Kecamatan</h3></th>
      <td style="text-align:center"><h3><?= ucfirst($musrenbang['Kecamatan']) ?></h3></td>
   </tr>
   <tr>
      <th><h3>Kegiatan</h3></th>
      <td style="text-align:center"><h4><?= ucfirst($musrenbang['kegiatan']) ?></h4></td>
   </tr>
   <tr>
      <th><h3>Sasaran</h3></th>
      <td style="text-align:center"><h4><?= ucfirst($musrenbang['sasaran']) ?></h4></td>
   </tr>
   <tr>
      <th><h3>Volume</h3></th>
      <td style="text-align:center"><h4><?= $musrenbang['volume'] ?> &#13221</h4></td>
   </tr>
   <tr>
      <th><h3>Lokasi</h3></th>
      <td style="text-align:center"><h4><?= ucfirst($musrenbang['lokasi']) ?></h4></td>
   </tr>
   <tr>
      <th><h3>Biaya</h3></th>
      <td style="text-align:center"><h4>Rp.<?= number_format($musrenbang['biaya'], 2, ",", "."); ?></h4></td>
   </tr>
   <tr>
      <th><h3>Status</h3></th>
      <td style="text-align:center">
         <?if($musrenbang['diakomodir'] == 'Diakomodir'):?>
               <h3 style="color:green;">Musrenbang Diterima</h3>
         <?elseif($musrenbang['diakomodir'] == 'Tidak Diakomodir'):?>
               <h3 style="color:red;">Musrenbang Ditolak</h3>
         <?php endif; ?>
      </h3></td>
   </tr>
   <?php if($musrenbang['diakomodir'] != 'Menunggu Konfirmasi') : ?>
      <tr>
         <th><h3>Keterangan</h3></th>
         <td style="text-align:center"><h4><?= $musrenbang['alasan'] ?></h4></td>
      </tr>
   <?php endif ?>
</table>