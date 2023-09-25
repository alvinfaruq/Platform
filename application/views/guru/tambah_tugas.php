<div class="container">

    <div class="row mb-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Tambah Tugas
                </div>
                <div class="card-body">
                    <!-- <form action="" method="post"> -->
                    <?php echo form_open_multipart('');?>
                        <div class="mb-3">
                            <label for="idkelas" class="form-label">Kelas</label>
                            <!-- <input type="number" name="idkelas" class="form-control" id="idkelas"> -->
                            <select class="form-control" name="idkelas" id="idkelas">
                                <?php foreach($kelas as $val){ ?>
                                    <option value="<?= $val['idkelas'] ?>"><?= $val['namakelas'] ?></option>
                                <?php } ?>
                            </select>
                            <div class="form-text text-danger"><?= form_error('idkelas'); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="idmatapelajaran" class="form-label">Mata Pelajaran</label>
                            <!-- <input type="number" name="idmatapelajaran" class="form-control" id="idmatapelajaran"> -->
                            <select class="form-control" name="idmatapelajaran" id="idmatapelajaran">
                                <?php foreach($matapelajaran as $val){ ?>
                                    <option value="<?= $val['id'] ?>"><?= $val['nama'] ?></option>
                                <?php } ?>
                            </select>
                            <div class="form-text text-danger"><?= form_error('idmatapelajaran'); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="judul_tugas" class="form-label">Judul Tugas</label>
                            <input type="text" name="judul_tugas" class="form-control" id="judul_tugas">
                            <div class="form-text text-danger"><?= form_error('judul_tugas'); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_tugas" class="form-label">Jenis Tugas</label>
                            <select class="form-control" name="jenis_tugas" id="jenis_tugas">
                                <option value="1">UTS</option>
                                <option value="2">UAS</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi_tugas" class="form-label">Deskripsi Tugas</label>
                            <input type="text" name="deskripsi_tugas" class="form-control" id="deskripsi_tugas">
                            <div class="form-text text-danger"><?= form_error('deskripsi_tugas'); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="upload_tugas" class="form-label">Upload Tugas</label>
                            <input type="file" name="upload_tugas" class="form-control" id="upload_tugas">
                            <div class="form-text text-danger"><?= form_error('upload_tugas'); ?></div>
                        </div> 
                               
                        <button type="submit" value="upload" class="btn btn-primary float-right">Tambah Data Tugas</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>