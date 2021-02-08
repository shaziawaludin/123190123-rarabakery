<?php
// var_dump($data);

?>
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container d-flex ">
        <a class="navbar-brand" href="<?= BASEURL; ?>">
            <img src="<?= BASEURL; ?>/img/raralogo.png" alt="" height="30">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
            <div class="col-sm-8">
                <form class="d-flex m-0 p-0" method="POST" action="<?= BASEURL; ?>/search/">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text borderr2 border-end-0 bg-white" id="addon-wrapping">
                            <button type="submit" class="border-0 bg-white"><i class="bi bi-search"></i></button></span>
                        <input type="text" class="form-control borderr2 border-start-0" name="keyword" aria-describedby="addon-wrapping">
                    </div>
                </form>
            </div>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="kategoriDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Kategori
                    </a>
                    <ul class="dropdown-menu " aria-labelledby="kategoriDropdown">
                        <li><a class="dropdown-item" href="">
                                <form action="<?= BASEURL; ?>/search/" method="POST">
                                    <input type="hidden" value="3" name="katid">
                                    <button class="btn" type="submit">
                                        kue Basah
                                    </button>
                                </form>
                            </a>
                        </li>
                        <li><a class="dropdown-item" href="">
                                <form action="<?= BASEURL; ?>/search/" method="POST">
                                    <input type="hidden" value="4" name="katid">
                                    <button class="btn" type="submit">
                                        Kue Kering
                                    </button>
                                </form>
                            </a>
                        </li>
                        <li><a class="dropdown-item" href="">
                                <form action="<?= BASEURL; ?>/search/" method="POST">
                                    <input type="hidden" value="5" name="katid">
                                    <button class="btn" type="submit">
                                        Bolu
                                    </button>
                                </form>
                            </a>
                        </li>
                        <li><a class="dropdown-item" href="">
                                <form action="<?= BASEURL; ?>/search/" method="POST">
                                    <input type="hidden" value="1" name="katid">
                                    <button class="btn" type="submit">
                                        Ulang Tahun
                                    </button>
                                </form>
                            </a>
                        </li>
                        <li><a class="dropdown-item" href="">
                                <form action="<?= BASEURL; ?>/search/" method="POST">
                                    <input type="hidden" value="2" name="katid">
                                    <button class="btn" type="submit">
                                        Jajanan Tradisional
                                    </button>
                                </form>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto me-2">
                <?php if (Auth::loggedin()) : ?>
                    <li class="nav-item mt-auto mb-auto">
                        <a class="nav-link fs-3" href="<?= BASEURL; ?>/cart"><i class="bi bi-cart-fill"></i></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="profilDropdown" href="" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span>
                                <?php if (isset($data['foto_profil'])) : ?>
                                    <?php if ($data['foto_profil'] == 'NULL' || is_null($data['foto_profil'])) : ?>
                                        <img class="rounded-circle me-2" src="<?= BASEURL; ?>/img/profile.jpg" height="40" alt="">

                                    <?php else : ?>
                                        <img class="rounded-circle me-2" src="<?= $data['foto_profil']; ?>" height="40" alt="">

                                    <?php endif; ?>
                                <?php else : ?>
                                    <img class="rounded-circle me-2" src="<?= BASEURL; ?>/img/profile.jpg" height="40" alt="">
                                <?php endif; ?>

                            </span>
                            <?php if (isset($data['user_nama'])) : ?>
                                <?php echo explode(' ', trim($data['user_nama']))[0]; ?>
                            <?php endif; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="profilDropdown">
                            <li><a class="dropdown-item" href="<?= BASEURL; ?>/user">Profil</a></li>
                            <li><a class="dropdown-item" href="#">Daftar Transaksi</a></li>
                            <li><a class="dropdown-item" href="<?= BASEURL; ?>/login/logout">Logout</a></li>
                        </ul>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a href="<?= BASEURL; ?>/register" class="btn btn-warning text-white btn-sm fw-bold">Daftar</a>
                        <a href="<?= BASEURL; ?>/login" class="btn btn-outline-warning btn-sm fw-bold">Masuk</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>

    </div>
</nav>