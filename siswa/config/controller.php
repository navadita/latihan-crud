<?php
// fungsi tampil data
function select($query)
{
        // panggil database nya YGY
        global $db;

        $result = mysqli_query($db,$query);
        $rows = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
}

// fungsi tambah
function create_siswa($post)
{
    global $db;

    $nama_siswa   = $post['nama_siswa'];
    $jk           = $post['jk'];
    $alamat       = $post['alamat'];
    $nohp         = $post['nohp'];
    $foto         = upload_file();

    // cek upload foto
    if(!$foto) {
        return false;
    }

    // query tambah
    $query = "INSERT INTO data_siswa (nama_siswa, foto, jk, alamat, nohp) VALUES ('$nama_siswa', '$foto', '$jk', '$alamat', '$nohp')";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

// fungsi mengupload file
function upload_file()
{
    $namaFile       = $_FILES['foto']['name'];
    $ukuranFile     = $_FILES['foto']['size'];
    $error          = $_FILES['foto']['error'];
    $tmpName        = $_FILES['foto']['tmp_name'];

    // cek file yang diupload
    $extensifileValid = ['jpg' , 'jpeg' , 'png'];
    $extensifile      = explode('.', $namaFile);
    $extensifile      = strtolower(end($extensifile));

    // cek format/extensi file
    if (!in_array($extensifile, $extensifileValid)){

        // pesan gagal
        echo "<script>
            alert('Format File Tidak Valid');
            document.location.href = 'tambah.php';
            </script>";

            die();
    }

    // cek ukuran file 2 MB
    if($ukuranFile > 2048000){
        // pesan gagal  
        echo "<script>
                alert('Ukuran file max 2MB');
                document.location.href = 'tambah.php';
                </script>";

                die();
    }

    // generate nama file baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensifile;

    // pindahkan ke folder local
    move_uploaded_file($tmpName, 'asset/img/' .$namaFileBaru);
    return $namaFileBaru;

}

// fungsi edit
function update_siswa($post)
{
    global $db;
    
    $id              = $post['id'];                         
    $nama_siswa      = $post['nama_siswa'];
    $jk              = $post['jk'];
    $alamat          = $post['alamat'];
    $nohp            = $post['nohp'];
    $fotoLama        = $post['fotoLama'];

     // cek upload foto baru atau tidak
    if ($_FILES['foto']['error'] == 4) {
        $foto = $fotoLama;
    }
    else {
        $foto = upload_file();
    }

    //query ubah
    $query = "UPDATE data_siswa SET nama_siswa='$nama_siswa', foto='$foto', jk='$jk', alamat='$alamat', nohp='$nohp' WHERE id='$id' ";

    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

// fungsi hapus
function delete_siswa($id){
    global $db;

    // query fungsi hapus data
    $query = "DELETE FROM data_siswa WHERE id=$id";
    
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);

}

?>