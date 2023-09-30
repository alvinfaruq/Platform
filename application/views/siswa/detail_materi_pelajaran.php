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
                            <div class="col-2">
                                Kelas
                            </div>
                            <div class="col">
                            : <?= $materipelajaran['namakelas']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                Mata Pelajaran
                            </div>
                            <div class="col">
                                : <?= $materipelajaran['nama'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                Judul Materi
                            </div>
                            <div class="col">
                                : <?= $materipelajaran['judul'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                Materi
                            </div>
                            <div class="col">
                                : <?= $materipelajaran['materi']?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                Unggahan File Materi
                            </div>
                            <div class="col">
                                : <iframe width="100%" src="<?= base_url('upload_materi/').$materipelajaran['upload_materi'] ?>" height="500px"></iframe>
                            </div>
                        </div>
                    </div>
                    <br>
                    <a href="<?= base_url(); ?>siswa/materi_pelajaran" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>