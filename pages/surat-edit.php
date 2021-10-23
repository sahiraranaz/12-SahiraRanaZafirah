<?php 
    $id = $_GET['id'];
    $q_tampil_surat = mysqli_query($db, "SELECT * FROM surat WHERE id = '$id'");
    $r_tampil_surat = mysqli_fetch_array($q_tampil_surat);
?>
<div id="content" class="p-4 p-md-5 pt-5">
    <div id="label-page"><h3><b>Surat Edit</h3></div>
    <div id="content">
    <div id="content" style="padding-left:20px;padding-bottom:20px;">
	<form action="proses/surat-edit-proses.php" method="post" enctype="multipart/form-data">
	<table id="tabel-input">
		<tr>
			<td class="label-formulir"style="padding-bottom:30px">Nomor Surat</td>
			<td class="isian-formulir"><input type="text" name="nomor_surat" class="isian-formulir isian-formulir-border" value="<?php echo $r_tampil_surat['nomor_surat'];?>"readonly="readonly"></td>
		</tr>
        <tr>
			<td class="label-formulir"style="padding-bottom:30px">Kategori</td>
			<td class="isian-formulir"><input type="text" name="kategori" class="isian-formulir isian-formulir-border" value="<?php echo $r_tampil_surat['kategori'];?>"readonly="readonly"></td>
		</tr>
		<tr>
			<td class="label-formulir"style="padding-bottom:30px">Judul</td>
			<td class="isian-formulir"><input type="text" name="judul" class="isian-formulir isian-formulir-border" value="<?php echo $r_tampil_surat['judul'];?>"></td>
		</tr>
        <tr>
			<td class="label-formulir"style="padding-bottom:30px">Waktu Arsip</td>
			<td class="isian-formulir"><input type="text" name="waktu_pengarsipan" class="isian-formulir isian-formulir-border" value="<?php echo $r_tampil_surat['waktu_pengarsipan'];?>" readonly="readonly"></td>
		</tr>
        <tr>
			<td class="label-formulir"style="padding-bottom:30px">File Surat (PDF)</td>
			<td class="isian-formulir" value="<?php echo $r_tampil_surat['kategori'];?>">
                <input type="file" id="myfile" name="kategori"></td>
		    </tr>
		<tr>
			<td class="label-formulir"></td>
			<td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" class="btn btn-info"></td>
		</tr>
	</table>
	</form>
</div></div></div>