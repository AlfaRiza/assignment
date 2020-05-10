
            <!-- Begin Page Content -->
            <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
            </div>
            <div class="row">
                <div class="col-md">
                    <a href="<?= base_url('aslab/kelola') ?>" class="btn btn-primary mb-4">Kembali</a>
                </div>
                <!-- <div class="col-md d-flex justify-content-end">
                    <a href="<?php // base_url('aslab/pdf') ?>" class="btn btn-danger mb-4"><i class="fas fa-download"></i> Download</a>
                </div> -->
            </div>
            <div class="row">
                <div class="col-md">
                    <?= $this->session->flashdata('message'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <?php if(!$task) { ?>
                        <div class="row">
                            <div class="col-md">
                                <div class="col-md-12 text-center text-success"><h2>Ooopppsss!!! praktikan anda belum ada yang mengumpulkan, maklum belum deadline</h2> <br></div>
                                    <div class="col-md d-flex justify-content-center">
                                    <img style="width: 20%" src="<?= base_url('assets/img/cry1.png') ?>" class="card-img" alt="..."> <br>
                                    </div>
                                    <div class="col-md-12 d-flex justify-content-center">
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php foreach( $task as $t) { ?>
                        <div class="card mt-3" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $t['nama'] ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php // $t['Title'] ?></h6>
                            <p class="card-text"><?= $t['file'] ?></p>
                            <?php if($t['nilai'] == 0) { ?>
                            <p class="card-text text-danger">Belum memiliki nilai</p>
                            <?php }else{ ?>
                            <p class="card-text"><?= $t['nilai']; ?></p>
                            <?php } ?>
                            <a class="btn btn-primary" href="<?= base_url('aslab/lihatTugas/').$t['id']; ?>" class="card-link">Lihat Tugas</a>
                        </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            </div>

            </div>
            <!-- /.container-fluid -->

        <!-- End of Main Content -->
