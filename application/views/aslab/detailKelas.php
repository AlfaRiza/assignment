
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
                <div class="col-md-5">
                    <div class="card" style="width: 100%;">
                        <img src="<?= base_url('assets/img/class/').$kelas['image']; ?>" class="card-img-top" alt="...">
                    </div>
                </div>
                <?php form_open_multipart('')?>
                <div class="col-md-6">
                        <div class="form-group row">
                            <label for="nama_kelas" class="col-sm-4 col-form-label">Nama Kelas</label>
                            <div class="col-sm-8">
                            <input type="text" name="nama_kelas" class="form-control" id="nama_kelas" value="<?= $kelas['nama_kelas']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi</label>
                            <div class="col-sm-8">
                            <input type="text" name="deskripsi" class="form-control" id="deskripsi" value="<?= $kelas['deskripsi']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deskripsi" class="col-sm-4 col-form-label">Token</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="deskripsi" value="<?= $kelas['token']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deskripsi" class="col-sm-4 col-form-label">Dibuat</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="deskripsi" value="<?= date('d-M-Y',$kelas['date_create']) ?>" readonly>
                            </div>
                        </div>
                </div>
                <div class="col-md-1">
                        <button type="submit" class="btn btn-success btn-lg mb-3"><i class="far fa-fw fa-edit"></i></button>
                        <a  href="<?= base_url('aslab/hapusKelas/').$kelas['id']; ?>" class="btn btn-danger btn-lg mt-3" data-toggle="modal" data-target="#hapusModal"><i class="fas fa-fw fa-trash"></i></a>
                </div>
                </form>
            </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
        <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Hapus <?= $kelas['nama_kelas'];?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('aslab/hapusKelas/').$kelas['id']; ?>" class="btn btn-primary">Hapus</a>
                </div>
                </div>
            </div>
        </div>