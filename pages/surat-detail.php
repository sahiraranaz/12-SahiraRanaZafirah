<?php 
    $id = $_GET['id'];
    $q_tampil_surat = mysqli_query($db, "SELECT * FROM surat WHERE id = '$id'");
    $r_tampil_surat = mysqli_fetch_array($q_tampil_surat);

    if (empty($r_tampil_surat['file']) or ($r_tampil_surat['file'] == '-')) {
        $file = ".pdf";
    } else {
        $file = $r_tampil_surat['file'];
    }
?>
<div id="content" class="p-4 p-md-5 pt-5">
    <div id="label-page"><h3><b>Arsip Surat >> Lihat</h3></div>
    <div id="content" style="padding-left:20px;padding-bottom:50px;padding-top:30px;">
        <hr class="sidebar-divider my-0">
            <td>Nomor Surat : <?php echo $r_tampil_surat['nomor_surat'];?></td><br>
            <td>Kategori    : <?php echo $r_tampil_surat['kategori'];?></td><br>
            <td>Judul       : <?php echo $r_tampil_surat['judul'];?></td><br>
            <td>Waktu Arsip : <?php echo $r_tampil_surat['waktu_pengarsipan'];?></td>
        <hr class="sidebar-divider my-0" style="padding-bottom:30px;">
        <iframe src="rekap/<?php echo $file;?>" style="width: 100%;height: 500px;"></iframe>
    </div>
    <div class="btn btn-warning"><a href="index.php?p=surat" class="tombol"><font color="white"><< Kembali</font></a></div>
    <div class="btn btn-info"><a href="http://localhost/projek/rekap/<?php echo $file?>" class="tombol"><font color="white">Unduh</font></a></div>
</div>