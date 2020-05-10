
            <!-- Begin Page Content -->
            <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
            </div>
            <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="<?= base_url(); ?>">
                        <img src="<?= base_url('assets/img/class/').$kelas['image']; ?>" width="30" height="30" class="d-inline-block align-top rounded-circle" alt="">
                        <?= $kelas['nama_kelas']; ?>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto mr-3">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('aslab/lihatAnggota/').$kelas['id']; ?>">Lihat Anggota<span class="sr-only"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('aslab/tambahTugas/').$kelas['id']; ?>">Tambah Tugas</a>
                        </li>
                        </ul>
                    </div>
                    </nav>
            <div class="row">
                <div class="col-md">
                    <?= $this->session->flashdata('message'); ?>
                </div>
            </div>
            <?php if(!$anggota) { ?>
                <div class="row">
                    <div class="col-md">
                        <div class="col-md-12 text-center text-success"><h2>Ooopppsss!!! belum ada anggota di kelas ini</h2> <br></div>
                            <div class="col-md d-flex justify-content-center">
                            <img style="width: 20%" src="<?= base_url('assets/img/cry1.png') ?>" class="card-img" alt="..."> <br>
                            </div>
                            <div class="col-md-12 d-flex justify-content-center">
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php foreach($anggota as $a) : ?>
            <div class="row ml-5">
            <div class="list-group mt-3">
                            <p><?= $a['nama'] ?></p>
                    </div>
            </div>
            <?php endforeach ?>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

