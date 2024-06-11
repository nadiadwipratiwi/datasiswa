<?php
session_start();
if(isset($_GET["id"])) {
    $id = $_GET["id"];
    $value = null;
    foreach($_SESSION["datasiswa"] as $key => $data) 
        if($key == $id){
            $value = $data;
        }

    if($value == null){
        header("Location: index.php");
        exit;
    }
}

if(isset($_POST["btn"])) {
    $nama = $_POST["nama"];
    $nis = $_POST["nis"];
    $rayon = $_POST["rayon"];
    
    $_SESSION["datasiswa"][$id] = [
        "nama" => $nama,
        "nis" => $nis,
        "rayon" => $rayon
    ];

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body><center>
<form action="" method="POST">
    <h1 class="mt-4">Edit Data Siswa</h1>
    <div class="row m-3 col-md-8">
        <div class="col">
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama" value="<?= $value["nama"];?>" required>
        </div>
        <div class="col">
            <input type="text" class="form-control" name="nis" id="nis" placeholder="Masukan NIS" value="<?= $value["nis"];?>" required>
        </div>
        <div class="col">
            <input type="text" class="form-control" name="rayon" id="rayon" placeholder="Masukan Rayon" value="<?= $value["rayon"];?>" required>
        </div>
    </div>
    <button type="submit" name="btn" id="btn" class="btn btn-success">Input</button>
    <button class="btn btn-danger"><a href="index.php" class="text-white text-decoration-none">Batal</a></button>
    
</form>
</center></body>
</html>