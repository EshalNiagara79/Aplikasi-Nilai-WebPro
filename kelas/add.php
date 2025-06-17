<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header row">
                <div class="card-title h3 col-8">Tambah Kelas</div>
                <div class="col-4">
                    <a href="?m=kelas&s=view" class="btn btn-lg btn-primary float-end">Kembali</a>
                </div>
            </div>

            <div class="card-body">
                <form action="?m=kelas&s=save" method="post">
                    <div class="mb-3">
                        <input type="text" name="kelas" class="form-control" placeholder="Nama Kelas" required autofocus>
                    </div>
                    <div class="mb-3">
                        <input type="number" name="kapasitas" class="form-control" placeholder="Kapasitas" required>
                    </div>
                    <div class="mb-3">
                        <input type="number" name="terisi" class="form-control" placeholder="Terisi" required>
                    </div>
                    <div class="mb-3">
                        <input type="reset" class="btn btn-secondary">&nbsp;
                        <input type="submit" value="Simpan" name="simpan" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
