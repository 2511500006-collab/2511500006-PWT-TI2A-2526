<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Edit Kelas</h1>
      </div>
    </div>
  </div>
</div>

<?php
if(isset($_GET['id'])) {
    $Id_kelas = mysqli_real_escape_string($koneksi, $_GET['id']);

    $query = mysqli_query($koneksi,"SELECT * FROM tabel_kelas WHERE Id_kelas='$Id_kelas'");
    $data = mysqli_fetch_array($query);
} else {
    echo "<script>alert('Kode tidak ditemukan');window.location='index.php?page=kelas';</script>";
    exit;
}

if(isset($_POST['tambah'])){
    $Nm_kelas = mysqli_real_escape_string($koneksi, $_POST['Nm_kelas']);

    $update = mysqli_query($koneksi,
        "UPDATE tabel_kelas 
         SET Nm_kelas='$Nm_kelas' 
         WHERE Id_kelas='$Id_kelas'"
    );

    if($update){
        echo '<div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <h5><i class="icon fas fa-info"></i> Info</h5>
        <h4>Berhasil Disimpan</h4></div>
        <meta http-equiv="refresh" content="1;url=index.php?page=kelas">';
    } else {
        echo '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <h5><i class="icon fas fa-info"></i> Info</h5>
        <h4>Gagal Disimpan</h4></div>';
    }
}
?>

<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body p-2">

        <form method="POST">

          <div class="form-group">
            <label>Kode Kelas</label>
            <input type="text" name="Id_kelas" 
                   value="<?= $data['Id_kelas']; ?>" 
                   class="form-control" readonly>
          </div>

          <div class="form-group">
            <label>Nama Kelas</label>
            <input type="text" name="Nm_kelas" 
                   value="<?= $data['Nm_kelas']; ?>" 
                   class="form-control" required>
          </div>

          <div class="card-footer">
            <input type="submit" class="btn btn-primary" 
                   name="tambah" value="Simpan">
          </div>

        </form>

      </div>
    </div>
  </div>
</section>