<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Detail Mata Pelajaran
                </div>
                <div class="card-body">
                    <div class="w-50">
                        <div class="row">
                            <div class="col-3">
                                Kelas
                            </div>
                            <div class="col">
                                : <?= $matapelajaran['idkelas'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Mata Pelajaran
                            </div>
                            <div class="col">
                                : <?= $matapelajaran['nama'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Deskripsi
                            </div>
                            <div class="col">
                                : <?= $matapelajaran['deskripsi'] ?>
                            </div>
                        </div>
                    </div>
                    <br>
                    <a href="<?= base_url(); ?>guru/mata_pelajaran" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>