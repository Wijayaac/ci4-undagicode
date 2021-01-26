<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Product</title>
    <link rel="stylesheet" href="<?= base_url() ?>/dist/css/style.css">
    <style>
        table,
        tr,
        th,
        td {
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

        .table td,
        .table th {
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
                <th scope="col">Book Name</th>
                <th scope="col">Category</th>
                <th scope="col">Writer</th>
                <th scope="col">Publisher</th>
                <th scope="col">Year_Created</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($book as $book) : ?>
                <tr class="master-data">
                    <td><?= $book['book_name'] ?></td>
                    <td><?= $book['id_category'] ?></td>
                    <td><?= $book['writer'] ?></td>
                    <td><?= $book['publisher'] ?></td>
                    <td><?= $book['year_created'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <script>
        window.print();
    </script>
</body>

</html>