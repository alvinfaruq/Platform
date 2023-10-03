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
            <a href="<?= base_url(); ?>admin/tambah_data_siswa" class="btn btn-primary">Tambah Data Siswa</a>
        </div>
    </div>

        
        <!-- /.container-fluid -->
        <!-- <div class="card shadow mb-4"> -->
        <div class="card shadow mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Siswa</h6>
            </div>
            <div class="card-body">
                <!-- <div class="card-body"> -->
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kelas</th>
                                    <th>NISN</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Waktu Buat</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach( $user as $u ): ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $u['namakelas'] ?></td>
                                        <td><?= $u['number'] ?></td>
                                        <td><?= $u['name'] ?></td>
                                        <td><?= $u['email'] ?></td>
                                        <td><?= $u['role_id']==1? 'Admin':($u['role_id']==2?'Guru':'Siswa') ?></td>
                                        <td><?= $u['is_active']==1?'Aktif':'Tidak Aktif' ?></td>
                                        <td><?= $u['date_created'] ?></td>
                                        <!-- <td><input type="button" value="Detail"></td> -->
                                        <td>
                                            <a href="<?= base_url(); ?>admin/detail_data_siswa/<?= $u['id']; ?>" class="badge badge-primary float right">Detail</a>
                                            <a href="<?= base_url(); ?>admin/ubah_data_siswa/<?= $u['id']; ?>" class="badge badge-success float right">Ubah</a>
                                            <a href="<?= base_url(); ?>admin/hapus_data_siswa/<?= $u['id']; ?>" class="badge badge-danger float right" onclick="return confirm('yakin?');">Hapus</a>
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