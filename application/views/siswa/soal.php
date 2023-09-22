<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
        
    <!-- /.container-fluid -->
    <!-- <div class="card shadow mb-4"> -->
    <div class="card shadow mt-3">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Soal</h6>
        </div>
        <div class="card-body">
            <!-- <div class="card-body"> -->
            <div class="table-responsive"> 
                <form action='<?= base_url("/siswa/submitAnswer/".$soal['idujian']."/".$soal['nomor']) ?>' method="post">
                    <div class="d-flex flex-row">
                        <div class="d-flex flex-row flex-wrap h-25" style="width:180px">
                            <?php for($i = 0; $i < count($all_soal); ++$i) { ?>
                                <a class="px-2 py-1 border-primary border rounded ml-1 mb-1 d-flex justify-content-center" style="width: 32px;" href="<?= '/platform/siswa/soal/'.$soal['idujian'].'/'.($i+1) ?>"><?= $i+1 ?></a>
                            <?php } ?>
                        </div>
                        <div class="px-3">
                            <b>No. <?= $soal['nomor']; ?></b>
                            <p class="px-2"><?= $soal['soal']; ?></p>
                            </br>
                            <div class="d-flex flex-column justify-content-start align-items-start">
                                <span>Jawaban</span>
                                <?php if($soal['jenissoal'] !== 'Esai') { ?>
                                    <div>
                                        <input type="radio" name="jawaban" value="opsi1" id="opsi1" <?php if($jawaban == 'opsi1') echo "checked"; ?>>
                                        <label for="opsi1"><?= $soal['detail'][0]['opsi1']; ?></label>
                                    </div>
                                    <div>
                                        <input type="radio" name="jawaban" value="opsi2" id="opsi2" <?php if($jawaban == 'opsi2') echo "checked"; ?>>
                                        <label for="opsi2"><?= $soal['detail'][0]['opsi2']; ?></label>
                                    </div>
                                    <div>
                                        <input type="radio" name="jawaban" value="opsi3" id="opsi3" <?php if($jawaban == 'opsi3') echo "checked"; ?>>
                                        <label for="opsi3"><?= $soal['detail'][0]['opsi3']; ?></label>
                                    </div>
                                    <div>
                                        <input type="radio" name="jawaban" value="opsi4" id="opsi4" <?php if($jawaban == 'opsi4') echo "checked"; ?>>
                                        <label for="opsi4"><?= $soal['detail'][0]['opsi4']; ?></label>
                                    </div>
                                <?php } else {  ?>
                                    <div>
                                        <textarea name="jawaban" id="jawaban"><?php if($jawaban) echo $jawaban; ?></textarea>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <br>
                <button type="submit" name="submit" class="btn btn-primary float-right">Kirim Jawaban</button>
                </form>
            </div>
            <!-- </div> -->
        </div>
    </div>

</div>
<!-- End of Main Content -->
