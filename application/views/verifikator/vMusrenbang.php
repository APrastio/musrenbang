         <!-- Begin Page Content -->
         <div class="container-fluid">

             <!-- Page Heading -->
             <div class="d-sm-flex align-items-center justify-content-between mb-4">
                 <h1 class="h3 mb-0 text-gray-800">Data Musrenbang</h1>
             </div>

             <h5 class="h6 mb-0 text-gray-800">Tahun : 2020</h5>

             <!-- Content Row -->
             <div class="row mt-4">
                 <div class="col">
                     <div class="table-responsive">
                         <table class="table table-bordered text-center">
                             <thead>
                                 <tr>
                                     <th>No</th>
                                     <th>Kecamatan</th>
                                     <th>Kegiatan</th>
                                     <th>Sasaran</th>
                                     <th>Volume</th>
                                     <th>Lokasi</th>
                                     <th>Biaya</th>
                                     <th>Aksi</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                    $i = 1;
                                    foreach ($musrenbang as $m) : ?>
                                     <tr>
                                         <td><?= $i++ ?></td>
                                         <td><?= $m['kecamatan'] ?></td>
                                         <td><?= $m['kegiatan'] ?></td>
                                         <td><?= $m['sasaran'] ?></td>
                                         <td><?= $m['volume'] ?>&#13221;</td>
                                         <td><?= $m['lokasi'] ?></td>
                                         <td>Rp.<?= $m['biaya'] ?></td>
                                         <td>
                                             <a href="<?= base_url('verifikator/verifyMusrenbang') ?>?id=<?= $m['musrenbang_id'] ?>&diak=Diakomodir" class="btn btn-success">
                                                 <i class="fas fa-fw fa-check"></i>
                                             </a>
                                             <a href="<?= base_url('verifikator/verifyMusrenbang') ?>?id=<?= $m['musrenbang_id'] ?>&diak=Tidak Diakomodir" class="btn btn-danger">
                                                 <i class="fas fa-fw fa-times"></i>
                                             </a>
                                         </td>
                                     </tr>
                                 <?php endforeach; ?>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>

         </div>
         <!-- /.container-fluid -->

         </div>
         <!-- End of Main Content -->