<div id="content" class="p-4 p-md-5 pt-5">
    <div id="label-page" style="padding-bottom:30px;"><h3><b>Arsip Surat >> Unggah</h3></div>

    <div id="content">
    <hr class="sidebar-divider my-0">
        <p>Unggah surat yang telah terbit pada form ini untuk diarsipkan.<br>Catatan : <br> - Gunakan file berformat PDF</p>
    <hr class="sidebar-divider my-0" style="padding-bottom:20px;">

    <div id="content" style="padding-left:20px;padding-bottom:20px;">
	<form action="proses/surat-input-proses.php" method="post" enctype="multipart/form-data">
	<table id="tabel-input">
		<tr>
			<td class="label-formulir"style="padding-bottom:20px">Nomor Surat</td>
			<td class="isian-formulir"><input type="text" name="nomor_surat" class="isian-formulir isian-formulir-border"></td>
		</tr>
		<tr>
        <td class="label-formulir"style="padding-bottom:20px">Kategori</td>
            <td class="isian-formulir" name="kategori">
                <select name="kategori">
                    <option name="myoption1" value="Undangan">Undangan</option>
                    <option name="myoption2" value="Pengumuman">Pengumuman</option>
                    <option name="myoption3" value="Nota Dinas">Nota Dinas</option>
                    <option name="myoption4" value="Pemberitahuan">Pemberitahuan</option>
                </select>
            </td>
        </tr>
		<tr>
			<td class="label-formulir"style="padding-bottom:20px">Judul</td>
			<td class="isian-formulir"><input type="text" name="judul" class="isian-formulir isian-formulir-border"></td>
		</tr>
        <tr>
			<td class="label-formulir"style="padding-bottom:20px">File Surat (PDF)</td>
			<td class="isian-formulir">
                <input type="file" name="file">
            </td>
		</tr>
		<tr>
			<td class="label-formulir"><div class="btn btn-warning"><a href="index.php?p=surat" class="tombol"><font color="white"><< Kembali</font></a></div></td>
			<td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" class="btn btn-info"></td>
		</tr>
	</table>
	</form>
</div></div></div>