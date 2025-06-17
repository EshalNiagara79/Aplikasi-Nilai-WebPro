<?php
if (isset($_POST['update'])) {
    include_once('config.php');
    $id = $_POST['id'];
    $kelas = $_POST['kelas'];
    $kapasitas = $_POST['kapasitas'];
    $terisi = $_POST['terisi'];

    $sql = "UPDATE kelas SET kelas='$kelas', kapasitas='$kapasitas', terisi='$terisi' WHERE id='$id'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        header('location: index.php?m=kelas&s=view');
    } else {
        include "index.php?m=kelas&s=view";
        echo '<script language="JavaScript">';
            echo 'alert("Data Gagal Ditambahkan.")';
        echo '</script>';
    }
}
