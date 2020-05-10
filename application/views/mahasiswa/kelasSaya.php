
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
                <?php 
                    if (!$kelas) { ?>
                    <div class="col-md-12 text-center text-success error" ><h2>Ooopppsss!!! anda belum memiliki kelas</h2> <br></div>
                        <div class="col-md d-flex justify-content-center">
                        <img style="width: 20%" src="<?= base_url('assets/img/cry1.png') ?>" class="card-img" alt="..."> <br>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center">
                        <a href="<?= base_url('mahasiswa/katalog') ?>" class="btn btn-lg btn-success"><i class="fas fa-search"></i> Cari kelas</a>
                        </div>
                    <?php }else{ ?>
                    <?php foreach($kelas as $k) : ?>
                <div class="col-md">
                    <div class="card" style="width: 15.5rem;">
                        <img src="<?= base_url('assets/img/class/').$k['image']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $k['nama_kelas']; ?></h5>
                            <p class="card-text"><?= $k['deskripsi']; ?></p>
                            <a href="<?= base_url('mahasiswa/detailKelas/').$k['id']; ?>" class="btn btn-primary">Lihat Kelas</a>
                        </div>
                    </div>
                    </a>
                </div>
            <?php endforeach; ?>

                <?php } ?>
            
            </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

