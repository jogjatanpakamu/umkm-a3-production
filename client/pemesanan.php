<?php
require_once 'header.php';
require_once 'model/produk.php';

// if (!isset($_GET['id'])) {
//   include "partials/not_found.php";
//   exit;
// }
$produkId = $_GET['id'];

$produk = getProdukId($produkId);
if (!$produk) {
  // include "partials/not_found.php";
  exit;
}


var_dump($produk);
die;
?>

<div id="app">
  <div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
      <div class="sidebar-header position-relative">
        <div class="d-flex justify-content-between align-items-center">
          <div class="logo">
            <a href="index.html"><img src="assets/images/logo/logo.svg" alt="Logo" srcset="" /></a>
          </div>
          <div class="theme-toggle d-flex gap-2 align-items-center mt-2">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
              <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                <path d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2" opacity=".3"></path>
                <g transform="translate(-210 -1)">
                  <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                  <circle cx="220.5" cy="11.5" r="4"></circle>
                  <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                </g>
              </g>
            </svg>
            <div class="form-check form-switch fs-6">
              <input class="form-check-input me-0" type="checkbox" id="toggle-dark" style="cursor: pointer" />
              <label class="form-check-label"></label>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
              <path fill="currentColor" d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z"></path>
            </svg>
          </div>
          <div class="sidebar-toggler x">
            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
          </div>
        </div>
      </div>
      <div class="sidebar-menu">
        <?php include_once 'sidebar.php' ?>
      </div>
    </div>
  </div>
  <div id="main" class="layout-navbar navbar-fixed">
    <?php include_once 'navbar.php' ?>
    <div id="main-content">
      <div id="main-content">
        <div class="page-heading">
          <div class="page-title">
            <div class="row">

            </div>
          </div>
          <section class="section">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">PRODUK NAMA</h4>
              </div>

              <div class="card-body">
                <div class="row">
                  <div class="col-12 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">
                    <a href="#">
                      <img class="w-100 active" src="assets/images/produk/.<?= $produk['foto'] ?>" data-bs-target="#Gallerycarousel" data-bs-slide-to="0" />
                    </a>
                  </div>

                  <div class="col-4 col-sm-6 col-lg-3">
                    <div class="form-group">
                      <label for="helperText">Nama Produk</label>
                      <input type="text" id="helperText" class="form-control" placeholder="Name" value="<?= $produk['nama'] ?>" />
                    </div>
                  </div>

                  <div class="col-4 col-sm-6 col-lg-3">
                    <div class="form-group">
                      <label for="helperText">Bahan</label>
                      <input type="text" id="helperText" class="form-control" placeholder="Name" value="<?= $produk['bahan'] ?>" />
                    </div>
                  </div>
                  <div class="col-4 col-sm-6 col-lg-3">
                    <div class="form-group">
                      <label for="helperText">jenis</label>
                      <input type="text" id="helperText" class="form-control" placeholder="Name" value="<?= $produk['jenis'] ?>" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">BUAT PESANAN</h4>
              </div>
              <div class="card-content">
                <div class="card-body">
                  <form id="form_data_pesanan" class="form form-horizontal">
                    <input type="hidden" name="produk_id" id="produk_id" value="<?= $produk['id'] ?>">
                    <div class="form-body">
                      <div class="row">
                        <div class="col-md-4">
                          <label>Nama Lengkap</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <input type="text" id="nama_pemesan" class="form-control" name="nama_pemesan" placeholder="First Name" required />
                        </div>
                        <div class="col-md-4">
                          <label>Alamat Email</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <input type="text" id="email" class="form-control" value="" name="email" placeholder="First Name" required />
                        </div>

                        <div class="col-md-4">
                          <label>Mobile</label>
                        </div>
                        <div class="col-md-8 form-group">
                          <input type="number" id="contact-info" class="form-control" name="telpon" placeholder="telpon" required />
                        </div>

                        <div class="col-12 form-group">
                          <div class="form-floating">
                            <textarea class="form-control" placeholder="catatan" id="floatingTextarea" name="catatan" required></textarea>
                            <label for="floatingTextarea">Catatan</label>
                          </div>
                        </div>

                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

          </section>
        </div>
        <!-- card order -->

        <div id="card-order">
          <button type="button" id="btn_pesan" class="btn btn-primary">
            BELI SEKARANG

          </button>
        </div>
      </div>
    </div>
  </div>
  <?php include_once 'footer.php' ?>