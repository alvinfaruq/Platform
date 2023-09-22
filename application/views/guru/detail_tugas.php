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
                                Kelas
                            </div>
                            <div class="col">
                            : <?= $tugas['namakelas']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Mata Pelajaran
                            </div>
                            <div class="col">
                                : <?= $tugas['nama'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Judul
                            </div>
                            <div class="col">
                                : <?= $tugas['judul'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Jenis Tugas
                            </div>
                            <div class="col">
                                : <?= $tugas['jenistugas'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Nama Tugas
                            </div>
                            <div class="col">
                                : <?= $tugas['nama_tugas']?>
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
                                            <th>Jawaban</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; foreach($jawaban as $j) { ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <?php ($j['jawaban']); ?>
                                                <td><?= $j["siswa"]->name ?></td>
                                                <td>
                                                    <?php foreach($j['jawaban'] as $jw) { ?>
                                                        <?= $jw['jawaban'] ?>
                                                    <?php } ?>
                                                </td>
                                                <td></td>
                                            </tr>
                                        <?php ++$i; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>  
                        <a href="<?= base_url(); ?>guru/tugas" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>