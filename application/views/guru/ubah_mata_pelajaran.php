<div class="container">

    <div class="row mb-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Mata Pelajaran
                </div>
                <div class="card-body">
                    <form action="" method="post">

                        <div class="mb-3">
                            <label for="idkelas" class="form-label">Kelas</label>
                            <!-- <input type="text" name="idkelas" class="form-control" id="idkelas" value=""> -->
                            <select class="form-control" name="idkelas" id="idkelas" <?= $matapelajaran['idkelas']; ?>>
                                <?php foreach($kelas as $val){ ?>
                                    <option value="<?= $val['idkelas'] ?>" <?= $matapelajaran['idkelas']==$val['idkelas']?'selected':'' ?>><?= $val['namakelas'] ?></option>
                                <?php } ?>
                            </select>
                            <div class="form-text text-danger"><?= form_error('idkelas'); ?></div>
                        </div>

                        <div class="mb-3">
                            <label for="nama" class="form-label">Mata Pelajaran</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="<?= $matapelajaran['nama']; ?>">
                            <div class="form-text text-danger"><?= form_error('nama'); ?></div>
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="deskripsi" name="deskripsi" class="form-control" id="deskripsi" value="<?= $matapelajaran['deskripsi']; ?>">
                            <div class="form-text text-danger"><?= form_error('deskripsi'); ?></div>
                        </div>

                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data Mata Pelajaran</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>