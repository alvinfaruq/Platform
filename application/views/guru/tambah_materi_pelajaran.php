<div class="container">

    <div class="row mb-3">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    Form Tambah Materi Pelajaran
                </div>
                <div class="card-body">
                    <!-- <form action="" method="post" > -->
                    <?php echo form_open_multipart('');?>
                        <div class="mb-3">
                            <label for="idkelas" class="form-label">Kelas</label>
                            <!-- <input type="number" name="idkelas" class="form-control" id="idkelas"> -->
                            <select class="form-control" name="idkelas" id="idkelas">
                                <?php foreach($kelas as $val){ ?>
                                    <option value="<?= $val['idkelas'] ?>"><?= $val['namakelas'] ?></option>
                                <?php } ?>
                            </select>
                            <div class="form-text text-danger"><?= form_error('idkelas'); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="idmatapelajaran" class="form-label">Mata Pelajaran</label>
                            <!-- <input type="number" name="idmatapelajaran" class="form-control" id="idmatapelajaran"> -->
                            <select class="form-control" name="idmatapelajaran" id="idmatapelajaran">
                                <?php foreach($matapelajaran as $val){ ?>

                                    <!-- <option value="<?= $val['id'] ?>"><?= $val['namakelas'] ?> - <?= $val['nama'] ?></option> -->
                                    <option value="<?= $val['id'] ?>"><?= $val['nama'] ?></option>

                                    <?php } ?>
                            </select>
                            <div class="form-text text-danger"><?= form_error('idmatapelajaran'); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Materi</label>
                            <input type="text" name="judul" class="form-control" id="judul">
                            <div class="form-text text-danger"><?= form_error('judul'); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="materi" class="form-label">Materi</label>
                            <!-- <input type="text" name="materi" class="form-control" id="materi"> -->
                            <textarea name="materi" id="materi" cols="30" rows="10"></textarea>
                            <div class="form-text text-danger"><?= form_error('materi'); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="upload_materi" class="form-label">Unggah File Materi</label>
                            <input type="file" name="upload_materi" class="form-control" id="upload_materi">
                            <div class="form-text text-danger"><?= form_error('upload_materi'); ?></div>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data Materi Pelajaran</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script type="text/javascript" src="<?= base_url('assets/ck/ckeditor.js'); ?>"></script> -->

<script type="text/javascript">
    CKEDITOR.replace( 'materi' );
    // CKEDITOR.replace('materi');
//     $(window).on('load', function (){
//     $( '#materi' ).ckeditor();
// });
// $('materi').ckeditor();
</script>


