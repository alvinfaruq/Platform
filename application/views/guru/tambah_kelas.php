<div class="container">
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Tambah Kelas
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="namakelas" class="form-label">Kelas</label>
                            <input type="text" name="namakelas" class="form-control" id="namakelas">
                            <div class="form-text text-danger"><?= form_error('namakelas'); ?></div>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Kelas</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>