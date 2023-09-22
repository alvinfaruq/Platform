<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Detail Ujian
                </div>
                <div class="card-body">
                    <div class="w-50">
                        <div class="row">
                            <div class="col-3">
                                Kelas
                            </div>
                            <div class="col">
                            : <?= $ujian['idkelas']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Mata Pelajaran
                            </div>
                            <div class="col">
                                : <?= $mapel['nama'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Tanggal Ujian
                            </div>
                            <div class="col">
                                : <?= $ujian['tanggalujian'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Waktu Mulai
                            </div>
                            <div class="col">
                                : <?= $ujian['waktumulai'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Waktu Selesai
                            </div>
                            <div class="col">
                                : <?= $ujian['waktuselesai'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Jenis Ujian
                            </div>
                            <div class="col">
                                : <?= $ujian['jenisujian'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="card shadow mt-3">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Tabel Nilai</h6>
                            </div>
                        </div>
                        <div class="card-body shadow mb-3">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Siswa</th>
                                            <th>Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; foreach($nilai as $n) { ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $n["siswa"]["name"] ?></td>
                                                <td><?= number_format($n["nilai"], 2) ?></td>
                                            </tr>
                                        <?php ++$i; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a href="<?= base_url(); ?>guru/ujian" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>