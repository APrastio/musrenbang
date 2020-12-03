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
                                 <input type="text" class="form-control" name="password">
                                 <?= form_error('name', ' <small class="text-danger pl-3">', '</small>') ?>
                             </div>

                             <div class="form-group">
                                 <label>Posisi</label>
                                 <select class="form-control" name="role_id">
                                     <option value="3">Administrator</option>
                                     <option value="1">Kecamatan</option>
                                     <option value="4">Instansi</option>
                                 </select>
                             </div>

                             <div class="form-group">
                                 <label>Kecamatan</label>
                                 <input type="text" class="form-control" name="kecamatan">
                                 <small>Kosongkan jika posisi bukan kecamatan</small>
                             </div>

                             <div class="form-group">
                                 <label>Nama Instansi</label>
                                 <select class="form-control" name="instasi">
                                     <option value="5"></option>
                                     <option value="1">Bidang Perencanaan, Data dan Evaluasi Pembangunan</option>
                                     <option value="2">Bidang Ekonomi dan Sosial Kemasyarakatan</option>
                                     <option value="3">Bidang Fisik dan Prasarana</option>
                                     <option value="4">Bidang Penelitian, Pengembangan dan Pemerintahan Umum</option>
                                 </select>
                                 <small>Kosongkan jika posisi bukan instansi</small>
                             </div>

                             <button type="submit" class="btn btn-primary float-right">Simpan</button>
                         </form>
                     </div>

                 </div>

             </div>
             <!-- /.container-fluid -->

             </div>
             <!-- End of Main Content -->