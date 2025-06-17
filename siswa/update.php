<?php
if (isset($_POST['update'])) {
    include_once('config.php');
    $id = $_POST['id'];
    $nis = $_POST['nis'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $pob = $_POST['pob'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = preg_replace("/[^a-zA-Z0-9 .,\/]/", "", $_POST['address']);
    $grade_id = $_POST['grade_id'];
    $random = rand();
    $filename = $_FILES['photo']['name'];
    $filename2 = pathinfo($_FILES['photo']['name'], PATHINFO_FILENAME);
    $size = $_FILES['photo']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $extallowed = ['png', 'jpg', 'jpeg', 'gif', 'webp', 'bmp', 'ico', 'svg', 'tiff'];
    if (isset($_POST['photoOk'])) {
        $photoOk = $_POST['photoOk'];
    }
    
    if (!file_exists(($_FILES['photo']['tmp_name'])) || !is_uploaded_file($_FILES['photo']['tmp_name'])) {
        $sql = "UPDATE students SET nis='$nis', name='$name', gender='$gender', pob='$pob', dob='$dob', phone='$phone', email='$email', address='$address', grade_id='$grade_id' WHERE id='$id'";
    } else {
        if (in_array($ext, $extallowed)) {
            if ($size > 10000000) {
                echo "<script>alert('Ukuran file tidak boleh lebih dari 10 MB'); window.location='?m=siswa&s=add';</script>";
            } else {
                $photo = $filename2 . "_" . $random . '.' . $ext;
                if (isset($_POST['photoOk'])) {
                    unlink('images/students/'.$photoOk); // hapus photo lama
                }
                move_uploaded_file($_FILES['photo']['tmp_name'], 'images/students/'.$photo); // tambahkan photo baru
                $sql = "UPDATE students SET nis='$nis', name='$name', gender='$gender', pob='$pob', dob='$dob', phone='$phone', email='$email', address='$address', photo='$photo', grade_id='$grade_id' WHERE id='$id'";
            }
        } else {
            echo "<script>alert('Akhiran file tidak sesuai'); window.location='?m=siswa&s=edit';</script>";
        }
    }

    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: ?m=siswa&s=view");
    } else {
        echo "<script>alert('Data gagal diupdate'); window.location='?m=siswa&s=edit';</script>";
    }
} else {
    echo "Jangan langsung buka file ini. Tambah Data <a href='?m=siswa&s=edit'>Klik disini</a>";
}
