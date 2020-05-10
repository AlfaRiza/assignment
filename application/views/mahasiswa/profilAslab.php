
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
                <?php foreach ($aslab as $as):?>
                    <div class="col-md-3 mr-4"> 
                        <div class="card pt-2 px-2" style="width: 17rem;" >
                            <img width="50%" src="<?= base_url('assets/img/profile/').$as['foto']; ?>" class="card-img-top rounded-circle" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $as['nama'] ?></h5>
                                <p class="card-text"><?= $as['nim'] ?></p>
                                <p class="card-text"><?= $as['email'] ?></p>
                                <a href="<?= base_url('mahasiswa/detailAslab/').$as['id']; ?>" class="btn btn-primary"><i class="fas fa-fw fa-info"></i> Detail</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

