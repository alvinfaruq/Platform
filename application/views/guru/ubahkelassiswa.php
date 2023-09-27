<div class="container">

    <div class="row mb-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Kelas Siswa
                </div>
                <div class="card-body">
                    <form action="" method="post">
                    <div>
                            NISN: <?= $siswa['number'] ?>
                        </div>
                        <div>
                            Nama: <?= $siswa['name'] ?>
                        </div>
                        <div class="mb-3">
                            <label for="namakelas" class="form-label">Kelas</label>
                            <select name="idkelas">
                                <option>Pilih kelas</option>
                                <?php 
                                    foreach($kelas as $k) {
                                 ?>
                                    <option value="<?= $k['idkelas'] ?>"><?= $k['namakelas'] ?></option>
                                 <?php }  ?>
                            </select>
                            <div class="form-text text-danger"><?= form_error('idkelas'); ?></div>
                        </div>
                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data Siswa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>