<div class="container">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
        
    <?php if( $this->session->flashdata('flash') ) : ?>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Jawaban Tugas <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Unggah Jawaban Tugas
                </div>
                <div class="card-body">
				<?php echo form_open_multipart('');?>
                    <div class="w-100">
                        <!-- <form action="" method="post"> -->
                        
                                <div class="mb-3">
                                    <label for="upload_jawaban_tugas" class="form-label">Unggah Jawaban Tugas :</label>
                                    <input type="file" name="upload_jawaban_tugas" class="form-control" id="upload_jawaban_tugas">
                                    <div class="form-text text-danger"><?= form_error('upload_jawaban_tugas'); ?></div>
                                </div>
                            </div>
							<input type="hidden" name="up" value="1">
                            <a href="<?= base_url(); ?>siswa/tugas" class="btn btn-primary">Kembali</a>
                            <button type="submit" value="upload" class="btn btn-warning float-right">Submit</button>
							</form>
                        <!-- </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
