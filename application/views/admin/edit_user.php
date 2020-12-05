<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit User</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-10">
            <form action="<?= base_url('admin/ubah') ?>" method="post">
                <div class="form-group">
                    <input type="hidden" value="<?= $user['user_id'] ?>" name="id">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="name" value="<?= $user['name'] ?>">
                    <?= form_error('name', ' <small class="text-danger pl-3">', '</small>') ?>
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="user_name" value="<?= $user['user_name'] ?>">
                    <?= form_error('user_name', ' <small class="text-danger pl-3">', '</small>') ?>
                </div>

                <div class=" form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                    <?= form_error('password', ' <small class="text-danger pl-3">', '</small>') ?>
                </div>

                <div class=" form-group">
                    <label>Posisi</label>
                    <select class="form-control" name="role_id">
                        <?php foreach ($posisi as $p) : ?>
                            <?php if ($user['role_id'] == $p['role_id']) : ?>
                                <option selected value="<?= $p['role_id'] ?>"><?= $p['posisi'] ?></option>
                            <?php else : ?>
                                <option value="<?= $p['role_id'] ?>"><?= $p['posisi'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    </select>
                </div>

                <div class="form-group">
                    <label>Kecamatan</label>
                    <input type="text" class="form-control" name="kecamatan" value="<?= $user['Kecamatan'] ?>">
                    <small>Kosongkan jika posisi bukan kecamatan</small>
                </div>
                <div class="form-group">
                    <label>Nama Instansi</label>
                    <select class="form-control" name="instasi">
                        <?php foreach ($instasi as $i) : ?>
                            <?php if ($user['instasi_id'] == $i['instasi_id']) : ?>
                                <option selected value="<?= $i['instasi_id'] ?>"><?= $i['nama_instansi'] ?></option>
                            <?php else : ?>
                                <option value="<?= $i['instasi_id'] ?>"><?= $i['nama_instansi'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <small>Kosongkan jika posisi bukan instansi</small>
                </div>

                <button class=" btn btn-primary float-right" type="submit">Simpan</button>
            </form>
        </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->