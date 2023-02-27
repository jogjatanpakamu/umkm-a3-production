(function Main() {
  'use strict';

  var offlineIcon;
  var isOnline = 'onLine' in navigator ? navigator.onLine : true;
  var usingSW = 'serviceWorker' in navigator;
  var swRegistration;
  var svcworker;
  let data_pesanan = '';
  var isLoggedIn = /uuid=1/.test(document.cookie.toString() || '');

  document.addEventListener('DOMContentLoaded', ready, false);

  initServiceWorker().catch(console.error);

  function ready() {
    window.addEventListener('online', function online() {
      isOnline = true;
      backupPost();
      sendStatusUpdate();
    });

    window.addEventListener('offline', function offline() {
      isOnline = false;
      sendStatusUpdate();
    });
  }

  async function initServiceWorker() {
    swRegistration = await navigator.serviceWorker.register('sw.js', {
      updateViaCache: 'none'
    });

    svcworker = swRegistration.installing || swRegistration.waiting || swRegistration.active;
    sendStatusUpdate(svcworker);

    navigator.serviceWorker.addEventListener('controllerchange', function onController() {
      svcworker = navigator.serviceWorker.controller;
      sendStatusUpdate(svcworker);
    });

    navigator.serviceWorker.addEventListener('message', onSWMessage);
  }

  async function backupPost() {
    await idbKeyval.set('add-post-backup', {
      title: 'teset',
      post: 'teset'
    });
  }

  function onSWMessage(event) {
    var { data } = event;
    if (data.requestStatusUpdate) {
      console.log('Received status update request from service worker, responding...');
      sendStatusUpdate(event.ports && event.ports[0]);
    } else if (data == 'force-logout') {
      document.cookie = 'isLoggedIn=';
      isLoggedIn = false;
      sendStatusUpdate();
    }
  }

  function sendStatusUpdate(target) {
    sendSWMessage({ statusUpdate: { isOnline } }, target);
  }

  function sendSWMessage(msg, target) {
    if (target) {
      target.postMessage(msg);
    } else if (svcworker) {
      svcworker.postMessage(msg);
    } else {
      navigator.serviceWorker.controller.postMessage(msg);
    }
  }

  var form_data_pesanan = $('#form_data_pesanan');
  form_data_pesanan.on('change', function (e) {
    const form = $('#form_data_pesanan').serializeArray();
    const data = form.reduce((acc, { name, value }) => ({ ...acc, [name]: value }), {});
    data_pesanan = data;
  });

  $('#btn_pesan').on('click', function () {
    if (isLoggedIn) {
      if (isOnline) {
        console.log(data_pesanan);
        if (!data_pesanan.nama_pemesan || !data_pesanan.email || !data_pesanan.telpon || !data_pesanan.catatan) {
          Swal.fire({
            icon: 'warning',
            title: 'Data kamu belum lengkap ',
            timer: 2000
          });
        } else {
          $.ajax({
            type: 'POST',
            url: 'model/pesanan.php',
            data: {
              idPesanan: '',
              produk_id: data_pesanan.produk_id,

              nama_pemesan: data_pesanan.nama_pemesan,
              email: data_pesanan.email,
              telpon: data_pesanan.telpon,
              catatan: data_pesanan.catatan,
              code: 'create'
            },
            success: function (data) {
              Swal.fire({
                icon: 'success',
                title: 'Success',
                timer: 2000
              }).then(() => {
                window.location.href = 'riwayat-belanja.php';
              });
            }
          });
        }
      } else {
        Swal.fire({
          icon: 'warning',
          title: 'Kamu lagi ofline ',
          timer: 2000
        });
      }
    } else {
      Swal.fire({
        icon: 'warning',
        title: 'Pastikan kamu udah login ',
        timer: 2000
      });
    }
  });

  $('body').on('click', '#btn-wa', function () {
    const id = $(this).data('id');
    var win = window.open('https://api.whatsapp.com/send?phone=' + 6289694273720 + '&text=KONFIRMASI+PESANAN+%3a%0d%0a%0d%0aID+%3a+' + id);
    if (win) {
      win.focus();
    } else {
      alert('Please allow popups for this website');
    }
    return false;
  });
})();
