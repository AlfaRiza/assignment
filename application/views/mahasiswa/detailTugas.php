
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
                <div class="col-md-8 mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend2">Title</span>
                        </div>
                        <input type="text" class="form-control" id="validationDefaultUsername" readonly value="<?= $tugas['Title'] ?>" aria-describedby="inputGroupPrepend2" required>
                    </div>
                </div>
                <div class="col-md-8 mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend2">Description</span>
                        </div>
                        <input type="text" class="form-control" id="validationDefaultUsername" readonly value="<?= $tugas['Description'] ?>" aria-describedby="inputGroupPrepend2" required>
                    </div>
                </div>
                <div class="col-md-8 mb-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend2">Batas Waktu</span>
                        </div>
                        <input type="text" class="form-control" id="validationDefaultUsername" readonly value="<?= date('d F Y, h:i:s A',$tugas['batas_waktu']); ?>" aria-describedby="inputGroupPrepend2" required>
                    </div>
                </div>
                <div class="col-md-8 mb-3">
                <?php if($task){ ?>
                    <div class="alert alert-success" role="alert">
                    Anda sudah mengumpulkan
                    </div>
                <?php }elseif ($tugas['batas_waktu'] < time()) { ?>
                    <div class="alert alert-danger" role="alert">
                    Waktu Habis
                    </div>
                <?php }else{ ?>
                <?= form_open_multipart('mahasiswa/kumpulTugas/'.$tugas['id']); ?>
                    <div class="form-group">
                        <label for="customFile">Kumpul Tugas</label>
                        <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file" id="file">
                        <label class="custom-file-label" for="file">Choose file</label>
                        </div>
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-primary">Kumpulkan</button>
                    </div>
                </form>
                <?php } ?>
                </div>
            </div>
            <div class="row">
            <?php if (!$tugas['example']) { ?>
                
                <?php }else { ?>
                    <div class="col-md-8 mb-3">
                    <div class="card" style="width: 20rem;">
                        <div class="card-body">
                            <h5 class="card-title">Example</h5>
                            <h5 class="card-subtitle mb-2 text-muted"><i class="fas fa-fw fa-file-pdf"></i> <i class="fas fa-fw fa-file-archive"></i> <i class="fas fa-fw fa-file-word"></i> </h5>
                            <p class="card-text"></p>
                            <a href="<?= base_url('mahasiswa/download/').$tugas['id']; ?>" class="btn btn-primary card-link"><i class="fas fa-fw fa-file-download"></i> Download</a>
                            <a href="#" data-id="<?= $tugas['id']; ?>" class="card-link" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-fw fa-eye"></i> Preview</a>
                        </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
        <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?= $tugas['example']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                            <div>
                                <embed src="<?= base_url('assets/img/tugas/').$tugas['example']; ?>" type='application/pdf' width='100%' height='350px'/>
                            </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('mahasiswa/download/').$tugas['id']; ?>" class="btn btn-primary">Download</a>
                </div>
                </div>
            </div>
            </div>