
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
            </div>
            <div class="row">
                <div class="col-md">
                    <?= $this->session->flashdata('message'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $task['nama']; ?></h5>
                            <a href="<?= base_url('aslab/download/').$id_task; ?>" class="btn btn-primary card-link"><i class="fas fa-fw fa-file-download"></i> Download</a>
                            <a href="#" data-id="<?= $task['file']; ?>" class="card-link" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-fw fa-eye"></i> Preview</a>
                            <br><br>
                            <form action="<?= base_url('aslab/lihatTugas/').$id_task; ?>" method="POST">
                                <?php if($task['nilai'] == 0) { ?>
                                    <div class="form-group">
                                    <label for="nilai">Nilai</label>
                                    <input type="text" name="nilai" class="form-control" id="nilai">
                                    <?= form_error('nilai', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <?php }else { ?>
                                    <div class="form-group">
                                    <label for="nilai">Nilai</label>
                                    <input type="text" name="nilai" class="form-control" id="nilai" value="<?= $task['nilai'] ?>">
                                    </div>
                                    <?= form_error('nilai', '<small class="text-danger">', '</small>'); ?>
                                <?php } ?>
                                
                                <button class="btn btn-primary float-right" type="input">Input</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>

            </div>
            <!-- /.container-fluid -->

        <!-- End of Main Content -->
        <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?= $task['file']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                            <div>
                                <embed src="<?= base_url('assets/img/task/').$task['file']; ?>" type='application/pdf' width='100%' height='350px'/>
                            </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('aslab/download/').$id_task; ?>" class="btn btn-primary">Download</a>
                </div>
                </div>
            </div>
            </div>