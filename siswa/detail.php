<?php

$title = 'Detail Siswa';
include 'layout/header.php';

// mengambil id siswa dari url
$id=(int)$_GET['id'];

$siswa = select ("SELECT * FROM data_siswa WHERE id=$id")[0];

?>
<div class="container mt-5">

    <h1>DETAIL <b><?= $siswa['nama_siswa'];?></b> </h1>
        
    <table class="table table-bordered table-striped mt-3">
        <tr>
        <td>Nama Siswa</td>
        <td>: <?= $siswa['nama_siswa']; ?></td>
        </tr>
        <tr>
        <td>Jenis kelamin</td>
        <td>: <?= $siswa['jk']; ?></td>
        </tr>
        <tr>
        <td>Alamat</td>
        <td>: <?= $siswa['alamat']; ?></td>
        </tr>
        <tr>
        <td>No.HP</td>
        <td>: <?= $siswa['nohp']; ?></td>
        </tr>

        <tr>
        <td width="70%">Foto</td>
    <td>    
        <?="<a href='asset/img/$siswa[foto]';/>"?>          
        <?="<img src='asset/img/$siswa[foto]' width='50%'/>";?>
        
    </td>
        </tr>
    </table>

    <div class="container mt-5">
    
    <div>
<a href="index.php" class="btn btn-secondary" style="float : right">Kembali</a>
</div>
    <?php include 'layout/footer.php';?>