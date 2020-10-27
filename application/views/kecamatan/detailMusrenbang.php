<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Musrenbang</h1>

        <?php if($musrenbang['diakomodir'] != 'Menunggu Konfirmasi') : ?>
            <a class="btn btn-dark mt-4" href="<?= base_url('kecamatan/printMusrenbang/' . $musrenbang['musrenbang_id']) ?>">
                <i class="fas fa-save mr-2"></i>
                Cetak Musrenbang
            </a>
        <?php endif ?>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered"> 
                <tr>
                    <th><h5 class="font-weight-bold">Kecamatan</h5></th>
                    <td class="font-weight-bold"><?= ucfirst($musrenbang['Kecamatan']) ?></td>
                </tr>
                <tr>
                    <th><h5 class="font-weight-bold">Kegiatan</h5></th>
                    <td class="font-weight-bold"><?= ucfirst($musrenbang['kegiatan']) ?></td>
                </tr>
                <tr>
                    <th><h5 class="font-weight-bold">Sasaran</h5></th>
                    <td class="font-weight-bold"><?= ucfirst($musrenbang['sasaran']) ?></td>
                </tr>
                <tr>
                    <th><h5 class="font-weight-bold">Volume</h5></th>
                    <td class="font-weight-bold"><?= $musrenbang['volume'] ?> &#13221</h5></td>
                </tr>
                <tr>
                    <th><h5 class="font-weight-bold">Lokasi</h5></th>
                    <td class="font-weight-bold"><?= ucfirst($musrenbang['lokasi']) ?></td>
                </tr>
                <tr>
                    <th><h5 class="font-weight-bold">Biaya</h5></th>
                    <td class="font-weight-bold">Rp.<?= number_format($musrenbang['biaya'], 2, ",", "."); ?></td>
                </tr>
                <tr>
                    <th><h5 class="font-weight-bold">Status</h5></th>
                    <td>
                        <?php if ($musrenbang['diakomodir'] == 'Menunggu Konfirmasi') : ?>
                            <h5><span class="badge badge-secondary">Menunggu Konfirmasi</span></h5>
                        <?elseif($musrenbang['diakomodir'] == 'Diakomodir'):?>
                            <h5><span class="badge badge-success">Musrenbang Diterima</span></h5>
                        <?elseif($musrenbang['diakomodir'] == 'Tidak Diakomodir'):?>
                            <h5><span class="badge badge-danger">Musrenbang Ditolak</span></h5>
                        <?php endif; ?>
                    </h5></td>
                </tr>
                <?php if($musrenbang['diakomodir'] != 'Menunggu Konfirmasi') : ?>
                    <tr>
                        <th><h5 class="font-weight-bold">Keterangan</h5></th>
                        <td class="font-weight-bold"><?= $musrenbang['alasan'] ?></td>
                    </tr>
                <?php endif ?>
            </table>

            <?php if($musrenbang['diakomodir'] == 'Menunggu Konfirmasi') : ?>
                <a href="<?= base_url('kecamatan/editMusrenbang') ?>?id=<?= $musrenbang['musrenbang_id'] ?>" class="btn btn-warning">
                    <i class="fas fa-fw fa-edit"></i>
                    Edit
                </a>
                <a href="<?= base_url('musrenbang/hapus') ?>?id=<?= $musrenbang['musrenbang_id'] ?>" class=" btn btn-danger">
                    <i class="fas fa-fw fa-trash"></i>
                    Hapus
                </a>
            <?php endif ?>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->