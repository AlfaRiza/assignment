<div class="container-fluid">

            <div class="d-sm-flex align-items-center justify-content-between mb-4"> 
                <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
            </div>

            <?= form_open_multipart('mahasiswa/edit'); ?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" style="width: 100%;">
                                <img class="card-img-top" src="<?= base_url('assets/img/profile/').$user['foto']; ?>" alt="Card image cap">
                        </div>
                        <div class="custom-file mt-4">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image"><?= $user['foto']; ?></label>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="nama" value="<?= $user['nama']; ?>">
                            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="text" class="form-control" id="nim" name="nim" value="<?= $user['nim']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= $user['jurusan']; ?>" readonly>
                        </div>
                        <div class="form-group">
                        <label for="jurusan">No Telpon</label>
                        <input type="text" class="form-control form-control-user" id="no_telp" name="no_telp" value="<?= $user['no_telp']; ?>">
                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                        <label for="jurusan">Alamat</label>
                        <input type="text" class="form-control"  id="alamat" name="alamat" value="<?= $user['alamat']; ?>" ></input>
                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group d-flex justify-content-end">
                            <div class="row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
    </div>
</div>