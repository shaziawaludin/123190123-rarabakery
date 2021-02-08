<div class="logincontainer loginbg">
    <div class="container">
        <div class="text-center pt-5">
            <a href="<?= BASEURL; ?>/home" class="text-center"><img src="<?= BASEURL; ?>/img/raralogo.jpg" alt="" class="raralogo"></a>
        </div>
        <div class="row justify-content-center mt-3 mb-5">
            <div class="col-sm-3">
                <div class="card shadow-sm border-light borderr1">
                    <div class="card-body">
                        <p class="fw-bold">Masuk</p>
                        <form action="<?= BASEURL; ?>/login/loginVerify" method="POST" class="mb-4">
                            <div class="mt-4 text-start has-validation">
                                <label for="email" class="form-label text-muted"><small>Email</small></label>
                                <input type="email" class="form-control borderr2" id="email" placeholder="mail@domain.com" required>
                                <p id="errmsg1" class="text-muted mt-2"><small>Contoh: mail@domain.com</small></p>
                            </div>
                            <div class="mt-3 text-start has-validation">
                                <label for="password" class="form-label text-muted"><small>Kata Sandi</small></label>
                                <input type="password" class="form-control borderr2" id="password" required>
                                <p id="errmsg2" class="text-muted mt-2"><small></small></p>
                            </div>
                            <div class="mt-4 d-grid gap-2">
                                <button id="btn-submit-login" type="button" class="btn borderr2 btn-warning text-white fs-5"><strong>Masuk</strong></button>
                            </div>
                        </form>

                        <p class="text-muted text-center">Belum punya akun? <a href="<?= BASEURL; ?>/register" class="text-muted text-decoration-none fw-bold">Daftar</a></p>
                    </div>
                </div>
            </div>
        </div>
        <p class="text-center"><small>Rara Bakery &copy;2020-2021</small></p>
    </div>
</div>