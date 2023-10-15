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
                                <!-- : <iframe width="100%" src="<?= base_url('upload_tugas/').$tugas['upload_tugas'] ?>" height="500px"></iframe> -->
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
                                            <th>Opsi</th>
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
                                                <td><?= ($j['nilai']==0?'Belum Dinilai':$j['nilai']) ?></td>
                                                <td align="center">
                                                    <button type="button" class="btn btn-primary modalnilai" data-toggle="modal" data-id="<?= $j['id_jawaban_tugas'] ?>" data-idtugas="<?= $tugas['idtugas'] ?>" data-target="#nilai" >Beri Nilai</button>
                                                </td>
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

<!-- MODAL POP UP -->
<div class="modal" id="nilai" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Masukkan Nilai Tugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url(). 'Guru/simpanNilai'; ?>" method="post">
        <div class="modal-body">
            <input type="hidden" name="idtugas" class="form-control" id="idtugas">
            <input type="hidden" name="idjawaban" class="form-control" id="idjawaban">
            <input type="text" name="nilai" class="form-control" id="nilai">
        </div>
        <div class="modal-footer">
            <button type="submit" name="tambah" class="btn btn-primary float-right">Simpan Nilai</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
    $(document).on("click", ".modalnilai", function () {
        var idtugas = $(this).data('idtugas');
        var idjawaban = $(this).data('id');
        $(".modal-body #idtugas").val( idtugas );
        $(".modal-body #idjawaban").val( idjawaban );
    });
</script>
