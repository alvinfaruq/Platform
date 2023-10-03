<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
        
        <!-- /.container-fluid -->
        <!-- <div class="card shadow mb-4"> -->
        <div class="card shadow mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Mata Pelajaran</h6>
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
                                    <!-- <th>Deskripsi Mata Pelajaran</th> -->
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach( $matapelajaran as $m ): ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $m['namakelas'] ?></td>
                                        <td><?= $m['nama'] ?></td>
                                        <!-- <td><?= $m['deskripsi'] ?></td> -->
                                        <td>
                                        <a href="<?= base_url(); ?>siswa/detail_mata_pelajaran/<?= $m['id']; ?>" class="badge badge-primary float right">Detail</a>
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