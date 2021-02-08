<?php $bolu = $data['bolu']; ?>

<main>
    <div class="container col-md-9">
        <div class="row my-4">
            <div class="col-md-9 col-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <img id="foto_besar" src="<?= $bolu['foto1']; ?>" width="120px" height="350px" style="object-fit: cover;" alt="">
                        </div>
                        <div class="row mt-4">
                            <?php for ($i = 2; $i < 5; $i++) :
                                if (isset($bolu["foto{$i}"])) :
                            ?>
                                    <div class="col-4">
                                        <img id="foto_kecil<?= $i; ?>" src="<?= $bolu["foto{$i}"]; ?>" width="100%" alt="">
                                    </div>
                            <?php endif;
                            endfor; ?>
                        </div>
                    </div>
                    <div class="col-md-8 mt-4">
                        <p class="text-truncate fs-5 fw-bold"><?= $bolu['barang_nama']; ?></p>
                        <p id="barang_harga" class="fw-bold fs-2" data-barang-harga="<?= $bolu['barang_harga']; ?>">Rp.<?= number_format($bolu['barang_harga'], 0, ",", "."); ?></p>
                        <hr>
                        <p class="ms-3 my-1">
                            <a href="" class="text-decoration-none text-warning fw-bold">Detail</a>
                        </p>
                        <hr>

                        <div class="descrtiption mt-5">
                            <p><?= $bolu['barang_deskripsi']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <div class="card borderr2 shadow-sm border-1">
                    <div class="card-body ">
                        <form action="<?= BASEURL; ?>/checkout" method="POST">
                            <input id="barang_id" type="hidden" name="barang_id" value="<?= $bolu['barang_id']; ?>">
                            <label for="" class="fw-bold mb-1">Pilih Varian</label>
                            <select name="varian" class="form-select m-0 mb-3 borderr2" aria-label="Default select example" required>
                                <!-- <option>Varian</option> -->
                                <?php $x = 1;
                                foreach ($data['varian'] as $varian) : ?>
                                    <?php if ($x == 1) : ?>
                                        <option value="<?= $varian['varian_id']; ?>" selected><?= $varian['varian_nama']; ?></option>
                                    <?php endif; ?>
                                    <option value="<?= $varian['varian_id']; ?>" selected><?= $varian['varian_nama']; ?></option>
                                <?php $x++;
                                endforeach; ?>
                            </select>
                            <div class="mb-3">
                                <label for="qty" class="form-label fw-bold">Jumlah</label>
                                <input name="qty" type="number" min="1" class="form-control borderr2" id="qty" value="1" required>
                            </div>
                            <div class="mb-3">
                                <label for="catatan" class="form-label fw-bold">Catatan</label>
                                <textarea name="catatan" id="catatan" class="form-control borderr2" cols="30" rows="5"></textarea>
                            </div>

                            <div class="row my-2">
                                <div class="col"><small>Subtotal</small></div>
                                <div class="col"><strong>Rp.</strong><strong id="subtotal"><?= number_format($bolu['barang_harga'], 0, ",", "."); ?></strong></div>
                            </div>
                            <div class="d-grid gap-2 mt-3">
                                <button id="btn_submit_keranjang" type="button" class="btn btn-warning btn-sm text-white fw-bold borderr2" data-bs-toggle="modal" data-bs-target="#keranjangModal">+ Keranjang</button>
                                <?php if (isset($_SESSION['login'])) : ?>
                                    <button type="submit" class="btn border-warning btn-sm text-warning fw-bold borderr2">Beli Sekarang</button>
                                <?php else : ?>
                                    <button type="button" class="btn border-warning btn-sm text-warning fw-bold borderr2" data-bs-toggle="modal" data-bs-target="#keranjangModal">Beli Sekarang</button>
                                <?php endif; ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="itemDisplay my-4">
            <h3 class="fs-5 mb-3">Yang mungkin kamu suka</h3>
            <div class="row">
                <?php
                foreach ($data['recomend'] as $rec) : ?>
                    <div class="col-lg-2 col-sm-4 col-6 mt-4">
                        <div class="card borderr2 shadow-lsm border-0">
                            <a href="<?= BASEURL; ?>/product/<?= $rec['barang_id']; ?>" class="d-block m-0 text-decoration-none text-dark">
                                <img src="<?= $rec['foto1']; ?>" class="card-img-top" style="height: 180px; object-fit:cover;" alt="">
                                <div class="card-body m-0 ">
                                    <p class="text-truncate"><?= $rec['barang_nama']; ?></p>
                                    <h6 class="card-title fw-bold">Rp.<?= number_format($rec['barang_harga'], 0, ",", "."); ?></h6>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</main>

<div class="modal fade" id="keranjangModal" tabindex="-1" aria-labelledby="keranjangModal" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-sm-down modal-lg ">
        <div class="modal-content pb-4 px-4 borderr1">
            <div class="modal-header border-0 text-center">
                <?php if (isset($_SESSION['login'])) : ?>
                    <h5 id="cartmsg" class="modal-title text-warning fw-bold position-relative start-50 translate-middle-x" id="keranjangModalTitle"></h5>
                <?php else : ?>
                    <h5 class="modal-title text-warning fw-bold position-relative start-50 translate-middle-x" id="keranjangModalTitle">Yuk Login Dulu!</h5>
                <?php endif; ?>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row px-3 g-2">
                    <?php if (isset($_SESSION['login'])) : ?>
                        <div class="col-sm-9 text-truncate">
                            <img src="<?= $bolu['foto1']; ?>" alt="" width="80px" height="80px" style="object-fit: cover;" class="borderr2">
                            <span class="ms-2 fs-5"><?= $bolu['barang_nama']; ?></span>
                        </div>
                        <div class="col-sm-3 d-flex align-items-center justify-content-center">
                            <a href="<?= BASEURL; ?>/cart" type="button" class=" btn btn-warning btn-sm text-white fw-bold borderr2">Lihat Keranjang</a>
                        </div>
                    <?php else : ?>

                        <a href="<?= BASEURL; ?>/login" class=" btn btn-warning btn-sm text-white fw-bold borderr2">Login</a>

                    <?php endif; ?>
                </div>
            </div>
            <?php if (isset($_SESSION['login'])) : ?>
                <div class="row mt-3">
                    <p class="fw-bold">Yang Mungkin Kamu Suka</p>
                    <?php
                    foreach ($data['recomend2'] as $rec2) : ?>
                        <div class="col-sm-2 col-4 mt-4">
                            <div class="card borderr2 shadow-lsm border-0">
                                <a href="<?= BASEURL; ?>/product/<?= $rec2['barang_id']; ?>" class="d-block m-0 text-decoration-none text-dark">
                                    <img src="<?= $rec2['foto1']; ?>" class="card-img-top " style="height: 100px; object-fit:cover;" alt="">
                                    <div class="card-body m-0 ">
                                        <p class="text-truncate fs-7"><?= $rec2['barang_nama']; ?></p>
                                        <h6 class="card-title fs-7 fw-bold">Rp.<?= number_format($rec2['barang_harga'], 0, ",", "."); ?></h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>