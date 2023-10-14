<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Detail Livestream
                </div>
                <div class="card-body">
                    <div class="w-50">
                        <div class="row">
                            <div class="col-3">
                                Kelas
                            </div>
                            <div class="col">
                                : <?= $livestream['namakelas']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Mata Pelajaran
                            </div>
                            <div class="col">
                                : <?= $livestream['nama'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Waktu Mulai
                            </div>
                            <div class="col">
                                : <?= $livestream['waktumulai'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Waktu Selesai
                            </div>
                            <div class="col">
                                : <?= $livestream['waktuselesai'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Video
                            </div>
                            <div class="col-3">
                                : <?= $livestream['video'] ?>
                            </div>
                        </div>
                    </div>        
                    <!-- <iframe width="560" height="315" src="<?= $livestream['video'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->
                    <br>
                    <a href="<?= base_url(); ?>guru/livestream" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>