<?php
if (isset($_POST['simpan'])) {
    include_once('config.php');
    $kelas = $_POST['kelas'];
    $kapasitas = $_POST['kapasitas'];
    $terisi = $_POST['terisi'];

    $sql = "INSERT INTO grades (kelas, kapasitas, terisi) VALUES ('$kelas', '$kapasitas', '$terisi')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location: index.php?m=kelas&s=view');
    } else {
        include "index.php";
        echo '<script language="JavaScript">';
            echo 'alert("Data Gagal Ditambahkan.")';
        echo '</script>';
    }
}
