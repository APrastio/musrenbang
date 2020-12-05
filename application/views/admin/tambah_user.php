             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                 <div class="d-sm-flex align-items-center justify-content-between mb-4">
                     <h1 class="h3 mb-0 text-gray-800">Tambah User</h1>
                 </div>

                 <!-- Content Row -->
                 <div class="row">
                     <div class="col-10">
                         <form action="<?= base_url('auth/regis'); ?>" method="post">
                             <div class="form-group">
                                 <label>Nama</label>
                                 <input type="text" class="form-control" name="name">
                                 <?= form_error('name', ' <small class="text-danger pl-3">', '</small>') ?>
                             </div>

                             <div class="form-group">
                                 <label>Username</label>
                                 <input type="text" class="form-control" name="user_name">
                                 <?= form_error('user_name', ' <small class="text-danger pl-3">', '</small>') ?>
                             </div>

                             <div class="form-group">
                                 <label>Password</label>
                                 <input type="password" class="form-control" name="password">
                                 <?= form_error('name', ' <small class="text-danger pl-3">', '</small>') ?>
                             </div>

                             <div class="form-group">
                                 <label>Posisi</label>
                                 <select class="form-control" name="role_id">
                                     <option value="3">Administrator</option>
                                     <option value="1">Kecamatan</option>
                                     <?php if (sizeof($cek) <= 3) : ?>
                                         <option value="4">Instansi</option>
                                     <?php endif; ?>
                                 </select>
                             </div>

                             <div class="form-group">
                                 <label>Kecamatan</label>
                                 <input type="text" class="form-control" name="kecamatan">
                                 <small>Kosongkan jika posisi bukan kecamatan</small>
                             </div>

                             <div class="form-group">
                                 <label>Nama Instansi</label>
                                 <?php if (sizeof($cek) == 4) : ?>
                                     <input type="hidden" name="instasi" value="5">
                                     <input type="text" class="form-control" readonly value="Keempat Instasi sudah dibuat">
                                 <?php elseif (sizeof($cek) <= 3) : ?>
                                     <select class="form-control" name="instasi">
                                         <option value="5"></option>
                                         <?php if ($cek[0]['instasi_id'] != 1) : ?>
                                             <option value="1">Bidang Perencanaan, Data dan Evaluasi Pembangunan</option>
                                         <?php endif; ?>
                                         <?php if ($cek[1]['instasi_id'] != 2) : ?>
                                             <option value="2">Bidang Ekonomi dan Sosial Kemasyarakatan</option>
                                         <?php endif; ?>
                                         <?php if ($cek[2]['instasi_id'] != 3) : ?>
                                             <option value="3">Bidang Fisik dan Prasarana</option>
                                         <?php endif; ?>
                                         <?php if ($cek[3]['instasi_id'] != 4) : ?>
                                             <option value="4">Bidang Penelitian, Pengembangan dan Pemerintahan Umum</option>
                                         <?php endif; ?>
                                     </select>
                                     <small>Kosongkan jika posisi bukan instansi</small>
                                 <?php endif; ?>
                             </div>

                             <button type="submit" class="btn btn-primary float-right">Simpan</button>
                         </form>
                     </div>

                 </div>

             </div>
             <!-- /.container-fluid -->

             </div>
             <!-- End of Main Content -->