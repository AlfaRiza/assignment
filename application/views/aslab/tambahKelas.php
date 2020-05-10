<div class="container-fluid">

            <div class="d-sm-flex align-items-center justify-content-between mb-4"> 
                <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
            </div>

            <?= form_open_multipart(''); ?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" style="width: 100%;">
                                <img class="card-img-top" src="<?= base_url('assets/img/class/default.jpg') ?>" alt="Card image cap">
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image"></label>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="class_name">Nama Kelas</label>
                            <input type="text" class="form-control" id="class_name" name="class_name" value="<?= set_value('class_name'); ?>">
                            <?= form_error('class_name', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <input type="text" class="form-control" id="description" name="description" value="<?= set_value('description'); ?>">
                            <?= form_error('description', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <?php 
                        $str = "";
                        $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
                        $max = count($characters) - 1;
                        for ($i = 0; $i < 4; $i++) {
                            $rand = mt_rand(0, $max);
                            $str  .= $characters[$rand];
                        }
                        ?>
                        <div class="form-group">
                            <label for="token">Token</label>
                            <input type="text" class="form-control" id="token" name="token" value="<?= $str; ?>" readonly>
                            <?= form_error('token', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        
                        <div class="form-group d-flex justify-content-end">
                            <div class="row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-plus"></i> Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
    </div>
</div>