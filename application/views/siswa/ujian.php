<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
                
        <!-- /.container-fluid -->
        <!-- <div class="card shadow mb-4"> -->
        <div class="card shadow mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Ujian</h6>
            </div>
            <div class="card-body">
                <!-- <div class="card-body"> -->
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kelas</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Tanggal Ujian</th>
                                    <th>Waktu Mulai</th>
                                    <th>Waktu Selesai</th>
                                    <th>Jenis Ujian</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach( $ujian as $u ): ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $u['namakelas'] ?></td>
                                        <td><?= $u['nama'] ?></td>
                                        <td><?= $u['tanggalujian'] ?></td>
                                        <td><?= $u['waktumulai'] ?></td>
                                        <td><?= $u['waktuselesai'] ?></td>
                                        <td><?= $u['jenisujian'] ?></td>
                                        <td>
                                            <a href="<?= base_url(); ?>siswa/detail_ujian/<?= $u['id_ujian']; ?>" class="badge badge-primary float right">Detail</a>
                                            <?php 
                                                date_default_timezone_set('Asia/Jakarta');
                                                // echo time() > strtotime($u['waktumulai']) ? "true" : date('Y-m-d H:i:s', time());
                                                if(time() > strtotime($u['waktumulai']) && time() < strtotime($u['waktuselesai'])) {
                                            ?>
                                                <a href="<?= base_url(); ?>siswa/soal/<?= $u['id_ujian']; ?>" class="badge badge-warning float right">Soal</a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <!-- </div> -->

            </div>
        </div>

</div>
<!-- End of Main Content -->