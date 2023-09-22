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
                                Id Ujian
                            </div>
                            <div class="col">
                                : <?= $soal['soalujian']['idujian'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Jenis Soal
                            </div>
                            <div class="col">
                                : <?= $soal['soalujian']['jenissoal'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Soal
                            </div>
                            <div class="col">
                                : <?= $soal['soalujian']['soal'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Opsi 1
                            </div>
                            <div class="col">
                                : <?= $soal['detail']['opsi1']?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Opsi 2
                            </div>
                            <div class="col">
                                : <?= $soal['detail']['opsi2']?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Opsi 3
                            </div>
                            <div class="col">
                                : <?= $soal['detail']['opsi3']?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Opsi 4
                            </div>
                            <div class="col">
                                : <?= $soal['detail']['opsi4']?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Opsi Benar
                            </div>
                            <div class="col">
                                : <?= $soal['detail']['opsibenar']?>
                            </div>
                        </div>
                    </div>
                    <br>
                    <a href="<?= base_url(); ?>guru/soal/<?=$soal['soalujian']['idujian']  ?>" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>