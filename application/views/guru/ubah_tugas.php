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
                            <!-- <input type="text" name="idkelas" class="form-control" id="idkelas" value=""> -->
                            <select class="form-control" name="idkelas" id="idkelas" <?= $matapelajaran['idkelas']; ?>>
                                <?php foreach($kelas as $val){ ?>
                                    <option value="<?= $val['idkelas'] ?>" <?= $tugas['tgs']['idkelas']==$val['idkelas']?'selected':'' ?>><?= $val['namakelas'] ?></option>
                                <?php } ?>
                            </select>
                            <div class="form-text text-danger"><?= form_error('idkelas'); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="judul" class="form-label">Mata Pelajaran</label>
                            <select class="form-control" name="idmatapelajaran" id="idmatapelajaran">
                                <?php foreach($matapelajaran as $val){ ?>
                                    <!-- judul -->
                                    <option value="<?= $val['id'] ?>" <?= $tugas['matapelajaran']['id']==$val['id']?'selected':'' ?>><?= $val['nama'] ?></option>
                                <?php } ?>
                            </select>
                            <div class="form-text text-danger"><?= form_error('nama'); ?></div>
                        </div>

                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" name="judul" class="form-control" id="judul" value="<?= $tugas['tgs']['judul']; ?>">
                            <div class="form-text text-danger"><?= form_error('waktumulai'); ?></div>
                        </div>

                        <div class="mb-3">
                            <label for="jenistugas" class="form-label">Jenis Tugas</label>
                            <select class="form-control" name="jenistugas" id="jenistugas" value="<?= $tugas['tgs']['jenistugas']; ?>">
                                <option value="1">UTS</option>
                                <option value="2">UAS</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="nama_tugas" class="form-label">Nama Tugas</label>
                            <input type="text" name="nama_tugas" class="form-control" id="nama_tugas" value="<?= $tugas['detail']['nama_tugas']; ?>">
                            <div class="form-text text-danger"><?= form_error('nama_tugas'); ?></div>
                        </div>


                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data Tugas</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
