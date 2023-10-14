<div class="container">

    <div class="row mb-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Soal Tugas
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        
                        <input type="hidden" name="idtugas" class="form-control" id="idtugas" value="<?= $soaltugas['soalujian']['idtugas']; ?>">
                        <div class="mb-3">
                            <label for="soal" class="form-label">Jenis Soal</label>
                            <select name="jenissoal" id="jenissoal" class="form-control" onchange="jenischange()" value="<?= $soaltugas['soalujian']['jenissoal']; ?>">
                                <option value="Pilihan Ganda">Pilihan Ganda</option>
                                <option value="Esai">Esai</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="soal" class="form-label">Soal</label>
                            <input type="text" name="soal" class="form-control" id="soal" value="<?= $soaltugas['soalujian']['soal']; ?>">
                            <div class="form-text text-danger"><?= form_error('soal'); ?></div>
                        </div>
                        
                        <div id="pilgan">
                            <div class="mb-3">
                                <label for="opsi1" class="form-label">Opsi 1</label>
                                <input type="text" name="opsi1" class="form-control" id="opsi1" value="<?= $soaltugas['detail']['opsi1']; ?>">
                                <div class="form-text text-danger"><?= form_error('opsi1'); ?></div>
                            </div>
                            <div class="mb-3">
                                <label for="opsi2" class="form-label">Opsi 2</label>
                                <input type="text" name="opsi2" class="form-control" id="opsi2" value="<?= $soaltugas['detail']['opsi2']; ?>">
                                <div class="form-text text-danger"><?= form_error('opsi2'); ?></div>
                            </div>
                            <div class="mb-3">
                                <label for="opsi3" class="form-label">Opsi 3</label>
                                <input type="text" name="opsi3" class="form-control" id="opsi3" value="<?= $soaltugas['detail']['opsi3']; ?>">
                                <div class="form-text text-danger"><?= form_error('opsi3'); ?></div>
                            </div>
                            <div class="mb-3">
                                <label for="opsi4" class="form-label">Opsi 4</label>
                                <input type="text" name="opsi4" class="form-control" id="opsi4" value="<?= $soaltugas['detail']['opsi4']; ?>">
                                <div class="form-text text-danger"><?= form_error('opsi4'); ?></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="opsibenar" class="form-label">Opsi Benar</label>
                            <input type="text" name="opsibenar" class="form-control" id="opsibenar" value="<?= $soaltugas['detail']['opsibenar']; ?>">
                            <div class="form-text text-danger"><?= form_error('opsibenar'); ?></div>
                        </div>
                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data Soal Tugas</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let option = document.querySelector('#jenissoal')
    let choice = document.querySelector('#pilgan')

    function jenischange() {
        console.log(option.value)
        if(option.value !== "Pilihan Ganda") {
            choice.classList.add("d-none")
        } else {
            choice.classList.remove("d-none")
        }
    }
</script>