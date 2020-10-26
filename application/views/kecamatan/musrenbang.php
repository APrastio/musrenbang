<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Musrenbang</h1>
    </div>

    <h5 class="h6 mb-0 text-gray-800">Tahun : 2020</h5>
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
                            <th>Sasaran</th>
                            <th>Volume</th>
                            <th>Lokasi</th>
                            <th>Biaya</th>
                            <th>Diakomodir</th>
                            <th>Alasan tidak diakomodir</th>
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
                                <td><?= $m['sasaran'] ?></td>
                                <td><?= $m['volume'] ?></td>
                                <td><?= $m['lokasi'] ?></td>
                                <td><?= $m['biaya'] ?></td>
                                <?php if ($m['diakomodir'] == "Menunggu Konfirmasi") : ?>
                                    <td>
                                        <div class="badge badge-pill badge-secondary">Menunggu Konfirmasi</div>
                                    </td>
                                    <?elseif($m['diakomodir']=="Diakomodir"):?>
                                    <td>
                                        <div class="badge badge-pill badge-danger">Diakomodir</div>
                                    </td>
                                    <?elseif($m['diakomodir']=="Tidak Diakomodir"):?>
                                    <td>
                                        <div class="badge badge-pill badge-success">Tidak Diakomodir</div>
                                    </td>
                                <?php endif; ?>
                                <td><?= $m['alasan'] ?></td>
                                <td>
                                    <a href="#" class="btn btn-warning">
                                        <i class="fas fa-fw fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger">
                                        <i class="fas fa-fw fa-trash"></i>
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