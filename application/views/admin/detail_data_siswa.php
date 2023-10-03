<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Detail Data Siswa
                </div>
                <div class="card-body">
                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-fluid rounded-start">
                    <div class="w-50">
                        <div class="row">
                            <div class="col-3">
                                Kelas
                            </div>
                            <div class="col">
                                : <?= $user['namakelas']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Nama
                            </div>
                            <div class="col">
                                : <?= $user['name'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                NISN
                            </div>
                            <div class="col">
                                : <?= $user['number'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Email
                            </div>
                            <div class="col">
                                : <?= $user['email'] ?></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Role
                            </div>
                            <div class="col">
                                : <?= $user['role_id']==1? 'Admin':($user['role_id']==2?'Guru':'Siswa'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Status
                            </div>
                            <div class="col">
                                : <?= $user['is_active']==1?'Aktif':'Tidak Aktif' ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Waktu Buat
                            </div>
                            <div class="col">
                                : <?= $user['date_created'] ?>
                            </div>
                        </div>
                    </div>
                    <br>
                    <a href="<?= base_url(); ?>admin/data_siswa" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>