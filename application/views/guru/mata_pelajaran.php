<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
        
    <?php if( $this->session->flashdata('flash') ) : ?>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data mata pelajaran <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="row mt-3">
        <div class="col md-6">
            <a href="<?= base_url(); ?>guru/tambah_mata_pelajaran" class="btn btn-primary">Tambah Mata Pelajaran</a>
        </div>
    </div>

        
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
                                    <th>Deskripsi</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach( $matapelajaran as $m ): ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $m['namakelas'] ?></td>
                                        <td><?= $m['nama'] ?></td>
                                        <td><?= $m['deskripsi'] ?></td>
                                        <td>
                                            <a href="<?= base_url(); ?>guru/detail_mata_pelajaran/<?= $m['id']; ?>" class="badge badge-primary float right">Detail</a>
                                            <a href="<?= base_url(); ?>guru/ubah_mata_pelajaran/<?= $m['id']; ?>" class="badge badge-success float right">Ubah</a>
                                            <a href="<?= base_url(); ?>guru/hapus_mata_pelajaran/<?= $m['id']; ?>" class="badge badge-danger float right" onclick="return confirm('yakin?');">Hapus</a>
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