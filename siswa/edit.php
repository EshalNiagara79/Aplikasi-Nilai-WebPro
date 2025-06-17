<style>
    label {
        font-weight: bold;
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header row">
                <div class="card-title h3 col-8">Edit Data Siswa</div>
                <div class="col-4">
                    <a href="?m=siswa&s=view" class="btn btn-lg btn-primary float-end">Kembali</a>
                </div>
            </div>

            <?php
            include_once('config.php');
            $id = $_GET['id'];
            $sql = "SELECT * FROM students WHERE id='$id'";
            $result = mysqli_query($conn, $sql);
            $r = mysqli_fetch_assoc($result);
            ?>
            <div class="card-body">
                <form action="?m=siswa&s=update" method="post" enctype="multipart/form-data">
                    <div class="mb-2">
                        <label for="">Nomor Induk Siswa</label>
                        <input type="text" class="form-control" name="nis" value="<?= $r['nis'] ?>" placeholder="Nomor Induk Siswa" required autofocus>
                    </div>
                    <div class="mb-2">
                        <label for="">Nama Siswa</label>
                        <input type="text" class="form-control" name="name" value="<?= $r['name'] ?>" placeholder="Nama Siswa" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Jenis Kelamin: &nbsp;</label>
                        <input type="radio" name="gender" value="Laki-laki" <?= $r['gender'] == 'Laki-laki' ? 'checked' : '' ?>> Laki-laki &nbsp;
                        <input type="radio" name="gender" value="Perempuan" <?= $r['gender'] == 'Perempuan' ? 'checked' : '' ?>> Perempuan
                    </div>
                    <div class="mb-2">
                        <label for="">Tempat Lahir</label>
                        <input type="text" class="form-control" name="pob" value="<?= $r['pob'] ?>" placeholder="Tempat Lahir (isi dengan nama Kabupaten/Kota)">
                    </div>
                    <div class="mb-2">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="dob" value="<?= $r['dob'] ?>" placeholder="Tanggal Lahir">
                    </div>
                    <div class="mb-2">
                        <label for="">Telepon</label>
                        <input type="text" class="form-control" name="phone" value="<?= $r['phone'] ?>" placeholder="Telepon">
                    </div>
                    <div class="mb-2">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" value="<?= $r['email'] ?>" placeholder="Email">
                    </div>
                    <div class="mb-2">
                        <label for="">Alamat</label>
                        <textarea name="address" class="form-control" value="<?= $r['address'] ?>" placeholder="Alamat"></textarea>
                    </div>
                    <div class="mb-2">
                        <label for="">Kelas</label>
                        <select name="grade_id" class="form-control" required>
                            <option value="">Pilih Kelas</option>
                            <?php
                            include_once("config.php");
                            $sql = "SELECT * FROM grades";
                            $result = mysqli_query($conn, $sql);
                            while ($r1 = mysqli_fetch_assoc($result)) {
                                echo '<option value="'.$r1['id'].'" '.($r['grade_id'] == $r1['id'] ? 'selected' : '').'>'.$r1['grade'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                     <div class="mb-2">
                        <label for="">Foto</label><br>
                        <?php
                        if (isset($r['photo']) && $r['photo'] != '') { ?>
                            <img src="images/students/<?= $r['photo'] ?>" class="img-fluid" alt="<?= $r['name'] ?>" width="400px" title="<?= $r['name'] ?>">
                            <input type="hidden"  name="photoOk" value="<?= $r['photo'] ?>">
                        <?php } else { ?>
                             Tidak ada Foto
                        <?php } ?>
                    </div>
                     <div class="mb-4">
                        <label for="">Ganti Foto</label>
                        <input type="file" class="form-control" name="photo" accept="image/*">
                    </div>
                    <div class="mb-4">
                        <input type="hidden" name="id" value="<?= $r['id'] ?>">
                        <input type="submit" value="Update" class="btn btn-primary" name="update">
                        <input type="reset" class="btn btn-warning" style="float: right">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
