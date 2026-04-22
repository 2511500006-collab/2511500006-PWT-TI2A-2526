<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Kelas</h1>
      </div>
    </div>
  </div>
</div>

<?php
// kode otomatis
$carikode = mysqli_query($koneksi,"SELECT MAX(Id_kelas) FROM tabel_kelas") or die(mysqli_error($koneksi));
$datakode = mysqli_fetch_array($carikode);

if($datakode && $datakode[0] != null){
    $nilaikode = (int)$datakode[0]; // langsung ambil angka
    $kode = $nilaikode + 1;
    $hasilkode = str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
    $hasilkode = "001";
}

$_SESSION["KODE"] = $hasilkode;

// proses simpan
if(isset($_POST['tambah'])){
    $Id_kelas = mysqli_real_escape_string($koneksi, $_POST['Id_kelas']);
    $Nm_kelas = mysqli_real_escape_string($koneksi, $_POST['Nm_kelas']);

     $insert = mysqli_query($koneksi,"INSERT INTO tabel_kelas VALUES ('$Id_kelas','$Nm_kelas')");
        if ($insert){
            echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <h5><i class="icon fas fa-check"></i> Sukses</h5>
            Data berhasil disimpan
            </div>
            <meta http-equiv="refresh" content="1;url=index.php?page=kelas">';
        } else {
            echo '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <h5><i class="icon fas fa-times"></i> Error</h5>
            Gagal menyimpan data
            </div>';
        }
    } else {
        echo '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">x</button>
        Nama kelas tidak boleh kosong
        </div>';
    }

?>

<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <div class="card-body p-2">
          <form method="POST" action="">
            
            <div class="form-group">
              <label>Kode Kelas</label>
              <input type="text" name="Id_kelas" value="<?= $hasilkode; ?>" 
                     class="form-control" readonly>
            </div>

            <div class="form-group">
              <label>Nama Kelas</label>
              <input type="text" name="Nm_kelas" 
                     placeholder="Nama Kelas" class="form-control" required>
            </div>

            <div class="card-footer">
              <input type="submit" class="btn btn-primary" 
                     name="tambah" value="Simpan">
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</section>