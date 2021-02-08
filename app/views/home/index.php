<main class="container col-sm-9">
    <div class="unggulan mb-5">
        <h1 class="text-center my-4">Produk Unggulan</h1>
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-6 d-flex justify-content-lg-end justify-content-center position-relative">
                        <div class="position-absolute bottom-0" style="left:15%">
                            <p class="display-3 fw-bold"><span class="bg-white">Sweet</span></p>
                            <p class="display-6  fw-bolder"><span class="bg-white">Potato Cake</span></p>
                            <p class="fs-5"><a href="" class="text-decoration-none"><span class="bg-white text-dark borderr1 px-3 pb-1">Ayo lihat! <i class="bi bi-arrow-right-circle-fill"></i></span></a></p>
                        </div>
                        <!-- <p class="display-5 bg-white position-relative top-50 fw-bold" style="left:15%">Potato Cake</p> -->
                        <img class="unggulan1" src="<?= BASEURL; ?>/img/cake1.jpg" alt="">

                    </div>
                    <div class="col-sm-6 d-flex align-items-sm-end justify-content-lg-start justify-content-center">
                        <div class="row">
                            <div class="col-6">
                                <img class="unggulan2" src="<?= BASEURL; ?>/img/cucur.jpg" alt="">
                            </div>
                            <div class="col-6 ">
                                <img class="unggulan2" src="<?= BASEURL; ?>/img/cucur.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div id="cariKategori" class="my-4">
        <h3 class="fs-3 mb-4">Cari Kategori Apa?</h3>
        <div class="row justify-content-around g-0">
            <div class="col-2">
                <form action="<?= BASEURL; ?>/search/" method="POST">
                    <input type="hidden" value="3" name="katid">
                    <button class="btn" type="submit">
                        <img src="<?= BASEURL; ?>/img/bika_ambon.png" class="borderr2" style="height: 150px; width: 100%; object-fit:cover;">
                        <h6 class="text-center fw-bold text-truncate">Kue Basah</h6>
                    </button>
                </form>
            </div>
            <div class="col-2">
                <form action="<?= BASEURL; ?>/search/" method="POST">
                    <input type="hidden" value="4" name="katid">
                    <button class="btn" type="submit">
                        <img src="<?= BASEURL; ?>/img/lidah_kucing.jpg" class="borderr2" alt="" style="height: 150px; width: 100%; object-fit:cover;">
                        <h6 class="text-center fw-bold text-truncate">Kue kering</h6>
                    </button>
                </form>
            </div>
            <div class="col-2">
                <form action="<?= BASEURL; ?>/search/" method="POST">
                    <input type="hidden" value="5" name="katid">
                    <button class="btn" type="submit">
                        <img src="<?= BASEURL; ?>/img/boluhijau.jpg" class="borderr2" alt="" style="height: 150px; width: 100%; object-fit:cover;">
                        <h6 class="text-center fw-bold text-truncate">Bolu</h6>
                    </button>
                </form>
            </div>
            <div class="col-2">
                <form action="<?= BASEURL; ?>/search/" method="POST">
                    <input type="hidden" value="1" name="katid">
                    <button class="btn" type="submit">
                        <img src="<?= BASEURL; ?>/img/enderman_cake.jpg" class="borderr2" alt="" style="height: 150px; width: 100%; object-fit:cover;">
                        <h6 class="text-center fw-bold text-truncate">Kue Ulang Tahun</h6>
                    </button>
                </form>
            </div>
            <div class="col-2">
                <form action="<?= BASEURL; ?>/search/" method="POST">
                    <input type="hidden" value="2" name="katid">
                    <button class="btn" type="submit">
                        <img src="<?= BASEURL; ?>/img/cucur.jpg" class="borderr2" alt="" style="height: 150px; width: 100%; object-fit:cover;">
                        <h6 class="text-center fw-bold text-truncate">Jajanan Tradisional</h6>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <hr>
    <div class="itemDisplay my-4">
        <h3 class="fs-3 mb-4">Yang mungkin kamu suka</h3>
        <div class="row ">
            <?php
            foreach ($data['bolu'] as $bolu) : ?>
                <div class="col-lg-2 col-sm-4 col-6 mt-4">
                    <div class="card borderr2 shadow-lsm border-0">
                        <a href="<?= BASEURL; ?>/product/<?= $bolu['barang_id']; ?>" class="d-block m-0 text-decoration-none text-dark">
                            <img src="<?= $bolu['foto1']; ?>" class="card-img-top" style="height: 180px; object-fit:cover;" alt="">
                            <div class="card-body m-0 ">
                                <p class="text-truncate"><?= $bolu['barang_nama']; ?></p>
                                <h6 class="card-title fw-bold">Rp.<?= number_format($bolu['barang_harga'], 0, ",", "."); ?></h6>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>