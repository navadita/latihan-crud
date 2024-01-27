<?php

include 'config/app.php';

// menerima id pengguna
$id = (int)$_GET['id'];

if (delete_siswa($id) > 0 ){
    echo "<script>
    alert('Yeayy Data berhasil di hapuss 👏🗿');
    document.location.href = 'index.php';
    </script>";
} else {
    echo "<script>
    alert('Data gagal dihapus :(');
    document.location.href = 'index.php';
    </script>";
}