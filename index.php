<?php
include "f.php";
$con = kone();
// $sql2 = "SELECT category.* , penghubung.id_category as ic , penghubung.id_user as iu  FROM category, inner join penghubung on  category.id = penghubung.id_category where penghubung.id_user = user.id";
// // WHERE A.CustomerID <> B.CustomerID";
// $statemen = $con->prepare($sql2);
// $statemen->execute();
// $us = $statemen->fetchAll();

$sq = "SELECT * FROM user";
$statemen = $con->prepare($sq);
$statemen->execute();
$pe = $statemen->fetchAll();

$i = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <title>Document</title>
    <table class="table table-bordered border-primary">
        <thead>
            <tr>
                <th>no</th>
                <th>object</th>
                <th>category</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pe as $u) :
                $s = $u['id'];
                $sql2 = "SELECT category.* , penghubung.id_category as ic , penghubung.id_user as iu  FROM category inner join penghubung on  category.id = penghubung.id_category where penghubung.id_user = $s";
                $statemen = $con->prepare($sql2);
                $statemen->execute();
                $us = $statemen->fetchAll(); ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $u['nama'] ?></td>
                    <td>
                        <?php foreach ($us as $un) : ?>
                            -<?= $un['category'] ?><br>
                        <?php endforeach ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</head>

<body>

</body>

</html>