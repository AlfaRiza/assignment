
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
                            <a class="nav-link" href="#">Lihat Anggota<span class="sr-only"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Lihat Nilai</a>
                        </li>
                        </ul>
                    </div>
                    </nav>
            <div class="row">
                <div class="col-md">
                    <?= $this->session->flashdata('message'); ?>
                </div>
            </div>
            <?php if (!$tugas) { ?>
            <div class="row">
                <div class="col-md">
                    <div class="col-md-12 text-center text-success"><h2>Ooopppsss!!! <br> anda belum pernah membuat tugas di kelas ini</h2> <br></div>
                        <div class="col-md d-flex justify-content-center">
                        <img style="width: 20%" src="<?= base_url('assets/img/cry1.png') ?>" class="card-img" alt="..."> <br>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center">
                        <a href="<?= base_url('aslab/tambahTugas/').$kelas['id']; ?>" class="btn btn-lg btn-success"><i class="fas fa-plus"></i> Tambah Tugas</a>
                    </div>
                </div>
            </div>
            <?php }else { ?>
            <div class="row">
            <div class="col-md-12">
            <?php foreach($tugas as $t) : ?>
                    <div class="list-group mb-3">
                        <a class="list-group-item list-group-item-action">
                            <?= $t['Title']; ?>
                            <p><?= date('d F Y, h:i:s A', $t['batas_waktu']); ?></p>
                            <a href="<?= base_url('mahasiswa/detailTugas/'.$t['id']);?>">Lihat kelas</a>
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
            <?php } ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

