<?php
// var_dump($_POST);

$detail = $data['forview'];
// var_dump($detail);
?>


<main>
    <div class="container col-sm-9">
        <h1 class="fw-bold my-3 text-center">Silahkan Selesaikan Pembayaran</h1>
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <div class="card borderr2 mb-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <h5 class=""><?= $data['namaPembayaran']; ?></h5>
                            </div>
                            <div class="col-4 text-end">
                                <span><img src="<?= $data['namaPembayaran']; ?>" alt="" width="70px" class="me-3"></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-sm-5 p-4">
                        <div class="row mb-3">
                            <p class="card-text text-muted m-0"><small>Kode Pembayaran</small></p>
                            <h5 class="fs-4 fw-bold"><?= $_SESSION['ccode']; ?></h5>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p class="card-text text-muted m-0"><small>Total Pembayaran</small></p>
                                <h5 class="card-title text-danger fw-bold">Rp.<?= number_format(($data['total_harga_barang'] + $data['total_ongkir'] + $data['pembayaran_biaya']), 0, ',', '.'); ?></h5>
                            </div>
                            <div class="col text-end align-self-end">
                                <a href="#" class="text-decoration-none text-warning fw-bold" data-bs-toggle="modal" data-bs-target="#detailModal">Detail</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row justify-content-center ">
                    <div class="col-6 text-end">
                        <a href="http://localhost/123190123-rarabakery/public/search" class="btn btn-light border-warning fw-bold text-warning borderr2">Pesan Kue Lagi</a>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-warning fw-bold text-white borderr2">Status Pembayaran</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<!-- modal detail -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-sm-down modal-dialog-scrollable">
        <div class="modal-content borderr2">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="detailModalLabel">Detail Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row text-muted">
                    <div class="col">
                        Total Harga ( <?= $data['total_barang']; ?> barang)
                    </div>
                    <div class="col text-end">
                        Rp.<?= number_format($data['total_harga_barang'], 0, ',', '.'); ?>
                    </div>
                </div>

                <div class="row text-muted">
                    <div class="col">
                        Total ongkos kirim
                    </div>
                    <div class="col text-end">
                        Rp.<?= number_format($data['total_ongkir'], 0, ',', '.'); ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col fw-bold">
                        Total Tagihan
                    </div>
                    <div class="col fw-bold text-end">
                        Rp.<?= number_format(($data['total_harga_barang'] + $data['total_ongkir']), 0, ',', '.'); ?>
                    </div>
                </div>
                <div class="row text-muted">
                    <div class="col">
                        Biaya layanan
                    </div>
                    <div class="col text-end">
                        Rp.<?= number_format($data['pembayaran_biaya'], 0, ',', '.'); ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col fw-bold">
                        Total Tagihan
                    </div>
                    <div class="col fw-bold text-end text-danger">
                        Rp.<?= number_format(($data['total_harga_barang'] + $data['total_ongkir'] + $data['pembayaran_biaya']), 0, ',', '.'); ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col fw-bold">
                        Dibayar dengan
                    </div>

                </div>
                <div class="row text-muted">
                    <div class="col">
                        <?= $data['namaPembayaran']; ?>
                    </div>
                    <div class="col text-end">
                        Rp.<?= number_format(($data['total_harga_barang'] + $data['total_ongkir'] + $data['pembayaran_biaya']), 0, ',', '.'); ?>
                    </div>
                </div>
                <div class="infobarang mt-4">
                    <h5 class="fw-bold">Barang yang dibeli</h5>
                    <?php $i = 0;
                    foreach ($detail['barang_id'] as $barang_id) : ?>
                        <p class="fw-bold m-0"><?= $detail['nama_barang_dibeli'][$i]; ?></p>
                        <div class="row text-muted">
                            <div class="col"><small><?= $detail['total_barang_dibeli'][$i]; ?> x Rp.<?= number_format($detail['harga_barang_dibeli'][$i], 0, ',', '.'); ?></small></div>
                            <div class="col text-end"><small>Rp.<?= number_format(($detail['total_barang_dibeli'][$i] * $detail['harga_barang_dibeli'][$i]), 0, ',', '.'); ?></small></div>
                        </div>
                        <div class="row text-muted mt-2">
                            <div class="col">
                                <p class="m-0"><small>Ongkos Kirim</small></p>
                                <p class=" m-0"><small><?= $detail['methodeks_barang_dibeli'][$i]; ?></small></p>
                            </div>
                            <div class="col text-end"><small>Rp.<?= number_format($detail['ongkir_barang_dibeli'][$i], 0, ',', '.'); ?></small></div>
                        </div>
                    <?php $i++;
                    endforeach; ?>
                    <p class="fw-bold mt-3">Alamat pengiriman</p>
                    <p class="text-muted"><?= $data['alamat_pengiriman']; ?></p>

                </div>
            </div>

        </div>
    </div>
</div>