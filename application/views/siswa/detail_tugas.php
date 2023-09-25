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
                            <div class="col-4">
                                Kelas
                            </div>
                            <div class="col">
                            : <?= $tugas['namakelas']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                Mata Pelajaran
                            </div>
                            <div class="col">
                                : <?= $tugas['nama'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                Judul Tugas
                            </div>
                            <div class="col">
                                : <?= $tugas['judul_tugas'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                Jenis Tugas
                            </div>
                            <div class="col">
                                : <?= $tugas['jenis_tugas'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                Deskripsi Tugas
                            </div>
                            <div class="col">
                                : <?= $tugas['deskripsi_tugas']?>
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