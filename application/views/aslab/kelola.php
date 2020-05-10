
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
            <?php if (!$kelas) { ?>
            <div class="row">
                <div class="col-md">
                    <div class="col-md-12 text-center text-success"><h2>Ooopppsss!!! anda belum pernah membuat kelas</h2> <br></div>
                        <div class="col-md d-flex justify-content-center">
                        <img style="width: 20%" src="<?= base_url('assets/img/cry1.png') ?>" class="card-img" alt="..."> <br>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center">
                        <a href="<?= base_url('aslab/tambahKelas'); ?>" class="btn btn-lg btn-success"><i class="fas fa-plus"></i> Tambah kelas</a>
                    </div>
                </div>
            </div>
            <?php }else { ?>
            <div class="row">
                <div class="col-md">
                    <a href="<?= base_url('aslab/tambahKelas'); ?>" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Buat Kelas Baru</a>
                </div>
            </div>
            <div class="row">
            <?php foreach($kelas as $k) : ?>
                <div class="col-md-3 mt-3">
                    <div class="card" style="width: 15.5rem;">
                        <img height="250px" src="<?= base_url('assets/img/class/').$k['image']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $k['nama_kelas']; ?></h5>
                        </div>
                        <a href="<?= base_url('aslab/lihatKelas/').$k['id']; ?>" class="btn btn-outline-primary" >Lihat Kelas</a>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php } ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

