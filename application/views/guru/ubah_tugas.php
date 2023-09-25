<div class="container">

    <div class="row mb-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Tugas
                </div>
                <div class="card-body">

                    <form action="" method="post">

                        <div class="mb-3" style="display: none;">
                            <label for="idmatapelajaran" class="form-label">Mata Pelajaran</label>
                            <input type="number" name="idmatapelajaran" class="form-control" id="idmatapelajaran" value="<?= $tugas['tgs']['idmatapelajaran']; ?>">
                            <div class="form-text text-danger"><?= form_error('idmatapelajaran'); ?></div>
                        </div>

                        <div class="mb-3">
                            <label for="idkelas" class="form-label">Kelas</label>
                            <select class="form-control" name="idkelas" id="idkelas" <?= $matapelajaran['idkelas']; ?>>
                                <?php foreach($kelas as $val){ ?>
                                    <option value="<?= $val['idkelas'] ?>" <?= $tugas['tgs']['idkelas']==$val['idkelas']?'selected':'' ?>><?= $val['namakelas'] ?></option>
                                <?php } ?>
                            </select>
                            <div class="form-text text-danger"><?= form_error('idkelas'); ?></div>
                        </div>

                        <div class="mb-3">
                            <label for="idmatapelajaran" class="form-label">Mata Pelajaran</label>
                            <select class="form-control" name="idmatapelajaran" id="idmatapelajaran">
                                <?php foreach($matapelajaran as $val){ ?>
                                    <option value="<?= $val['id'] ?>" <?= $tugas['matapelajaran']['id']==$val['id']?'selected':'' ?>><?= $val['nama'] ?></option>
                                <?php } ?>
                            </select>
                            <div class="form-text text-danger"><?= form_error('nama'); ?></div>
                        </div>

                        <div class="mb-3">
                            <label for="judul_tugas" class="form-label">Judul Tugas</label>
                            <input type="text" name="judul_tugas" class="form-control" id="judul_tugas" value="<?= $tugas['tgs']['judul_tugas']; ?>">
                            <div class="form-text text-danger"><?= form_error('judul_tugas'); ?></div>
                        </div>

                        <div class="mb-3">
                            <label for="jenis_tugas" class="form-label">Jenis Tugas</label>
                            <select class="form-control" name="jenis_tugas" id="jenis_tugas" value="<?= $tugas['tgs']['jenis_tugas']; ?>">
                                <option value="1">UTS</option>
                                <option value="2">UAS</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi_tugas" class="form-label">Deskripsi Tugas</label>
                            <input type="text" name="deskripsi_tugas" class="form-control" id="deskripsi_tugas" value="<?= $tugas['detail']['deskripsi_tugas']; ?>">
                            <div class="form-text text-danger"><?= form_error('deskripsi_tugas'); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="upload_tugas" class="form-label">Upload Tugas</label>
                            <iframe src="<?= base_url('upload_tugas/').$tugas["detail"]['upload_tugas'] ?>" height="500px" width="800px"></iframe>
                            <input type="file" name="upload_tugas" class="form-control" id="upload_tugas">
                            <div class="form-text text-danger"><?= form_error('upload_tugas'); ?></div>
                        </div>
                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data Tugas</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
