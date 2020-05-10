
    <div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-md-6">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-md">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Ganti Password for </h1>
                    <h5 class="h4 text-success mb-4"><?= $this->session->userdata('reset_email'); ?></h5>
                </div>
                <div>
                <?= $this->session->flashdata('message'); ?>
                </div>
                <form class="user" method="post" action="<?= base_url('auth/changePassword'); ?>">
                    <div class="form-group">
                    <input type="password" class="form-control form-control-user" autofocus id="password" name="password" placeholder="Masukkan password baru">
                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                    <input type="password" class="form-control form-control-user" autofocus id="repeat_password" name="repeat_password" placeholder="Masukkan konfirmasi password">
                    <?= form_error('repeat_password', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                    Ganti Password
                    </button>
                </form>
                </div>
            </div>
            </div>
        </div>
        </div>

    </div>

    </div>

</div>
