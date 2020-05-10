<div class="container-fluid">

            <div class="d-sm-flex align-items-center justify-content-between mb-4"> 
                <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
            </div>

            <?= form_open_multipart('aslab/tambahTugas/'.$id_kelas); ?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" style="width: 100%;">
                                <img class="card-img-top" src="<?= base_url('assets/img/tugas/default.jpg'); ?>" alt="Card image cap">
                        </div>
                        <div class="custom-file mt-4">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image"></label>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="title">Judul</label>
                            <input type="text" class="form-control" id="title" name="title">
                            <?= form_error('title', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <input type="text" class="form-control" id="description" name="description">
                            <?= form_error('description', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="bts_waktu">Tanggang Waktu</label>
                            <input type="datetime-local" class="form-control" id="bts_waktu" name="bts_waktu">
                            <?= form_error('bts_waktu', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group ">
                        <div class="custom-file">
                        <input type="file" class="custom-file-input" name="example" id="example">
                        <label class="custom-file-label" for="example">Example</label>
                        </div>
                        <?= form_error('example', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group d-flex justify-content-end">
                            <div class="row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
    </div>
</div>