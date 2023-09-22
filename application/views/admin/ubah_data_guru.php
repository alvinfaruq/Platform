<div class="container">

    <div class="row mb-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Data Guru
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="number" class="form-label">NIP</label>
                            <input type="number" name="number" class="form-control" id="number" value="<?= $user['number']; ?>">
                            <div class="form-text text-danger"><?= form_error('number'); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control" id="name" value="<?= $user['name']; ?>">
                            <div class="form-text text-danger"><?= form_error('name'); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" id="email" value="<?= $user['email']; ?>">
                            <div class="form-text text-danger"><?= form_error('email'); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="text" name="image" class="form-control" id="image" value="<?= $user['image']; ?>">
                            <div class="form-text text-danger"><?= form_error('image'); ?></div>
                        </div>
                        
                        
                        <div class="mb-3">
                            <label for="role_id" class="form-label">Role</label>
                            <select class="form-control" name="role_id" id="role_id">
                                
                                <?php foreach( $role as $r ) : ?>
                                    <?php if( $r == $user['role_id'] ) : ?>
                                        <option value="<?= $r; ?>" selected><?= $r == 1 ? "Admin" : ( $r == 2 ? "Guru" : "Siswa" ) ?></option>
                                    <?php else : ?>
                                        <option value="<?= $r; ?>"><?= $r == 1 ? "Admin" : ( $r == 2 ? "Guru" : "Siswa" ) ?></option>
                                    <?php endif; ?>
                                <?php endforeach ?>
                                
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="is_active" class="form-label">Status</label>
                            <select class="form-control" name="is_active" id="is_active">

                                <?php foreach( $status as $s ) : ?>
                                    <?php if( $s == $user['is_active'] ) : ?>
                                        <option value="<?= $s; ?>" selected><?= $s ==1?'Aktif':'Tidak Aktif' ?></option>
                                    <?php else : ?>
                                        <option value="<?= $s; ?>"><?= $s ==1?'Aktif':'Tidak Aktif' ?></option>
                                    <?php endif; ?>
                                <?php endforeach ?>

                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="date_created" class="form-label">Waktu Buat</label>
                            <input type="datetime-local" name="date_created" class="form-control" id="date_created" value="<?= $user['date_created']; ?>">
                            <div class="form-text text-danger"><?= form_error('date_created'); ?></div>
                        </div>
                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>