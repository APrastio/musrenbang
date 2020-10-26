<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Keterangan Musrenbang Tidak Diakomodir</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-10">
            <form action="<?= base_url('verifikator/verifyMusrenbang') ?>" method="post">

                <div class="form-group">
                    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                    <input type="hidden" name="diakomodir">
                    <label>Keterangan</label>
                    <textarea class="form-control" rows="5" name="alasan"></textarea>
                    <?= form_error('alasan', ' <small class="text-danger pl-3">', '</small>') ?>
                </div>

                <button class="btn btn-primary float-right" type="submit">Submit</button>
            </form>
        </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->