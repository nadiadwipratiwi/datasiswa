<?php
session_start();
$buttonPrint = null;
$buttonHapus = null;

if(isset($_SESSION["datasiswa"]) && !empty($_SESSION["datasiswa"])) {
    $buttonPrint = '<button class="btn btn-success"><a href="print.php" class="text-white text-decoration-none">Cetak</a></button>';
    $buttonHapus = '<button class="btn btn-danger"><a href="delete-all.php" class="text-white text-decoration-none">Hapus</a></button>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Data Siswa</title>
</head>

<style>
        /* table {
            width: 50%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 18px;
            text-align: left;
        } */
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }
        /* th {
            background-color: #f2f2f2;
        } */
</style>

<body><center>
    <form action="" method="POST">
        <h1 class="mt-4">
           Masukan Data Siswa
        </h1>
        <div class="row m-3 col-md-5">
            <div class="col">
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama" required>
            </div>
            <div class="col">
                <input type="text" class="form-control" name="nis" placeholder="Masukan NIS" required>
            </div>
            <div class="col">
                <input type="text" class="form-control" name="rayon" placeholder="Masukan Rayon" required>
            </div>
        </div>

        <div>
            <button type="submit" class="btn btn-primary" name="btn" id="btn">Tambah</button>
            <?= $buttonPrint ;?>
            <?= $buttonHapus ;?>
            <?php
                if (isset($_POST["btn"])) {
                    $nama = $_POST["nama"];
                    $nis = $_POST["nis"];
                    $rayon = $_POST["rayon"];
                    $dataAwal = false;
                    
                    if(isset($_SESSION["datasiswa"])) {
                        foreach($_SESSION["datasiswa"] as $data) {
                            if($data["nama"] == $nama){
                                $dataAwal = true;
                                break;
                            }
                        }
                    }
                
                    if($dataAwal) {
                        echo "<h4 class='mt-3'>Data Sudah Ada!</h4>";
                    } else {
                        $_SESSION["datasiswa"][] = [
                            "nama" => $nama,
                            "nis" => $nis,
                            "rayon" => $rayon,
                        ];
                        echo "<h4 class='mt-3'>Data Berhasil Ditambahkan!</h4>";
                    }
                }
            ?>
        </div>
    </form>

    <table class="container text-center mt-3">
    <tr class="bg-warning-subtle col">
        <th>No</th>
        <th>Nama</th>
        <th>NIS</th>
        <th>Rayon</th>
        <th>Aksi</th>
    </tr>
    <?php $i = 1;?>
    <?php if(isset($_SESSION["datasiswa"]) && is_array($_SESSION["datasiswa"])):?>
    <?php foreach($_SESSION["datasiswa"] as $key => $data) :?>
    <tr style="background-color: #f2f2f2">
        <td><?= $i++ ;?></td>
        <td><?= htmlspecialchars($data["nama"]);?></td>
        <td><?= htmlspecialchars($data["nis"]);?></td>
        <td><?= htmlspecialchars($data["rayon"]);?></td>
        <td>
            <a href="edit.php?id=<?= $key ;?>" class="btn btn-warning">Edit</a>
            <a href="detail.php?id=<?= $key ;?>" class="btn btn-success gap-2">Detail</a>
            <a href="delete.php?id=<?= $key ;?>" class="btn btn-danger">Hapus</a>
        </td>
    </tr>
    <?php endforeach;?>
    <?php endif;?>
    </table>
</center></body>
</html>