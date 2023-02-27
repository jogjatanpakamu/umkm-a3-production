<?php
require_once 'header.php';
require_once 'model/produk.php';

$produk = getProduks();

// var_dump($produk);
// // die;

?>

<div id="app">
  <?php include_once 'sidebar.php' ?>
  <div id="main" class="layout-navbar navbar-fixed">
    <?php include_once 'navbar.php' ?>
    <div id="main-content">
      <div id="main-content">
        <div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>KATALOG KAMI</h3>
                <p class="text-subtitle text-muted">temukan desain terbaik kamu</p>
              </div>
            </div>
          </div>

          <section class="section">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h5 class="card-title">galery</h5>
                  </div>
                  <div class="card-body">
                    <div class="row gallery" data-bs-toggle="modal" data-bs-target="#galleryModal">
                      <?php foreach ($produk as $p) :   ?>
                        <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">
                          <a href="#">
                            <img class="w-100" src="assets/images/produk/.<?= $p['foto'] ?>" data-bs-target="#Gallerycarousel" data-bs-slide-to="3" />
                          </a>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>

        <div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="galleryModalTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="galleryModalTitle">Our Gallery Example</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <i data-feather="x"></i>
                </button>
              </div>
              <div class="modal-body">
                <div id="Gallerycarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">

                  <div class="carousel-inner">
                    <?php foreach ($produk as $p) :   ?>
                      <div class="carousel-item active">
                        <img class="d-block w-100" src="assets/images/produk/.<?= $p['foto'] ?>" />
                      </div>


                    <?php endforeach; ?>

                  </div>
                  <a class="carousel-control-prev" href="#Gallerycarousel" role="button" type="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  </a>
                  <a class="carousel-control-next" href="#Gallerycarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  </a>
                </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

        <footer>
          <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
              <p>2021 &copy; Mazer</p>
            </div>
            <div class="float-end">
              <p>
                Crafted with
                <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                by <a href="https://ahmadsaugi.com">Saugi</a>
              </p>
            </div>
          </div>
        </footer>
      </div>
    </div>
  </div>

  <?php include_once 'footer.php' ?>