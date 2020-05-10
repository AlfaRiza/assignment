
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
                    <h1 class="h4 text-gray-900 mb-4">Lupa Password?</h1>
                </div>
                <div>
                <?= $this->session->flashdata('message'); ?>
                </div>
                <form class="user" method="post" action="<?= base_url('auth/forgotPassword'); ?>">
                    <div class="form-group">
                    <input type="email" class="form-control form-control-user" autofocus id="email" name="email" placeholder="Masukkan email" value="<?= set_value('email'); ?>">
                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                    Reset Password
                    </button>
                </form>
                <hr>
                <div class="text-center">
                    <a class="small" href="<?= base_url('auth'); ?>">Kembali ke login</a>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>

    </div>

    </div>

</div>
