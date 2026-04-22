<?php

if(!isset($_SESSION['id_user'])){
    echo "<script>window.location='login.php'</script>";
    exit;
}

$id_user = $_SESSION['id_user'];

if(isset($_POST['submit'])){
      $password_lama = $_POST['password_lama'];
      $password_baru = $_POST['password_baru'];
      $konfirmasi    = $_POST['konfirmasi'];

    $query = mysqli_query($koneksi, "SELECT * FROM tabel_user WHERE id_user='$id_user' AND password='$password_lama'");
    
    if(mysqli_num_rows($query) > 0){

        if($password_baru == $konfirmasi){

            mysqli_query($koneksi, "UPDATE tabel_user SET password='$password_baru' WHERE id_user='$id_user'");

            echo "<script>
                    alert('Password berhasil diganti');
                    window.location='index.php';
                  </script>";

        } else {
            echo "<script>alert('Konfirmasi password tidak cocok');</script>";
        }

    } else {
        echo "<script>alert('Password lama salah');</script>";
    }
}
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-6">

      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Ganti Password</h3>
        </div>

        <form method="POST">
          <div class="card-body">

            <div class="form-group">
              <label>Password Lama</label>
              <input type="password" name="password_lama" class="form-control" required>
            </div>

            <div class="form-group">
              <label>Password Baru</label>
              <input type="password" name="password_baru" class="form-control" required>
            </div>

            <div class="form-group">
              <label>Konfirmasi Password</label>
              <input type="password" name="konfirmasi" class="form-control" required>
            </div>

          </div>

          <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-primary">
              Ganti Password
            </button>
          </div>

        </form>

      </div>

    </div>
  </div>
</div>