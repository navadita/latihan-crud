<?php

$title = 'TAMBAH DATA SISWA';
include 'layout/header.php';


// check tombol
if (isset($_POST['tambah'])) {
    if (create_siswa($_POST) > 0) {
        echo "<script>
        alert('Data berhasil di tambahkan 😁👍');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script> 
        alert('Data  gagal di tambahkan :(');
        document.location.href = 'index.php';
        </script>";
    }
}
?>

<div class = 'container mt-5'>
<h1>Tambah Data Siswa</h1>

<form action = "" method = "post" enctype = "multipart/form-data">

<div class = "mb-3">
    <label for = "nama_siswa" class = "form-label">Nama Siswa</label>
    <input type = "text" class = "form-control" id = "nama_siswa" name = "nama_siswa">
</div>
<div class = "mb-3">
    <label for = "alamat" class = "form-label">Alamat</label>
    <input type = "text" class = "form-control" id = "alamat" name = "alamat">
</div>
<div class = "mb-3">
    <label for = "nohp" class = "form-label">No.HP</label>
    <input type = "text" class = "form-control" id = "nohp" name = "nohp">
</div>
<div class ="mb-3">
    <label for = "jk" class = "form-label">Jenis Kelamin:</label>
        <select name = "jk" id = "jk" class = "form-control">
        <option value = "Pilihan">Pilihan</option>
        <option value = "Laki-Laki">Laki-Laki</option>
        <option value = "Perempuan">Perempuan</option>
        </select>
</div>

<div class = "mb-3">
    <label for = "foto" class = "form-label">Foto Siswa</label>
    <input type = "file" class = "form-control" id = "foto" name = "foto" onchange="previewImg()">
<p>
    <small>Preview Gambar 👇📌</small>
</p>
<img src="" alt="" class="img-thumbnail img-preview" width="100px">
</div>

<div>
    <button type = "submit" name = "tambah" class = "btn btn-primary" style = "float : right">Tambah</button>
    <a href = "index.php" class = "btn btn-secondary" style = "float : left">Kembali</a>
</div>

</form>

</div>
</form>

<!-- preview image -->
<script>
    function previewImg() {
        const foto = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');

        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);

        fileFoto.onload =function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>

<?php
include 'layout/footer.php';
?>