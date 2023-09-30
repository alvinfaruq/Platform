<div class="container">

    <div class="row mb-3">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    Form Ubah Materi Pelajaran
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="idkelas" class="form-label">Kelas</label>
                            <!-- <input type="text" name="idkelas" class="form-control" id="idkelas" value=""> -->
                            <select class="form-control" name="idkelas" id="idkelas" <?= $materipelajaran['idkelas']; ?>>
                                <?php foreach($kelas as $val){ ?>
                                    <option value="<?= $val['idkelas'] ?>" <?= $materipelajaran['idkelas']==$val['idkelas']?'selected':'' ?>><?= $val['namakelas'] ?></option>
                                <?php } ?>
                            </select>
                            <div class="form-text text-danger"><?= form_error('idkelas'); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="judul" class="form-label">Mata Pelajaran</label>
                            <select class="form-control" name="idmatapelajaran" id="idmatapelajaran">
                                <?php foreach($matapelajaran as $val){ ?>
                                    <!-- judul -->
                                    <option value="<?= $val['id'] ?>" <?= $materipelajaran['id']==$val['id']?'selected':'' ?>><?= $val['nama'] ?></option>
                                <?php } ?>
                            </select>
                            <div class="form-text text-danger"><?= form_error('nama'); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Materi</label>
                            <input type="text" name="judul" class="form-control" id="judul" value="<?= $materipelajaran['judul']; ?>">
                            <div class="form-text text-danger"><?= form_error('judul'); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="materi" class="form-label">Materi</label>
                            <!-- <input type="text" name="materi" class="form-control" id="materi" value="<?= $materipelajaran['materi']; ?>"> -->
                            <textarea name="materi1" class="form-control" id="materi1" cols="30" rows="10"><?= $materipelajaran['materi']; ?>"</textarea>
                            <div class="form-text text-danger"><?= form_error('materi'); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="upload_materi" class="form-label">Unggah File Materi</label>
                            <iframe width="100%" src="<?= base_url('upload_materi/').$materipelajaran['upload_materi'] ?>" height="500px" width="400px"></iframe>
                            <input type="file" name="upload_materi" class="form-control" id="upload_materi">
                            <div class="form-text text-danger"><?= form_error('upload_materi'); ?></div>
                        </div>
                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data Materi Pelajaran</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script type="text/javascript" src="<?= base_url('assets/ck/ckeditor.js'); ?>"></script> -->

<script type="text/javascript">
    CKEDITOR.replace( 'materi1' );
    // CKEDITOR.replace('materi');
//     $(window).on('load', function (){
//     $( '#materi' ).ckeditor();
// });
// $('materi').ckeditor();
</script>