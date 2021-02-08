<div class="col-md-4">
    <div class="card bg-light">
        <div class="card-body">
            <?php if (is_null($user['foto_profil']) || $user['foto_profil'] == '') : ?>
                <img class="mb-3" src="<?= BASEURL; ?>/img/profile.jpg" alt="" width="100%">
            <?php else : ?>
                <img class="mb-3" src="<?= $user['foto_profil']; ?>" alt="" width="100%">
            <?php endif; ?>
            <div class="col">
                <div class="mb-3">
                    <input class="form-control form-control-sm" type="file" id="formFile">
                </div>
            </div>
            <div class="col">
                <p class="fw-light text-secondary lh-1"><small>Besar Maksimum adalah 5MB. Format yang didukung: .jpg, .png, .jpeg</small></p>
            </div>
        </div>
    </div>
</div>
<div class="col-md-8 p-4 p-md-2">
    <h5 class="fw-bold">Ubah Biodata Diri</h5>
    <div class="row text-secondary fw-light">
        <div class="col-4 mt-2">Nama</div>
        <div class="col mt-2"><?= $user['user_nama']; ?></div>
        <div class="col mt-2"><a href="" class="text-decoration-none text-warning" data-bs-toggle="modal" data-bs-target="#editNamaModal">Ubah</a></div>
    </div>
    <div class="row text-secondary fw-light">
        <div class="col-4 mt-2">Tanggal Lahir</div>
        <div class="col mt-2"><?= $user['tgl_lahir']; ?></div>
    </div>
    <div class="row text-secondary fw-light">
        <div class="col-4 mt-2">Jenis Kelamin</div>
        <div class="col mt-2"><?= $user['jk_name']; ?></div>
    </div>

    <h5 class="fw-bold mt-3">Ubah Kontak</h5>
    <div class="row text-secondary fw-light">
        <div class="col-4 mt-2">Email</div>
        <div class="col mt-2"><?= $user['email']; ?></div>
        <div class="col mt-2"><a href="" class="text-decoration-none text-warning" data-bs-toggle="modal" data-bs-target="#editEmailModal">Ubah</a></div>
    </div>
    <div class="row text-secondary fw-light">
        <div class="col-4 mt-2">No Hp</div>
        <div class="col mt-2"><?= $user['telp']; ?></div>
        <div class="col mt-2"><a href="" class="text-decoration-none text-warning" data-bs-toggle="modal" data-bs-target="#editTeleponModal">Ubah</a></div>
    </div>
</div>