<?php
include '../koneksi.php';

    $id = $_POST['id'];
    $nomor_surat = $_POST['nomor_surat'];
    $kategori = $_POST['kategori'];
    $judul = $_POST['judul'];
    $waktu_pengarsipan = date("Y-m-d h:i:sa");

if(isset($_POST['simpan'])){
    extract($_POST);
    $nama_file = $_FILES['file']['name'];

    if(!empty($nama_file)){
        $lokasi_file = $_FILES['file']['tmp_name'];
        $tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
        $file = $judul.".".$tipe_file;

        $folder = "../rekap/$file";
        move_uploaded_file($lokasi_file,"$folder");
    }else{
        $file="-";
    }
    
    $sql = "INSERT INTO surat VALUES('$id','$nomor_surat','$kategori','$judul','$file','$waktu_pengarsipan')";
    $query = mysqli_query($db, $sql);

    header("location:../index.php?p=surat");
}
?>