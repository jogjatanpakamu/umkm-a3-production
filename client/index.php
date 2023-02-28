<?php
require_once 'header.php';
require_once 'model/produk.php';

$produk = getProduks();


?>
<div id="app">
  <?php include_once 'sidebar.php' ?>
  <div id="main" class="layout-navbar navbar-fixed">
    <?php include_once 'navbar.php' ?>
    <div id="main-content">
      <div class="page-heading">
        <div class="page-title">
          <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
              <h3>PRODUK KAMU</h3>
              <p class="text-subtitle text-muted">Dapatkan desain menarik dari kami</p>
            </div>
          </div>
        </div>

        <section>
          <div class="row">
            <?php foreach ($produk as $dt) : ?>
              <div class="col-xl-4 col-md-6 col-6">
                <div class="card">
                  <div class="card-content">
                    <img src="assets/images/produk/.<?= $dt['foto'] ?>" class="card-img-top img-fluid" alt="singleminded" />
                    <div class="card-body">
                      <h5 class="card-title"><?= $dt['nama'] ?></h5>
                    </div>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?= $dt['jenis'] ?></li>
                    <li class="list-group-item"><?= $dt['bahan'] ?></li>

                    <li class="list-group-item"><a href="pemesanan.php?id=<?= $dt['pesid'] ?>" class="btn btn-outline-primary w-100">Lihat</a></li>

                  </ul>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </section>
      </div>


    </div>
  </div>
</div>

<?php require_once 'footer.php' ?>