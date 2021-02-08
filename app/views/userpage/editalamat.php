<div class="col-11">
    <div class="row mb-3">
        <div class="col">
            <?php if (strtolower($data['form-judul']) == 'tambah') : ?>
                <button type="button" class="btn btn-success borderr2 text-white fw-bold" data-bs-toggle="modal" data-bs-target="#editAlamatModal">Tambah Alamat</button>
            <?php endif; ?>
        </div>
    </div>
    <div class="row mb-3 border-bottom fs-6 pb-2 border-2 border-secondary">
        <div class="col-3">Penerima</div>
        <div class="col-4">Alamat</div>
        <div class="col-5">Daerah</div>
    </div>

    <?php if (isset($alamat)) : ?>
        <div class="row fw-light">
            <div class="col-3">
                <p class="fw-bold m-0"><small><?= $alamat['nama_penerima']; ?></small></p>
                <p class="m-0"><small><?= $alamat['telp_penerima']; ?></small></p>
            </div>
            <div class="col-4">
                <p><?= $alamat['alamat']; ?></p>
            </div>
            <div class="col-5">
                <div class="row">
                    <div class="col-md-8">
                        <p><?= $alamat['kota']; ?>,<?= $alamat['kode_pos']; ?>
                        </p>
                    </div>
                    <?php if (strtolower($data['form-judul']) == 'edit') : ?>
                        <div class="col-md-4">
                            <button class="btn btn-outline-warning text-warning" data-bs-toggle="modal" data-bs-target="#editAlamatModal">
                                Ubah
                            </button>
                        </div>
                    <?php endif; ?>
                </div>


            </div>
        </div>
    <?php endif; ?>
</div>