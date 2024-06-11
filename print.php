<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
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
<table class="container text-center mt-4 mb-3">
    <tr class="bg-warning-subtle col">
        <th>Nama</th>
        <th>NIS</th>
        <th>Rayon</th>
    </tr>
    <?php if(isset($_SESSION["datasiswa"]) && is_array($_SESSION["datasiswa"])):?>
    <?php foreach($_SESSION["datasiswa"] as $key => $data) :?>
    <tr style="background-color: #f2f2f2">
        <td><?= htmlspecialchars($data["nama"]);?></td>
        <td><?= htmlspecialchars($data["nis"]);?></td>
        <td><?= htmlspecialchars($data["rayon"]);?></td>
    </tr>
    <?php endforeach;?>
    <?php endif;?>
    </table>
    <button type="button" class="btn btn-success" id="btn">Print</button>
    <button class="btn btn-danger"><a href="index.php" class="text-white text-decoration-none">Back</a></button>

    <script>
        document.getElementById("btn").addEventListener("click", function(){
            window.print();
        })
    </script>
</center></body>
</html>