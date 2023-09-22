<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Detail Soal
                </div>
                <div class="card-body">
                    <div class="w-50">
                        <div class="row">
                            <div class="col-3">
                                Id Tugas
                            </div>
                            <div class="col">
                                : <?= $soaltugas['soalujian']['idtugas'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Jenis Soal
                            </div>
                            <div class="col">
                                : <?= $soaltugas['soalujian']['jenissoal'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Soal
                            </div>
                            <div class="col">
                                : <?= $soaltugas['soalujian']['soal'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Opsi 1
                            </div>
                            <div class="col">
                                : <?= $soaltugas['detail']['opsi1']?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Opsi 2
                            </div>
                            <div class="col">
                                : <?= $soaltugas['detail']['opsi2']?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Opsi 3
                            </div>
                            <div class="col">
                                : <?= $soaltugas['detail']['opsi3']?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Opsi 4
                            </div>
                            <div class="col">
                                : <?= $soaltugas['detail']['opsi4']?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Opsi Benar
                            </div>
                            <div class="col">
                                : <?= $soaltugas['detail']['opsibenar']?>
                            </div>
                        </div>
                    </div>
                    <br>
                    <a href="<?= base_url(); ?>guru/soaltugas/<?=$soaltugas['soalujian']['idtugas']  ?>" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>