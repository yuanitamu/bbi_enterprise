<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//function to show message / aler
function warn_msg($param) {
    return '
       <div class="alert alert-warning">
            <strong>This is a warning!</strong> <br>' . $param . '
        </div>
    ';
}

function succ_msg($param) {
    return '
        <div class="alert alert-success">
            <strong>All ok, that is great!</strong> <br>' . $param . '
        </div>
    ';
}

function err_msg($param) {
    return '
        <div class="alert alert-eror">
            <strong>Something went wrong!</strong> <br>' . $param . '
        </div>
    ';
}

//membuat format tanggal Indonesia
function TanggalIndo($date) {
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl = substr($date, 8, 2);

    $result = $tgl . " " . $BulanIndo[(int) $bulan - 1] . " " . $tahun;
    return($result);
}

//membuat format menjadi rupiah
function format_rupiah($angka) {
    $jadi = "Rp " . number_format((double) $angka, 2, ',', '.');
    return $jadi;
}

// untuk KRIPTOGRAFI
define('CLASS_ENCRYPT', dirname(__FILE__));
include('cryptography/AES.class.php');
include('cryptography/class.hash_crypt.php');

// $keypass=md5('inv'.md5('store'));
// $key1=md5('inv');

function keypass() {
    return md5('inv' . md5('store'));
}

function paramEncrypt($x) {

    $first_output = '';
    $count = 0;


    $Cipher = new AES();
    $key_256bit = keypass();

    $n = ceil(strlen($x) / 16);
    $encrypt = "";

    for ($i = 0; $i <= $n - 1; $i++) {
        $cryptext = $Cipher->encrypt($Cipher->stringToHex(substr($x, $i * 16, 16)), $key_256bit);
        $encrypt .= $cryptext;
    }

    return $encrypt;
}

function paramDecrypt($x) {
    $Cipher = new AES();
    $key_256bit = keypass();

    $n = ceil(strlen($x) / 32);
    $decrypt = "";

    for ($i = 0; $i <= $n - 1; $i++) {
        $result = $Cipher->decrypt(substr($x, $i * 32, 32), $key_256bit);
        $decrypt .= $Cipher->hexToString($result);
    }

    return $decrypt;
}

function decode($x) {

    $pecahURI = explode('?', $x);
    $parameter = $pecahURI[1];

    $pecahParam = explode('&', paramDecrypt($parameter));

    for ($i = 0; $i <= count($pecahParam) - 1; $i++) {
        $decode = explode('=', $pecahParam[$i]);
        $var[$decode[0]] = $decode[1];
    }

    return $var;
}

function encoder($x) {
    $value = new hash_encryption($keypass1);
    $first = $value->encrypt($x);

    $first_output = '';
    $count = 0;

    while ($count < strlen($encrypted)) {
        $enc_output .= substr($first, $count, 80) . "<br>";
        $count+=80;
    }

    $Cipher = new AES();
    $key_256bit = $keypass;

    $n = ceil(strlen($first) / 16);
    $encrypt = "";

    for ($i = 0; $i <= $n - 1; $i++) {
        $cryptext = $Cipher->encrypt($Cipher->stringToHex(substr($first, $i * 16, 16)), $key_256bit);
        $encrypt .= $cryptext;
    }

    return $encrypt;
}

function decoder($x) {
    $Cipher = new AES();
    $key_256bit = keypass();

    $n = ceil(strlen($x) / 32);
    $decrypt = "";

    for ($i = 0; $i <= $n - 1; $i++) {
        $result = $Cipher->decrypt(substr($x, $i * 32, 32), $key_256bit);
        $decrypt .= $Cipher->hexToString($result);
    }

    $value = new hash_encryption('');
    $decrypted = $value->decrypt($decrypt);

    return $decrypted;
}