<div class="container">

    <div class="row mb-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Livestream
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3" style="display: none;">
                            <label for="idmatapelajaran" class="form-label">Mata Pelajaran</label>
                            <input type="number" name="idmatapelajaran" class="form-control" id="idmatapelajaran" value="<?= $livestream['id']; ?>">
                            <div class="form-text text-danger"><?= form_error('idmatapelajaran'); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="waktumulai" class="form-label">Waktu Mulai</label>
                            <input type="datetime-local" name="waktumulai" class="form-control" id="waktumulai" value="<?= $livestream['waktumulai']; ?>">
                            <div class="form-text text-danger"><?= form_error('waktumulai'); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="waktuselesai" class="form-label">Waktu Selesai</label>
                            <input type="datetime-local" name="waktuselesai" class="form-control" id="waktuselesai" value="<?= $livestream['waktuselesai']; ?>">
                            <div class="form-text text-danger"><?= form_error('waktuselesai'); ?></div>
                        </div>
                        <div class="mb-3" style="display: none;">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" name="judul" class="form-control" id="judul" value="<?= $livestream['judul']; ?>">
                            <div class="form-text text-danger"><?= form_error('judul'); ?></div>
                        </div>
                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data Livestream</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>