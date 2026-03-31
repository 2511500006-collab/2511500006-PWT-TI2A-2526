<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Mata Pelajaran</h1>
            </div>
        </div>
    </div>
</div>

    <?php
    $kd = $_GET['kd'];
    $edit = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_mapel WHERE
    kd_mapel='$kd'"));

    if(isset($_POST['tambah'])){
        $kd_mapel = $_POST['kd_mapel'];
        $nama_mapel = $_POST['nama_mapel'];
        $kkm = $_POST['kkm'];

        $insert = mysqli_query($koneksi, "UPDATE mapel SET nm_mapel='$nm_mapel', kkm='$kkm' WHERE kd_mapel='$kd'");
        if($insert){
            echo '<div class="alert alert-info-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            <h5><i class="icon fas fa-info"></i> info </h5>
            <h4>Berhasil DIsimpan</h4></div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=mapel">';
        }else{
            echo '<div class="alert alert-danger-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            <h5><i class="icon fas fa-ban"></i> Error </h5>
            <h4>Gagal Disimpan</h4></div>';
        }
    }
    ?>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="card-body p-2">
                        <form method="POST" action="">>