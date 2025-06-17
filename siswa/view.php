<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header row">
                <div class="card-title h3 col-8">Data Siswa</div>
                <div class="col-4">
                    <a href="?m=siswa&s=add" class="btn btn-lg btn-primary float-end">Tambah</a>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Kelas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once('config.php');
                        $sql = "SELECT students.id AS ids, students.*, grades.* FROM students JOIN grades ON students.grade_id = grades.id";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0 ) {
                            $no = 1;
                            while ($r = mysqli_fetch_assoc($result)) {
                                echo '<tr>
                                    <td>'.$no.'</td>
                                    <td>'.$r['nis'].'</td>
                                    <td>'.$r['name'].'</td>
                                    <td>'.$r['gender'].'</td>
                                    <td>'. date('d F Y', strtotime($r['dob'])) .'</td>
                                    <td>'.$r['phone'].'</td>
                                    <td>'.$r['email'].'</td>
                                    <td>'.$r['address'].'</td>
                                    <td>'.$r['grade_id'].'</td>
                                    <td>
                                        <a href="?m=siswa&s=detail&id='.$r['ids'].'" class="btn btn-info btn-sm">Lihat</a>
                                        <a href="?m=siswa&s=edit&id='.$r['ids'].'" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="?m=siswa&s=delete&id='.$r['ids'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin siswa akan dihapus?\')">Hapus</a>
                                    </td>
                                </tr>';
                                $no++;
                            }
                        } else {
                            echo "<tr>
                                <td colspan='11' align='center'>Data Kosong</td>
                                </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
