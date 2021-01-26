<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Product</title><!-- style -->
    <link rel="stylesheet" href="<?= base_url() ?>/dist/css/style.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> -->
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <style type="text/css" media="print">@import url("/inc/web.print.css");</style>
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <style>
        table,tr,th,td{
            border: 0.5px solid black;
            border-spacing: 0px !important;
        }
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }
        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }
        .table td, .table th {
            padding: .5rem;
            vertical-align: top;
            border-top: 1px solid black;
        }
    </style>
</head>
<body>
    <table class="table">
        <thead class="bg-info">
            <tr>
                <th scope="col">text</th>
                <th scope="col">checkbox</th>
                <th scope="col">date</th>
                <th scope="col">email</th>
                <th scope="col">image</th>
                <th scope="col">textbox</th>
                <th scope="col">price</th>
                <th scope="col">password</th>
                <th scope="col">radio</th>
                <th scope="col">url</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($product->getResult() as $item) : ?>
            <tr class="master-data">
                <td><?= $item->text ?></td>
                <td><?= $item->checkbox ?></td>
                <td><?= $item->date ?></td>
                <td><?= $item->email ?></td>
                <td><?= $item->image ?></td>
                <td><?= $item->textbox ?></td>
                <td><?= $item->price ?></td>
                <td><?= $item->password ?></td>
                <td><?= $item->radio ?></td>
                <td><?= $item->url ?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>

    <script>
        window.print();
    </script>
</body>
</html>