<div class="container">

    <div class="row mb-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Tambah Tugas
                </div>
                <div class="card-body">
                    <form action="" method="post">
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
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" name="judul" class="form-control" id="judul">
                            <div class="form-text text-danger"><?= form_error('judul'); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="jenistugas" class="form-label">Jenis Tugas</label>
                            <select class="form-control" name="jenistugas" id="jenistugas">
                                <option value="1">UTS</option>
                                <option value="2">UAS</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama_tugas" class="form-label">Nama Tugas</label>
                            <input type="text" name="nama_tugas" class="form-control" id="nama_tugas">
                            <div class="form-text text-danger"><?= form_error('nama_tugas'); ?></div>
                        </div> 
                               
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data Tugas</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>