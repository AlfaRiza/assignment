
            <!-- Begin Page Content -->
            <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
            </div>
            <div class="row">
                <div class="col-md">
                    <?= $this->session->flashdata('message'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card" style="width: 100%;" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="1000">
                        <img class="card-img-top" src="<?= base_url('assets/img/profile/').$user['foto']; ?>" alt="Card image cap">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card" style="width: 100%;">
                        <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
                        <div class="card-body" data-aos="fade-left" data-aos-easing="linear" data-aos-delay="300" data-aos-duration="1000">
                            <h5 class="card-title">Selamat Datang <b class="text-success"><?= $user['nama']; ?></b></h5>
                            <p class="card-text"><?= $user['nim'];?></p>
                            <p class="card-text"><?= $user['email'];?></p>
                            <a href="<?= base_url('mahasiswa/kelas'); ?>" class="btn btn-primary">Kelas saya</a>
                        </div>
                    </div>
                </div>
            </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

