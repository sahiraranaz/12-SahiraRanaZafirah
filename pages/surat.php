<div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!-- <h6 class="m-0 font-weight-bold text-primary">Arsip Surat</h6> -->
                            <div id="label-page"><h3><b>Arsip Surat</h3></div>
                            <p style="font-size:13px;">Berikut ini adalah surat-surat yang telah terbit dan diarsipkan. <br>Klik "Lihat" pada kolom aksi untuk menampilkan surat</p>
                        </div><br>

                        <form method="post"class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" style="padding-left:70%;">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2" name="pencarian">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" name="search" value="search">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                        </form>
                        <!-- <div class="form-inline" style="padding-left:20px;">
                            <div class="btn btn-info"><a href="index.php?p=surat-input" class="tombol"><font color="white">Arsipkan</font></a></div>
                        </div> -->
                        <div class="card-body">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Nomor Surat</th>
                                    <th>Kategori</th>
                                    <th>Judul</th>
                                    <th>Waktu Pengarsipan</th>
                                    <th id="label-opsi2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $batas = 5;
                                extract ($_GET);
                                if(empty($hal)){
                                    $posisi = 0;
                                    $hal = 1;
                                    $nomor = 1;
                                }else{
                                    $posisi = ($hal-1)*$batas;
                                    $nomor = $posisi+1;
                                }
                                if($_SERVER['REQUEST_METHOD']=="POST"){
                                    $pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian']));
                                    if($pencarian != ""){
                                        $sql = "SELECT * FROM surat WHERE nomor_surat LIKE '%$pencarian%'
                                        OR id LIKE '%$pencarian%'
                                        OR nomor_surat LIKE '%$pencarian%'
                                        OR kategori LIKE '%$pencarian%'
                                        OR judul LIKE '%$pencarian%'
                                        OR waktu_pengarsipan LIKE '%$pencarian%'";
                                        $query = $sql;
                                        $queryJml = $sql;
                                    } else{
                                        $query= "SELECT * FROM surat LIMIT $posisi, $batas";
                                        $queryJml = "SELECT * FROM surat";
                                        $no = $posisi * 1;
                                    }
                                }
                                else{
                                    $query = "SELECT *FROM surat LIMIT $posisi, $batas";
                                    $queryJml = "SELECT *FROM surat";
                                    $no = $posisi*1;
                                }
                                $q_tampil_surat = mysqli_query($db, $query);
                                if(mysqli_num_rows($q_tampil_surat)>0){
                                    while($r_tampil_surat=mysqli_fetch_array($q_tampil_surat)){
                                        if(empty($r_tampil_surat['file']) or ($r_tampil_surat['file']=='-')){
                                            $file = ".pdf";
                                        }
                                        else{
                                            $file = $r_tampil_surat['file'];
                                        }
                                ?>
                                <tr>
                                    <td><?php echo $r_tampil_surat['nomor_surat'];?></td>
                                    <td><?php echo $r_tampil_surat['kategori'];?></td>
                                    <td><?php echo $r_tampil_surat['judul'];?></td>
                                    <td><?php echo $r_tampil_surat['waktu_pengarsipan'];?></td>
                                    <td>
                                            <div class="btn btn-danger"><a href="proses/surat-hapus.php?id=<?php echo $r_tampil_surat['id'];?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="tombol"><font color="white">Hapus</font></a></div>
                                            <div class="btn btn-info"><a href="http://localhost/projek/rekap/<?php echo $file?>" class="tombol"><font color="white">Unduh</font></a></div>
                                            <div class="btn btn-warning"><a href="index.php?p=surat-detail&id=<?php echo $r_tampil_surat['id'];?>" class="tombol"><font color="white">Lihat >></font></a></div>
                                        </td>
                                    </tr>
                                    <?php
                                    $nomor++;
                                    }
                                }
                                else{
                                    echo "<tr><td colspan=6>Data tidak ditemukan</td></tr>";
                                }
                                ?>
                                </tbody>
                            </table>
                            <?php
                            if(isset($_POST['pencarian'])){
                                if($_POST['pencarian']!=''){
                                    echo "<div style=\"float:left;\">";
                                    $jml = mysqli_num_rows(mysqli_query($db, $queryJml));
                                    echo "Data hasil pencarian: <b>$jml</b>";
                                    echo "</div>";
                                }
                            } else{
                                ?>
                                <div style="float: left;">
                                <?php
                                $jml= mysqli_num_rows(mysqli_query($db, $queryJml));
                                echo "Jumlah data : <b>$jml</b>";
                                ?>
                                </div><br>
                                <div class="pagination">
                                    <?php
                                    $jml_hal = ceil($jml / $batas);
                                    for($i=1; $i<=$jml_hal; $i++){
                                        if($i !=$hal){
                                            echo "<button><a href=\"?p=surat&hal=$i\">$i</a></button>";
                                        }
                                        else{
                                            echo "<button><a class=\"active\">$i</a></button>";
                                        }
                                    }
                                    ?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="form-inline" style="padding-left:20px;padding-bottom:50px;">
                            <div class="btn btn-info"><a href="index.php?p=surat-input" class="tombol"><font color="white">Arsipkan Surat</font></a></div>
                        </div>
                    </div>

                </div>