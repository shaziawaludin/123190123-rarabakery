<?php
// var_dump($data);

if (isset($data['keranjang'])) {
    $items = $data['keranjang'];
}
?>

<main>
    <div class="container col-md-9 col-11">
        <div class="row my-4">
            <div class="col-md-8 col-12">
                <h1 class="fw-bold">Keranjang</h1>
                <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" value="" id="checkAll">
                    <label class="form-check-label" for="checkAll">
                        Pilih Semua
                    </label>
                </div>
                <hr>
                <form id="keranjang_belanja" action="<?= BASEURL; ?>/checkout" method="POST">
                    <!-- satuan product -->
                    <?php foreach ($items as $item) : ?>

                        <!-- <input type="hidden" name="cartId[]" value="<?= $item['id']; ?>"> -->
                        <input type="hidden" name="barang_id[<?= $item['id']; ?>]" value="<?= $item['barang_id']; ?>">
                        <input type="hidden" name="varian_id[<?= $item['id']; ?>]" value="<?= $item['varian_id']; ?>">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <div class="row justify-content-center">
                                    <div class="col-md-2 col-2">
                                        <input class="checkform form-check-input check-product position-relative top-50 translate-middle-y" type="checkbox" name="cartId[]" value="<?= $item['id']; ?>">
                                    </div>
                                    <div class="col-md-9 col-4">
                                        <a href="">
                                            <img src="<?= $item['barang_foto']; ?>" class="" alt="" width="100%">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col">
                                        <a href="" class="text-decoration-none text-dark">
                                            <p class="nama-barang m-0 text-truncate"><?= $item['barang_nama']; ?></p>
                                        </a>
                                        <p class="text-muted m-0"><small><?= $item['varian_nama']; ?></small></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p class="fw-bold fs-3 harga">Rp. <span id="bharga<?= $item['id']; ?>"><?= number_format($item['barang_harga'], 0, ",", "."); ?></span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-0 mb-3 p-0 mt-3">
                                <div class="col-md-7 m-0 p-0 col-6">
                                    <div class="ms-lg-5">
                                        <label class="text-warning fw-bold ms-lg-2 fs-6">Tulis Catatan</label>
                                        <textarea name="catatan[<?= $item['id']; ?>]" id="catatan<?= $item['id']; ?>" class="form-control"><?= $item['catatan']; ?></textarea>
                                    </div>
                                </div>
                                <div class=" col-md-5 col-6">
                                    <div class="row m-0 p-0 g-0 h-100 align-items-center">
                                        <div class="col-md-2 text-md-end">
                                            <button type="button" class="bintrash btn text-secondary text-decoration-none" trash-id="<?= $item['id']; ?>">
                                                <i class="bi bi-trash"></i>
                                            </button>

                                        </div>
                                        <div class="col-md-10">
                                            <div class="row justify-content-end">
                                                <div class="col-5 text-end">
                                                    <label class="fs-6 fw-bold text-secondary">Jumlah</label>
                                                </div>
                                                <div class="col-7">
                                                    <input id="barang_jumlah<?= $item['id']; ?>" name="barang_jumlah[<?= $item['id']; ?>]" type="number" min="1" class="form-control form-control-sm borderr1" value="<?= $item['barang_jumlah']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    <?php endforeach; ?>
                </form>
            </div>
            <div class="col-md-4 col-12">
                <div class="card borderr2 shadow-sm border-1 position-sticky" style="top:15%">
                    <div class="card-body">
                        <p class="fw-bold fs-6">Ringkasan Belanja</p>
                        <div class="row">
                            <div class="col-7 fw-light">
                                <small>Total Harga ( <span class="total_qty">0</span> produk )</small>
                            </div>
                            <div class="col-5 text-end fw-bold">
                                Rp. <span class="total-harga">0</span>
                            </div>
                        </div>
                        <hr style="height: 3px; color:#000; background-color:#000; ">
                        <div class="row mb-3">
                            <div class="col-6 fw-bold">
                                Total Harga
                            </div>
                            <div class="col-6 text-end fw-bold">
                                Rp.<span class="total-harga">0</span>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-10 d-grid">
                                <button id="btn-input-trigger" type="button" class="btn btn-warning text-white fw-bold borderr2">Beli (<span class="total_qty">0</span>)</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>