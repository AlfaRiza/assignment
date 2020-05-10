    <div class="container">
<div class="row">
    <div class="col-md-6 mx-auto">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
            <div class="col-lg">
                <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Buat Akun Baru</h1>
                </div>
                <form action="<?= base_url('auth/registrasi'); ?>" method="post" class="user">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="name" name="nama" placeholder="Masukkan Nama" autofocus value="<?= set_value('nama'); ?>">
                        <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nim" name="nim" placeholder="Masukkan NIM" value="<?= set_value('nim'); ?>">
                        <?= form_error('nim','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan Email" value="<?= set_value('email'); ?>">
                    <?= form_error('email','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="jurusan" name="jurusan" value="Teknik Informatika" disabled >
                    </div>
                    <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="no_telp" name="no_telp" placeholder="Masukkan nomor telpon" value="<?= set_value('no_telp'); ?>">
                    <?= form_error('no_telp','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                    <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="<?= set_value('alamat'); ?>" ><?= set_value('alamat'); ?></textarea>
                    <?= form_error('alamat','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Masukkan Password">
                        <?= form_error('password1','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="col-sm-6">
                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
                        <?= form_error('password2','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                    Buat Akun Baru
                    </button>
                </form>
                <hr>
                <div class="text-center">
                    <a class="small" href="<?= base_url('auth/forgotPassword') ?>">Lupa Password?</a>
                </div>
                <div class="text-center">
                    <a class="small" href="<?= base_url(); ?>">Sudah Punya Akun? Login!</a>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
        
    </div>