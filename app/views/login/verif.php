<?php
include "master/header.php";
?>

<div class="container text-center">
    <h1 class="mt-5 text-brown "><strong>Verifikasi</strong></h1>
    <h5 class="mt-4">Masukkan Kode Verifikasi</h5>
    <p class="text-muted">Kode verifikasi telah dikirim melalui email ke <a href="" class="" role="button" data-bs-toggle="modal" data-bs-target="#vCodeModal"><?= $data['email']; ?></a></p>
    <p>click emailnya!</p>
    <div class="row m-4 justify-content-center">
        <div class="col-sm-4 mb-4">
            <form action="">
                <input id="email" type="hidden" value="<?= $data['email']; ?>">
                <input id="code" name="code" class="form-control form-control-lg borderr2 text-center" type="text" aria-label="kodeVerifikasi" maxlength="4">
                <p class="mt-2" id="errmsg"></p>
                <button id="btn-submit-verif" type="button" class="btn btn-warning btn-lg mt-2 text-white"><b>Verivikasi</b></button>
            </form>
        </div>
        <p class="text-muted m-0"><small>tidak menerima email?</small></p>
        <p><a href="" class="text-decoration-none m-0 text-brown"><small>Kirim ulang</small></a></p>
    </div>
</div>

<div class="modal fade" id="vCodeModal" tabindex="-1" aria-labelledby="vCodeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Anggap aja ini masuk email</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                code : <span class="fw-bold fs-4"><?= $_SESSION['vcode']; ?></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php
include "master/footer.php";
?>