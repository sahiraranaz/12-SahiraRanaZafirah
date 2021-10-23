<?php
include '../koneksi.php';

$id_buku = $_GET['id'];

mysqli_query($db, "DELETE FROM surat WHERE id = '$id_buku'") or die(mysql_error());

header("location:../index.php?p=surat");
?>