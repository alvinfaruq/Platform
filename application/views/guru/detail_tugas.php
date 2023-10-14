<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Detail Tugas
                </div>
                <div class="card-body">
                    <div class="w-100">
                        <div class="row">
                            <div class="col-2">
                                Kelas
                            </div>
                            <div class="col">
                            : <?= $tugas['namakelas']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                Mata Pelajaran
                            </div>
                            <div class="col">
                                : <?= $tugas['nama'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                Judul Tugas
                            </div>
                            <div class="col">
                                : <?= $tugas['judul_tugas'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                Jenis Tugas
                            </div>
                            <div class="col">
                                : <?= $tugas['jenis_tugas'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                Deskripsi Tugas
                            </div>
                            <div class="col">
                                : <?= $tugas['deskripsi_tugas']?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                Unggahan File Tugas
                            </div>
                            <div class="col">
                                : <iframe width="100%" src="<?= base_url('upload_tugas/').$tugas['upload_tugas'] ?>" height="500px"></iframe>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="card shadow mt-3">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Tabel Penilaian Tugas</h6>
                            </div>
                        </div>

                        <div class="card-body shadow mb-3">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Siswa</th>
                                            <th>Jawaban Tugas</th>
                                            <th>Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; foreach($jawaban as $j) { ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <?php ($j); ?>
                                                <td><?= $j['name'] ?></td>
                                                <td>
                                                    <!-- <?php foreach($j['jawaban'] as $jw) { ?>
                                                        <?= $jw['jawaban'] ?>
                                                    <?php } ?> -->
                                                    <a href="<?= base_url('upload_jawaban_tugas/').$j['upload_jawaban_tugas'] ?>"><?= $j['upload_jawaban_tugas'] ?></a>
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
