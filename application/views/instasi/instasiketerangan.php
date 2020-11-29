 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h3 mb-0 text-gray-800">Berikan Keterangan</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
       <div class="col-10">
          <form action="<?= base_url('instasi/persetujuan') ?>" method="post">
             <input type="hidden" value="<?= $instasi_id ?>" name="instasi_id">
             <input type="hidden" value="<?= $musrenbang_id ?>" name="musren">
             <input type="hidden" value="<?= $status ?>" name="status">
             <div class="form-group">
                <label>Keterangan Usulan Musrenbang</label>
                <textarea class="form-control" rows="5" name="keterangan"></textarea>
             </div>

             <button class="btn btn-primary float-right" type="submit">Submit</button>
          </form>
       </div>

    </div>

 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->