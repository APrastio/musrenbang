<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Musrenbang</h1>
    </div>

    <h5 class="h6 mb-0 text-gray-800">Tahun : <?= date('Y') ?></h5>
    <?php
    ?>
    <!-- Content Row -->
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row mt-4">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kecamatan</th>
                            <th>Kegiatan</th>
                            <th>Biaya</th>
                            <th>Diakomodir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($musrenbang as $m) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $m['kecamatan'] ?></td>
                                <td><?= $m['kegiatan'] ?></td>
                                <td>Rp.<?= number_format($m['biaya'], 2, ",", ".");?></td>
                                <?php if ($m['diakomodir'] == "Menunggu Konfirmasi") : ?>
                                    <td>
                                        <h5><span class="badge badge-pill badge-secondary">Menunggu Konfirmasi</span></h5>
                                    </td>
                                <?elseif($m['diakomodir']=="Diakomodir"):?>
                                    <td>
                                        <h5><span class="badge badge-pill badge-success">Diakomodir</span></h5>
                                    </td>
                                <?elseif($m['diakomodir']=="Tidak Diakomodir"):?>
                                    <td>
                                        <h5><span class="badge badge-pill badge-danger">Tidak Diakomodir</span></h5>
                                    </td>
                                <?php endif; ?>
                                <td>
                                    <a href="<?= base_url('kecamatan/detailMusrenbang/' .$m['musrenbang_id']) ?>" class="btn btn-info">
                                        <i class="fas fa-info-circle"></i>
                                        Detail
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