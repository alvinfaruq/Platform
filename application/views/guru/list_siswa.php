<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
        
    <?php if( $this->session->flashdata('flash') ) : ?>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data siswa <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="row mt-3">
        <div class="col md-6">
            <a href="<?= base_url(); ?>guru/tambah_kelas" class="btn btn-primary">Daftar Siswa</a>
        </div>
    </div>

        
        <!-- /.container-fluid -->
        <!-- <div class="card shadow mb-4"> -->
        <div class="card shadow mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Kelas</h6>
            </div>
            <div class="card-body">
                <!-- <div class="card-body"> -->
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No. Induk</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach( $siswa as $s ): ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $s['number'] ?></td>
                                        <td><?= $s['name'] ?></td>
                                        <td><?= $s["kelas"] ? $s["kelas"]["namakelas"] : "Belum diatur" ?></td>
                                        <td>
                                            <a href="<?= base_url(); ?>guru/assignClass/<?= $s['id']; ?>" class="badge badge-success float right">Ubah Kelas</a>
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