<div class="container">

    <div class="row mb-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Ujian
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3"  style='display:none'>
                            <label for="idmatapelajaran" class="form-label">Mata Pelajaran</label>
                            <input type="number" name="idmatapelajaran" class="form-control" id="idmatapelajaran" value="<?= $ujian['idmatapelajaran']; ?>">
                            <div class="form-text text-danger"><?= form_error('idmatapelajaran'); ?></div>
                        </div>

                        <div class="mb-3">
                            <label for="idkelas" class="form-label">Kelas</label>
                            <!-- <input type="text" name="idkelas" class="form-control" id="idkelas" value=""> -->
                            <select class="form-control" name="idkelas" id="idkelas" <?= $matapelajaran['idkelas']; ?>>
                                <?php foreach($kelas as $val){ ?>
                                    <option value="<?= $val['idkelas'] ?>" <?= $ujian['idkelas']==$val['idkelas']?'selected':'' ?>><?= $val['namakelas'] ?></option>
                                <?php } ?>
                            </select>
                            <div class="form-text text-danger"><?= form_error('idkelas'); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="judul" class="form-label">Mata Pelajaran</label>
                            <select class="form-control" name="idmatapelajaran" id="idmatapelajaran">
                                <?php foreach($matapelajaran as $val){ ?>
                                    <!-- judul -->
                                    <option value="<?= $val['id'] ?>" <?= $ujian['id_ujian']==$val['id']?'selected':'' ?>><?= $val['nama'] ?></option>
                                <?php } ?>
                            </select>
                            <div class="form-text text-danger"><?= form_error('nama'); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="tanggalujian" class="form-label">Tanggal Ujian</label>
                            <input type="date" name="tanggalujian" class="form-control" id="tanggalujian" value="<?= $ujian['tanggalujian']; ?>">
                            <div class="form-text text-danger"><?= form_error('tanggalujian'); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="waktumulai" class="form-label">Waktu Mulai</label>
                            <input type="datetime-local" name="waktumulai" class="form-control" id="waktumulai" value="<?= $ujian['waktumulai']; ?>">
                            <div class="form-text text-danger"><?= form_error('waktumulai'); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="waktuselesai" class="form-label">Waktu Selesai</label>
                            <input type="datetime-local" name="waktuselesai" class="form-control" id="waktuselesai" value="<?= $ujian['waktuselesai']; ?>">
                            <div class="form-text text-danger"><?= form_error('waktuselesai'); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="jenisujian" class="form-label">Jenis Ujian</label>
                            <select class="form-control" name="jenisujian" id="jenisujian" value="<?= $ujian['jenisujian']; ?>">
                            <option value="1">UTS</option>
                            <option value="2">UAS</option>
                            </select>
                        </div>
                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data Ujian</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>