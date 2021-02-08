<div class="container">
    <div class="text-center mt-3">
        <a href="" class="text-center"><img src="<?= BASEURL; ?>/img/raralogo.jpg" alt="" class="raralogo"></a>
    </div>

    <div class="row mt-2">
        <div class="col-6">
            <div class="row">
                <img class="raralogo mx-auto" src="<?= BASEURL; ?>/img/raralogo2.jpg" alt="">
            </div>
            <div class="row text-center ">
                <h4><strong>Cari yang Kamu Butuh di Rara Bakery</strong></h4>
                <p>Gabung dan rasakan kemudahan membuat hari menjadi semakin spesial</p>
            </div>
        </div>
        <div class="col-6 ">
            <div class="card ms-5 col-6 mt-4 p-2 shadow-lsm border-light borderr1">
                <!-- Sebelum input email dan verifikasi kode -->
                <?php if (!isset($_SESSION['verif-success'])) : ?>
                    <div class="card-body text-center">
                        <h3>Daftar Sekarang</h3>
                        <p class="card-subtitle mb-2 text-muted">Sudah Punya akun? <a href="<?= BASEURL; ?>/login" class="text-warning text-decoration-none">Masuk</a></p>
                        <div>
                            <form id="register-form" action="<?= BASEURL; ?>/regist" method="POST">
                                <div class="mt-4 text-start has-validation">
                                    <label for="uid" class="form-label">Email</label>
                                    <input type="email" class="form-control borderr2" id="uid" placeholder="mail@domain.com" required>
                                    <p class="text-muted mt-2"><small id="errmsg">Contoh: mail@domain.com</small></p>
                                </div>
                                <div class="mt-4 d-grid gap-2">
                                    <!-- data-bs-toggle="modal" data-bs-target="#registConfirmModal" -->
                                    <button id="modal-trigger" type="button" class="btn borderr2 btn-warning text-white fs-5" onclick="getuid()"><strong>Daftar</strong></button>
                                </div>
                            </form>
                        </div>
                        <p class="text-muted mt-3 fs-7">
                            <small>
                                Dengan mendaftarkan diri, saya menyetujui
                                <a href="" class="text-warning text-decoration-none">syarat dan ketentuan</a> serta <a href="" class="text-warning text-decoration-none">kebijakan privasi</a>
                            </small>
                        </p>
                    </div>
                <?php elseif (isset($_SESSION['email'])) : ?>
                    <!-- setelah input email dan verifikasi kode -->
                    <div class="card-body text-center">
                        <p class="fw-bold text-start "><a href="" class="text-decoration-none text-dark"><i class="bi bi-arrow-left"></i> Daftar Dengan Email</a></p>
                        <div>
                            <form action="<?= BASEURL; ?>/register/regist" method="POST">
                                <input id="email-hidden" type="hidden" name="email" value="<?= $_SESSION['email']; ?>">
                                <div class="mt-4 text-start has-validation">
                                    <label for="name" class="form-label text-muted">Nama</label>
                                    <input type="text" name="name" class="form-control borderr2" id="name" placeholder="your name" required>
                                </div>
                                <div class="mt-4 text-start has-validation">
                                    <label for="password" class="form-label text-muted">Kata Sandi</label>
                                    <input type="password" name="password" class="form-control borderr2" id="password" required>
                                </div>
                                <div class="mt-4 d-grid gap-2">
                                    <button type="submit" class="btn borderr2 btn-warning text-white fs-5"><strong>Daftar</strong></button>
                                </div>
                            </form>
                        </div>
                        <p class="text-muted mt-3 fs-7">
                            <small>
                                Dengan mendaftarkan diri, saya menyetujui
                                <a href="" class="text-warning text-decoration-none">syarat dan ketentuan</a> serta <a href="" class="text-warning text-decoration-none">kebijakan privasi</a>
                            </small>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <hr class="mt-5">
    <p class="text-center"><small>Rara Bakery &copy;2020-2021</small></p>
</div>

<!-- modal -->
<div class="modal fade" id="registConfirmModal" tabindex="-1" aria-labelledby="registConfirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered ">
        <div class="modal-content borderr2 p-3 text-center text-wrap ">
            <h4 id="display-uid" class="text-dark text-break"></h4>
            <p>Apakah email yang kamu masukkan sudah benar?</p>
            <div class="row gap-2 mb-3">
                <div class="col d-grid">
                    <button type="button" class="btn btn-light btn-darklight borderr2" data-bs-dismiss="modal"><strong>Batal</strong></button>
                </div>
                <div class="col d-grid">
                    <button id="btn-submit-regis" type="button" class="btn btn-warning text-white borderr2" data-bs-dismiss="modal"><strong>Ya, benar</strong></button>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
include "master/footer.php";
?>