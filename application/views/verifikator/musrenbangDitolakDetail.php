<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Detail Musrenbang</h1>
   </div>

   <!-- Content Row -->
   <div class="row mt-4">
      <div class="col">
         <div class="table-responsive">
            <table class="table table-bordered">
               <tr>
                  <th>KECAMATAN</th>
                  <td colspan="2"><?= $musrenbang['kecamatan'] ?></td>
               </tr>
               <tr>
                  <th>Tgl/Bln/Tahun</th>
                  <td colspan="2"><?= date('d/m/yy', $musrenbang['date']) ?></td>
               </tr>
               <tr>
                  <th>Jenis Kegiatan</th>
                  <td colspan="2"><?= $musrenbang['jenis_kegiatan'] ?></td>
               </tr>
               <tr>
                  <th>Sasaran</th>
                  <td colspan="2"><?= $musrenbang['sasaran'] ?></td>
               </tr>
               <tr>
                  <th>Keterangan Sasaran</th>
                  <td colspan="2"><?= $musrenbang['keterangan'] ?></td>
               </tr>
               <tr>
                  <th>Volume</th>
                  <td colspan="2"><?= $musrenbang['volume'] ?></td>
               </tr>
               <tr>
                  <th>Lokasi</th>
                  <td colspan="2"><?= $musrenbang['lokasi'] ?></td>
               </tr>
               <tr>
                  <th>Biaya</th>
                  <td colspan="2">Rp.<?= number_format($musrenbang['biaya'], 2, ",", ".") ?></td>
               </tr>
               <tr>
                  <th colspan="3" class="text-center table-dark">Persetujuan Kepala Bidang Instansi Terkait</th>
               </tr>
               <tr>
                  <th>Nama Instansi</th>
                  <th>Keputusan Instansi</th>
                  <th>Keterangan</th>
               </tr>
               <?php foreach ($persetujuan as $p) : ?>
                  <tr>
                     <th><?= $p['nama_instansi'] ?>a</th>
                     <?php if ($p['status'] == 'Diproses' || $p['status'] == '') : ?>
                        <td class="text-center"><span class="badge badge-secondary">Diproses</span></td>
                        <td><?= $p['keterangan'] ?></td>
                     <?php elseif ($p['status'] == 'Disetujui') : ?>
                        <td class="text-center"><span class="badge badge-success">Disetujui</span></td>
                        <td><?= $p['keterangan'] ?></td>
                     <?php elseif ($p['status'] == 'Tidak Disetujui') : ?>
                        <td class="text-center"><span class="badge badge-danger">Tidak Disetujui</span></td>
                        <td><?= $p['keterangan'] ?></td>
                     <?php elseif ($p['status'] == 'Tidak Terkait') : ?>
                        <td class="text-center"><span class="badge badge-warning">Tidak Terkait</span></td>
                        <td><?= $p['keterangan'] ?></td>
                     <?php endif; ?>
                  </tr>
               <?php endforeach; ?>
               <tr>
                  <th colspan="3" class="text-center table-dark">Keputusan Pemerintah</th>
               </tr>
               <tr>
                  <th colspan="3" class="text-center table-danger">
                     <h4 class="font-weight-bold">Tidak Disetujui</h4>
                  </th>
               </tr>
            </table>
         </div>
      </div>
   </div>

   <div class="row mt-4 mb-5">
      <div class="col">
         <a href="#" class="btn btn-info float-right">
            <i class="fas fa-fw fa-print"></i>
            Print Musrenbang
         </a>
      </div>
   </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->