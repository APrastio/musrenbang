         <!-- Begin Page Content -->
         <div class="container-fluid">
            <?php var_dump($musrenbang) ?>
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
               <h1 class="h3 mb-0 text-gray-800">Edit Musrenbang</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
               <div class="col-10">
                  <form action="<?= base_url('musrenbang/ubahMusrenbang') ?>" method="post">
                     <div class="form-group">
                        <input type="hidden" name="id" value="<?= $musrenbang['musrenbang_id'] ?>">
                        <label>Jenis Kegiatan</label>
                        <select class="form-control" name="jenis">
                           <?php if ($musrenbang['jenis_kegiatan'] == 'FISIK/KONTRUKSI') : ?>
                              <option selected value="FISIK/KONTRUKSI">FISIK/KONTRUKSI</option>
                              <option value="NON FISIK">NON FISIK</option>
                           <?php else : ?>
                              <option value="FISIK/KONTRUKSI">FISIK/KONTRUKSI</option>
                              <option selected value="NON FISIK">NON FISIK</option>
                           <?php endif; ?>
                        </select>
                     </div>

                     <div class="form-group">
                        <label>Sasaran</label>
                        <input name="sasaran" class="form-control" value="<?= $musrenbang['sasaran'] ?>">
                     </div>

                     <div class="form-group">
                        <label>Keterangan Sasaran</label>
                        <textarea name="Ksasaran" class="form-control" rows="5"><?= $musrenbang['keterangan'] ?></textarea>
                     </div>

                     <div class="row">
                        <div class="col">
                           <div class="form-group">
                              <label>Volume</label>
                              <input type="text" name="volume" class="form-control" value="<?= $musrenbang['volume'] ?>">
                           </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                              <label>Lokasi</label>
                              <input type="text" name="lokasi" class="form-control" value="<?= $musrenbang['lokasi'] ?>">
                           </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                              <label>Biaya</label>
                              <input name="biaya" type="text" class="form-control" value="<?= $musrenbang['biaya'] ?>">
                           </div>
                        </div>
                     </div>

                     <button class="btn btn-primary float-right" type="submit">Update</button>
                  </form>
               </div>

            </div>

         </div>
         <!-- /.container-fluid -->

         </div>
         <!-- End of Main Content -->