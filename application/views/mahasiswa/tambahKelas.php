
            <!-- Begin Page Content -->
            <div style="margin-top: -24px;">

            <!-- Page Heading -->
            <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Aslab</h1>
            </div> -->
            <div class="row">
                <div class="col-md-12">
                <div class="jumbotron jumbotron-fluid" style="background-image: url('<?= base_url('assets/img/class/').$kelas['image']; ?>'); background-size: 100%; background-attachment: fixed;height: 600px; text-shadow: rgba(0, 0, 0, 0.7);">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center">
                        <div class="card mb-3" style="max-width: 1000px;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                <img src="<?= base_url('assets/img/profile/').$aslab['foto']; ?>" class="card-img rounded-circle p-3" alt="...">
                                </div>
                                <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $kelas['nama_kelas']; ?></h5>
                                    <p class="card-text"><?= $aslab['nama'] ?></p>
                                    <p class="card-text"><small class="text-muted"><?= $kelas['deskripsi']; ?></small></p>
                                    <div class="row">
                                        <form action="" method="post">
                                        <div class="form-group col-md-12">
                                            <label for="token">Token</label>
                                            <input type="text" class="form-control" name="token" id="token" placeholder="Masukkan Token">
                                            <small id="emailHelp" class="form-text text-muted">Tanya aslab bersangkutan terkait token</small>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        </form>
                                    </div>
                                    
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

