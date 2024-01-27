<?php

$title = 'TABEL DATA SISWA';
include 'layout/header.php';

$siswa = select("SELECT * FROM data_siswa");

?>
<div class="">

    <h1 align="center">DATA SISWA</h1>

    <a href="tambah.php" class="btn btn-primary mb-1" ><i class="fas fa-plus-circle"></i> Tambah Data</a>
    
    <table class="table table-bordered table-striped" id="tabel" align="center">
        <thead style="background-color: light">
            <tr>
                <th style="width:auto" >NO</th>
                <th style="width:auto" >Nama siswa</th>
                <th style="width:auto" >Foto</th>
                <th colspan="3" style="width:auto">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($siswa as $data): ?>
                <tr>
                    <td>
                        <?= $no++; ?>
                    </td>
                    <td><?= $data['nama_siswa'] ?></td>
                    <td align="center"> <?="<img src='asset/img/$data[foto]' width='20%'/>";?> </td>
                    <td width="25%" class="text-center">

                    <!-- tombol -->
                        <a href="detail.php?id=<?= $data['id']; ?>" class="btn btn-info"><i class="fa fa-info-circle"></i>&nbsp;Detail</a>                
                        <a href="edit.php?id=<?= $data['id']; ?>" class="btn btn-success"><i class="fa fa-edit"></i>Edit</a>                        
                        <a href="hapus.php?id=<?= $data['id']; ?>" class="btn btn-danger" onclick="return confirm('YAKINNN??? 🤨');"><i class="fas fa-trash"></i> Delete</a>
                    
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
<?php include 'layout/footer.php'; ?>