<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Detail Materi Pelajaran
                </div>
                <div class="card-body">
                    <div class="w-100">
                        <div class="row">
                            <div class="col-3">
                                Kelas
                            </div>
                            <div class="col">
                            : <?= $materipelajaran['namakelas']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Mata Pelajaran
                            </div>
                            <div class="col">
                                : <?= $materipelajaran['nama'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Judul Materi
                            </div>
                            <div class="col">
                                : <?= $materipelajaran['judul'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Materi
                            </div>
                            <div class="col">
                                : <?= $materipelajaran['materi']?>
                            </div>
                        </div>
                    </div>
                    <br>
                    <a href="<?= base_url(); ?>guru/materi_pelajaran" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>