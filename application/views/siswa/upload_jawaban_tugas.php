<div class="container">
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
                                    <label for="upload_jawaban_tugas" class="form-label">Unggah File Jawaban Tugas</label>
                                    <input type="file" name="upload_jawaban_tugas" class="form-control" id="upload_jawaban_tugas">
                                    <div class="form-text text-danger"><?= form_error('upload_jawaban_tugas'); ?></div>
                                </div>
                            </div>
							<input type="hidden" name="up" value="1">
                            <button type="submit" value="upload" class="btn btn-warning float-right">Submit</button>
							</form>
                            <br>
                            <br>
                            
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

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <a href="<?= base_url(); ?>siswa/tugas" class="btn btn-primary">Kembali</a>
                            </div>

                        <!-- </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
