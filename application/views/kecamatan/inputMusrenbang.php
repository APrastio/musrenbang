<!-- Begin Page Content -->
<div class="container-fluid">
    <?php

    ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Input Musrenbang</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-10">
            <form action="<?= base_url('musrenbang/tambahMusrenbang') ?>" method="post">
                <div class="form-group">
                    <label>Kegiatan</label>
                    <input type="text" name="kegiatan" class="form-control">
                    <?= form_error('kegiatan', ' <small class="text-danger pl-3">', '</small>') ?>
                </div>

                <div class="form-group">
                    <label>Sasaran</label>
                    <textarea class="form-control" name="sasaran" rows="5"></textarea>
                    <?= form_error('sasaran', ' <small class="text-danger pl-3">', '</small>') ?>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Volume</label>
                            <input type="text" name="volume" class="form-control">
                            <?= form_error('volume', ' <small class="text-danger pl-3">', '</small>') ?>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Lokasi</label>
                            <input type="text" name="lokasi" class="form-control">
                            <?= form_error('lokasi', ' <small class="text-danger pl-3">', '</small>') ?>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Biaya</label>
                            <input type="text" name="biaya" class="form-control">
                            <?= form_error('biaya', ' <small class="text-danger pl-3">', '</small>') ?>
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary float-right" type="submit">Submit</button>
            </form>
        </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->