<?php 
    include '../koneksi.php';

    $id = $_POST['id'];
    $nomor_surat = $_POST['nomor_surat'];
    $kategori = $_POST['kategori'];
    $judul = $_POST['judul'];
    $waktu_pengarsipan = $_POST['waktu_pengarsipan'];

    if (isset($_POST['simpan'])) {
        extract($_POST);

        mysqli_query($db, "UPDATE surat
                            SET nomor_surat='$nomor_surat', kategori='$kategori', judul='$judul', waktu_pengarsipan='$waktu_pengarsipan'
                            WHERE id = '$id'");

        header("location:../index.php?p=surat");
    }
?>