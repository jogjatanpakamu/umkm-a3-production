<?php


function getPesanan()
{

    return json_decode(file_get_contents(__DIR__ . '/data/dataPesanan.json'), false);
}

function insertPesanan($data)
{

    $pesid = $_COOKIE['log'];
    $id = rand(1000000, 2000000);
    $produk_id = $data['produk_id'];
    $tgl_pesan = date('Y-m-d');
    $nama_pemesan = $data['nama_pemesan'];
    $email = $data['email'];
    $telpon = $data['telpon'];
    $status = 0;
    $bukti_bayar = '';
    $catatan = $data['catatan'];

    $koneksi = new mysqli('localhost', 'root', '', 'sablon');
    $sql = "INSERT INTO pesanan(id, produk_id,user_id, tgl_pesan, nama_pemesan, email, telpon, `status`, bukti_bayar, catatan) 
            values('$id','$produk_id','$pesid', '$tgl_pesan','$nama_pemesan','$email','$telpon','$status','$bukti_bayar','$catatan')";
    $r = mysqli_query($koneksi, $sql);
    return $r;
}


if (isset($_POST['code'])) {

    if ($_POST['code'] == 'create') {
        insertPesanan($_POST);
    }
}
