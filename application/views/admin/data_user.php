<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data User</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-10">

            <?= $this->session->flashdata('pesan'); ?>
            <a href="<?= base_url('admin/tambah_user') ?>" class="btn btn-primary btn-sm float-right">Tambah User</a>

            <div class="table-responsive mt-5">
                <table class="table table-bordered text-center bg-light">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Posisi</th>
                            <th>Kecamatan</th>
                            <th>Nama Instansi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($user as $u) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $u['name'] ?></td>
                                <td><?= $u['user_name'] ?></td>
                                <?php
                                if ($u['role_id'] == 1) {
                                    $role_name = "Kecamatan";
                                } else if ($u['role_id'] == 2) {
                                    $role_name = "Verifikator";
                                } else if ($u['role_id'] == 3) {
                                    $role_name = "Administrator";
                                } else if ($u['role_id'] == 4) {
                                    $role_name = "Instasi";
                                } ?>
                                <td><?= $role_name ?></td>
                                <td><?= $u['Kecamatan'] ?></td>
                                <td><?= $u['nama_instansi'] ?></td>
                                <td>
                                    <a href="<?= base_url("admin/edit_user") ?>?id=<?= $u['user_id'] ?>" class="btn btn-warning">
                                        <i class="fas fa-fw fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('admin/hapus_user') ?>?id=<?= $u['user_id'] ?>" class="btn btn-danger">
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