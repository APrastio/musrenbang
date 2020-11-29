 <!-- Begin Page Content -->
 <div class="container-fluid">
    <?php var_dump($musrenbang) ?>
    <?php var_dump($_SESSION) ?>
    <?php var_dump($status) ?>
    <?php var_dump($instasi) ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h3 mb-0 text-gray-800">Detail Musrenbang</h1>
    </div>

    <!-- Content Row -->
    <div class="row mt-4">
       <div class="col">
          <div class="table-responsive">
             <table class="table table-bordered">
                <input type="hidden" value="<?= $musrenbang['user_id'] ?>">
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
                   <td colspan="2">Rp.<?= number_format($musrenbang['biaya'], 2, ",", "."); ?></td>
                </tr>
             </table>
          </div>
       </div>
    </div>

    <div class="row mt-4 mb-5">
       <div class="col">
          <?php if ($status <= 0) : ?>

             <a href="<?= base_url('instasi/keterangan/') . $instasi['instasi_id'] . '/' . $status = 'Disetujui' . '/' . $musrenbang['musrenbang_id'] ?>" class="btn btn-success">
                <i class="fas fa-fw fa-check"></i>
                Usulan Diterima
             </a>
             <a href="<?= base_url('instasi/keterangan/') . $instasi['instasi_id'] . '/' . $status = 'Tidak Disetujui' . '/' . $musrenbang['musrenbang_id'] ?>" class="btn btn-danger">
                <i class="fas fa-fw fa-times"></i>
                Usulan Ditolak
             </a>
             <a href="<?= base_url('instasi/tidakterkait/') . $instasi['instasi_id'] . '/' . $musrenbang['musrenbang_id'] ?>" class="btn btn-secondary">
                <i class="fas fa-fw fa-times"></i>
                Usulan Tidak Terkait
             </a>
          <?php endif; ?>
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