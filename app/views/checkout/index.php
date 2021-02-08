<?php
// var_dump($data);
if (isset($data['alamat']))
    $alamat = $data['alamat'];
else
    $alamat = null;

if (isset($data['bolu']))
    $bolu = $data['bolu'];

$qty = 0;
$totalbayar = 0;
?>

<main>
    <div class="container col-md-9 col-11">
        <form id="form-checkout" action="<?= BASEURL; ?>/checkout/ccode" method="POST">
            <div class="row my-4">

                <?php
                $inputi = 0;
                foreach ($bolu as $bbolui) : ?>
                    <?php if (isset($bbolui['cartid'])) : ?>
                        <input type="hidden" name="cartid[]" value="<?= $bbolui['cartid']; ?>">
                    <?php else : ?>
                        <input type="hidden" name="cartid[]" value="">
                    <?php endif; ?>
                    <input type="hidden" name="barang_id[]" value="<?= $bbolui['barang_id']; ?>">
                    <input type="hidden" name="varian_id[]" value="<?= $bbolui['varian']['varian_id']; ?>">
                    <input type="hidden" name="barang_jumlah[]" value="<?= $bbolui['qty']; ?>">
                    <input type="hidden" name="barang_catatan[]" value="<?= $bbolui['catatan']; ?>">
                    <input type="hidden" name="alamat_id" value="<?= $alamat['alamat_id']; ?>">
                    <input id="pmethod" type="hidden" name="pembayaran_method_id" value="4">
                <?php
                    $inputi++;
                endforeach; ?>








                <div class=" col-md-8 col-12">
                    <h1 class="fw-bold mb-3">Checkout</h1>
                    <div class="alamat">
                        <h3 class="fw-bold">Alamat</h3>
                        <hr>
                        <div class="my-4">
                            <?php if (isset($alamat)) : ?>
                                <p class="text-muted m-0" id="namaPenerima">
                                    <?= $alamat['nama_penerima']; ?>
                                </p>
                                <p class="text-muted m-0" id="namaPenerima">
                                    <?= $alamat['telp_penerima']; ?>
                                </p>
                                <p class="text-muted mt-3 text-justify"> <?= $alamat['alamat']; ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <hr>
                        <div id="tombol-container">
                            <?php if ($alamat != null) : ?>
                                <button type="button" class="btn text-secondary fw-bold borderr2 border border-dark">Ubah Alamat</button>
                            <?php else : ?>
                                <!-- kalau belum ada alamat -->
                                <button type="button" class="btn btn-success fw-bold borderr2 ">Tambah Alamat</button>
                            <?php endif; ?>
                        </div>
                        <hr>
                    </div>
                    <h3 class="fw-bold">Detail Barang</h3>

                    <!-- satuan product -->
                    <?php if (isset($bolu)) :
                        foreach ($bolu as $bbeli) : ?>
                            <div class="row my-3">
                                <div class="col-md-3">

                                    <img src="<?= $bbeli['foto1']; ?>" class="" alt="" width="100%">


                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col">

                                            <p class="nama-barang m-0 text-truncate"><?= $bbeli['barang_nama']; ?></p>

                                            <p class="text-muted m-0"><small><?= $bbeli['varian']['varian_nama']; ?></small></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <p class="fw-bold fs-3 harga">Rp.<?= number_format($bbeli['barang_harga'], 0, ",", "."); ?> <span class="fs-7">X (<?= $bbeli['qty']; ?>)</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 d-flex align-items-center">
                                    <select class="form-select bg-warning fw-bold text-white borderr2" aria-label="pengiriman_id" name="pengiriman_id[]" required>
                                        <option value="1" harga="0">Pengiriman</option>
                                        <?php foreach ($bbeli['methodp'] as $methodep) : ?>
                                            <option class="methodeks-option" value="<?= $methodep['methodeks_id']; ?>" harga="<?= $methodep['methodeks_ongkir']; ?>"><?= $methodep['methodeks_nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="Subtotal text-end">
                                Subtotal <span class="fw-bold  fs-4">Rp.<?= number_format(($bbeli['barang_harga'] * $bbeli['qty']), 0, ",", "."); ?> </span>
                            </div>
                            <hr>
                    <?php
                            $qty += $bbeli['qty'];
                            $totalbayar += $bbeli['barang_harga'] * $bbeli['qty'];
                        endforeach;
                    endif; ?>
                </div>
                <div class="col-md-4 col-12">
                    <div class="card borderr2 shadow-sm border-1 position-sticky" style="top:15%">
                        <div class="card-body">
                            <p class="fw-bold fs-6">Ringkasan Belanja</p>
                            <div class="row">
                                <div class="col-7 fw-light">
                                    <small>Total Harga (<?= $qty; ?> produk)</small>
                                </div>
                                <div class="col-5 text-end fw-bold">
                                    Rp.<span id="total-harga-barang"><?= number_format($totalbayar, 0, ",", "."); ?></span>
                                </div>
                            </div>
                            <hr style="height: 3px; color:#000; background-color:#000; ">
                            <div class="row mb-3">
                                <div class="col-6 fw-bold">
                                    Total Harga
                                </div>
                                <div class="col-6 text-end fw-bold">
                                    Rp.<span id="total-keseluruhan"></span>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-10 d-grid">
                                    <button id="modal-trigger-1" type="button" class="btn btn-warning text-white fw-bold borderr2" data-bs-toggle="modal" data-bs-target="#bayarModal">Bayar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</main>
<!-- Modal -->
<div class="modal fade" id="bayarModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="bayarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content modal-fullscreen-sm-down bg-light borderr2">
            <div class="modal-header border-0  bg-white">
                <h5 class="modal-title fw-bold" id="bayarModalLabel">Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="container mb-2 pb-2 bg-white">
                <div class="row">
                    <div class="col-8">
                        <h6>Metode Pembayaran</h6>
                    </div>
                    <div class="col-4 text-end">
                        <a href="" class="text-decoration-none text-warning fw-bold" data-bs-toggle="modal" data-bs-target="#metodePembayaranModal" role="button">Lihat semua</a>
                    </div>
                </div>
            </div>
            <div class="modal-body bg-white">

                <div class="row">
                    <p class="fw-bold">Ringkasan Pembayaran</p>

                    <div class="row text-muted">
                        <div class="col-6"><small>Total Belanja</small></div>
                        <div class="col-6 text-end"><small>Rp.<span id="total-harga-barang2"><?= number_format($totalbayar, 0, ",", "."); ?></span></small></div>
                    </div>
                    <div class="row text-muted">
                        <div class="col-6"><small>Total Ongkir</small></div>
                        <div class="col-6 text-end"><small>Rp.<span id="total-ongkir">0</span></small></div>
                    </div>
                    <div class="row text-muted">
                        <div class="col-6"><small>Biaya Layanan</small></div>
                        <div class="col-6 text-end"><small>Rp.<span id="biaya-layanan">0</span></small></div>
                    </div>

                </div>

            </div>
            <div class="modal-footer mt-2 bg-white">
                <div class="col-11">
                    <div class="row">
                        <div class="col-6">
                            <p class="fw-bold m-0"><small>Total Bayar</small></p>
                            <p class="fw-bold fs-3 m-0 text-danger">Rp.<span id="total-bayar-red">0</span></p>
                        </div>
                        <div class="col-6 text-end d-grid p-2">
                            <button id="bayar-trigger" type="button" class="btn btn-warning text-white fw-bold borderr2">Bayar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="metodePembayaranModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="bayarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm modal-dialog-scrollable">
        <div class="modal-content modal-fullscreen-sm-down bg-light borderr2">
            <div class="modal-header border-0  bg-light">
                <h5 class="modal-title fw-bold" id="metodePembayaranModalLabel">Pilih Petode Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body col-10 mx-auto bg-light">

                <div class="row mb-3">
                    <div class="col">
                        <div class="row">
                            <div class="col-3">
                                <img src="http://localhost/123190123-rarabakery/public/img/ovo.png" alt="" width="30px" class="me-3">
                            </div>
                            <div class="col-9">
                                <p class="fw-bold">OVO</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <input class="form-check-input pembayaran" type="radio" name="mpembayaran" value="1" biaya-layanan="0">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="row">
                            <div class="col-3">
                                <img src="http://localhost/123190123-rarabakery/public/img/bni.png" alt="" width="30px" class="me-3">
                            </div>
                            <div class="col-9">
                                <p class="fw-bold">BNI</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <input class="form-check-input pembayaran" type="radio" name="mpembayaran" value="2" biaya-layanan="2500">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="row">
                            <div class="col-3">
                                <img src="http://localhost/123190123-rarabakery/public/img/bri.png" alt="" width="30px" class="me-3">
                            </div>
                            <div class="col-9">
                                <p class="fw-bold">BRI</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <input class="form-check-input pembayaran" type="radio" name="mpembayaran" value="3" biaya-layanan="2500">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="row">
                            <div class="col-3">
                                <img src="http://localhost/123190123-rarabakery/public/img/indomaret.png" alt="" width="30px" class="me-3">
                            </div>
                            <div class="col-9">
                                <p class="fw-bold">Indomaret</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <input class="form-check-input pembayaran" selected type="radio" name="mpembayaran" value="4" biaya-layanan="2500">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="row">
                            <div class="col-3">
                                <img src="http://localhost/123190123-rarabakery/public/img/alfamart.png" alt="" width="30px" class="me-3">
                            </div>
                            <div class="col-9">
                                <p class="fw-bold">Alfamart</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <input class="form-check-input pembayaran" type="radio" name="mpembayaran" value="5" biaya-layanan="2500">
                    </div>
                </div>
                <div class="row">
                    <button type="button" class="btn btn-info fw-bold text-white" data-bs-dismiss="modal" aria-label="Close">Oke</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>