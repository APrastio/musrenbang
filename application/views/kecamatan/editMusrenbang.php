         <!-- Begin Page Content -->
         <div class="container-fluid">

             <!-- Page Heading -->
             <div class="d-sm-flex align-items-center justify-content-between mb-4">
                 <h1 class="h3 mb-0 text-gray-800">Edit Musrenbang</h1>
             </div>

             <!-- Content Row -->
             <div class="row">
                 <div class="col-10">
                     <form action="<?= base_url('musrenbang/ubahMusrenbang') ?>" method="post">
                         <input type="hidden" value="<?= $musrenbang['musrenbang_id'] ?>" name="id">
                         <div class="form-group">
                             <label>Kegiatan</label>
                             <input type="text" class="form-control" value="<?= $musrenbang['kegiatan'] ?>" name="kegiatan">
                         </div>

                         <div class="form-group">
                             <label>Sasaran</label>
                             <textarea class="form-control" rows="5" name="sasaran"><?= $musrenbang['sasaran'] ?></textarea>
                         </div>

                         <div class="row">
                             <div class="col">
                                 <div class="form-group">
                                     <label>Volume</label>
                                     <input type="text" class="form-control" value="<?= $musrenbang['volume'] ?>" name="volume">
                                 </div>
                             </div>
                             <div class="col">
                                 <div class="form-group">
                                     <label>Lokasi</label>
                                     <input type="text" class="form-control" value="<?= $musrenbang['lokasi'] ?>" name="lokasi">
                                 </div>
                             </div>
                             <div class="col">
                                 <div class="form-group">
                                     <label>Biaya</label>
                                     <input type="text" class="form-control" value="<?= $musrenbang['biaya'] ?>" name="biaya">
                                 </div>
                             </div>
                         </div>

                         <button class="btn btn-primary float-right" type="submit">Perbaharui</button>
                     </form>
                 </div>

             </div>

         </div>
         <!-- /.container-fluid -->

         </div>
         <!-- End of Main Content -->