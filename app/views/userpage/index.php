<?php
// var_dump($data);
$alamat = $data['alamat'];
$user = $data['user'];
?>
<main class="">
    <div class="container col-md-9">
        <div class="row mt-5">
            <div class="mb-5 me-3 shadow-lsm col-md-3 borderr3 border border-1 border-secondary pt-4 ">
                <div class="row my-4">
                    <div class="col-4 text-end">
                        <?php if ($user['foto_profil'] == '') : ?>
                            <img src="<?= BASEURL; ?>/img/profile.jpg" alt="" width="50px" height="50px" style="object-fit: cover;">
                        <?php else : ?>
                            <img src="<?= BASEURL; ?>/img/profile.jpg" alt="" width="50px" height="50px" style="object-fit: cover;">
                        <?php endif; ?>
                    </div>
                    <div class="col-8 align-self-center fw-bold"><?= $user['user_nama']; ?></div>
                </div>
                <div class="row justify-content-center mb-5">
                    <div class="col-10 ">
                        <p class="fw-bold">Pembelian</p>
                        <p class="m-0"><a href="" class="fw-light text-secondary text-decoration-none"></a>Menunggu</p>
                        <p class="m-0"><a href="" class="fw-light text-secondary text-decoration-none"></a>Daftar Transaksi</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 borderr2">
                <div class="row m-0">
                    <h1>Nama Pengguna</h1>
                </div>
                <div class="pb-4 row borderr2 border border-1 shadow-lsm border-secondary ">
                    <div class="col">
                        <div class="row justify-content-center">
                            <div class="col pt-2">
                                <div class="d-flex">
                                    <?php
                                    $s = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
                                    if ($s === "http://localhost/123190123-rarabakery/public/user/") :
                                    ?>
                                        <a href="http://localhost/123190123-rarabakery/public/user/" class="btn border-0 border-bottom border-3 border-warning text-warning">Biodata Diri</a>
                                        <a href="<?= BASEURL; ?>/user/alamat" class="btn border-0 border-3 border-warning text-secondary">Alamat</a>
                                    <?php
                                    else :
                                    ?>
                                        <a href="http://localhost/123190123-rarabakery/public/user/" class="btn border-0 border-3 border-warning text-secondary">Biodata Diri</a>
                                        <a href="<?= BASEURL; ?>/user/alamat" class="btn border-0 border-bottom border-3 border-warning text-warning">Alamat</a>
                                    <?php
                                    endif;
                                    ?>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="row justify-content-center">

                            <?php
                            if (isset($data['pg'])) {
                                if ($data['pg'] == 'alamat')
                                    include "editalamat.php";
                                else
                                    include "biodata.php";
                            }
                            ?>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</main>

<?php if (isset($data['pg'])) :
    if (strtolower($data['pg']) !== 'alamat') : ?>
        <div class="modal fade" id="editNamaModal" tabindex="-1" aria-labelledby="editNamaModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content borderr2">
                    <form action="">
                        <div class="modal-header border-0">
                            <h5 class="modal-title fw-bold" id="editNamaModalLabel">Ubah Nama</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row justify-content-center">
                                <div class="col d-grid">
                                    <label for="editnama" class="form-label">Nama</label>
                                    <input type="text" name="" class="form-control borderr2 shadow-sm border-2" id="editnama" placeholder="Your Name" value="">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0 justify-content-center">
                            <div class="col-md-4 d-grid">
                                <button type="button" class="btn btn-warning text-white fw-bold">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editEmailModal" tabindex="-1" aria-labelledby="editEmailModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content borderr2">
                    <form action="">
                        <div class="modal-header border-0">
                            <h5 class="modal-title fw-bold" id="editEmailModalLabel">Ubah Email</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row justify-content-center">
                                <div class="col d-grid">
                                    <label for="editemail" class="form-label">Email</label>
                                    <input type="email" name="" class="form-control borderr2 shadow-sm border-2" id="editemail" placeholder="yourmail@domain.com" value="">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0 justify-content-center">
                            <div class="col-md-4 d-grid">
                                <button type="button" class="btn btn-warning text-white fw-bold">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editTeleponModal" tabindex="-1" aria-labelledby="editTeleponModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content borderr2">
                    <form action="">
                        <div class="modal-header border-0">
                            <h5 class="modal-title fw-bold" id="editTeleponModalLabel">Ubah Telepon</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row justify-content-center">
                                <div class="col d-grid">
                                    <label for="edittelepon" class="form-label">Telepon</label>
                                    <input type="text" name="" class="form-control borderr2 shadow-sm border-2" id="edittelepon" placeholder="08xxx" value="">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0 justify-content-center">
                            <div class="col-md-4 d-grid">
                                <button type="button" class="btn btn-warning text-white fw-bold">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <?php else : ?>
        <div class="modal fade" id="editAlamatModal" tabindex="-1" aria-labelledby="editAlamatModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content borderr2">
                    <form action="" method="POST">
                        <div class="modal-header border-0 ">
                            <h5 class="modal-title fw-bold" id="editAlamatModalLabel"><?= $data['form-judul']; ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row justify-content-center">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label text-muted">Nama Penerima</label>
                                        <input type="text" class="form-control borderr2 border shadow-sm" id="nama" placeholder="Nama kamu" name="nama_penerima" autocomplete="off" value="<?= $alamat['nama_penerima']; ?>">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="telp" class="form-label text-muted">No. Telepon</label>
                                        <input type="number" class="form-control borderr2 border shadow-sm" id="telp" placeholder="08XXXXX" name="telp_penerima" value="<?= $alamat['telp_penerima']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="kota" class="form-label text-muted">Kota/Kecamatan</label>
                                        <input type="text" class="form-control borderr2 border shadow-sm" id="kota" placeholder="Nama Kota" name="kota" value="<?= $alamat['kota']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="kode_pos" class="form-label text-muted">Kode Pos</label>
                                        <input type="text" maxlength="6" class="form-control borderr2 border shadow-sm" id="kode_pos" name="kode_pos" placeholder="Kode Pos" value="<?= $alamat['kode_pos']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label text-muted">Alamat</label>
                                        <textarea name="alamat" class="form-control borderr2" id="alamat" placeholder="Alamat lengkap agar kami tidak tersesat" value="<?= $alamat['alamat']; ?>"><?= $alamat['alamat']; ?></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer border-0 justify-content-center">
                            <div class="col-md-4 d-grid">
                                <button type="submit" name="submitalamat" class="btn btn-warning text-white fw-bold">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php endif;
endif; ?>