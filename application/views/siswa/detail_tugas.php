<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Detail Tugas
                </div>
                <div class="card-body">
                    <div class="w-50">
                        <div class="row">
                            <div class="col-3">
                                Mata Pelajaran
                            </div>
                            <div class="col">
                                : <?= $tugas['matapelajaran']['nama'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Judul
                            </div>
                            <div class="col">
                                : <?= $tugas['tgs']['judul'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Jenis Tugas
                            </div>
                            <div class="col">
                                : <?= $tugas['tgs']['jenistugas'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Nama Tugas
                            </div>
                            <div class="col">
                                : <?= $tugas['detail']['nama']?>
                            </div>
                        </div>
                    </div>
                    <br>
                    <a href="<?= base_url(); ?>siswa/tugas" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>