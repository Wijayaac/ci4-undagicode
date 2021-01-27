<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Product</title>
    <!-- style -->
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
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Weight</th>
                <th scope="col">Category</th>
                <th scope="col">Tag</th>
                <th scope="col">Stock</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Seller</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $item) : ?>
                <tr class="master-data">
                    <td class="text-capitalize"><?= $item['product_name'] ?></td>
                    <td class="text-capitalize"><?= $item['price'] ?></td>
                    <td class="text-capitalize"><?= $item['weight'] ?></td>
                    <td class="text-capitalize"><?= $item['category'] ?></td>
                    <td class="text-capitalize"><?= $item['tag'] ?></td>
                    <td class="text-capitalize"><?= $item['stock'] ?></td>
                    <td class="text-capitalize"><?= $item['description'] ?></td>
                    <td class="text-capitalize"><?= $item['image'] ?></td>
                    <td class="text-capitalize"><?= $item['seller'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <script>
        window.print();
    </script>
</body>

</html>