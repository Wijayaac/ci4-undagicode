<!-- Page for purpose export to excel function, get data from Controller Product, method export -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Product</title>
    <!-- style -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
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
    <?php
    // *PHP built-in method for download the page and export into excel document
    // @first method with params application name and type
    // @second method with params filename of the exported files
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=undagi.xls");
    ?>
    <table class="table">
        <thead class="bg-info">
            <tr>
                <th scope="col">Employee</th>
                <th scope="col">Address</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Gender</th>
            </tr>
        </thead>
        <tbody>
            <!-- Looping data using forEach method -->
            <?php foreach ($employees as $item) : ?>
                <tr class="master-data">
                    <td class="text-capitalize"><?= $item['employee_name'] ?></td>
                    <td class="text-capitalize"><?= $item['address'] ?></td>
                    <td class="text-capitalize"><?= $item['phone'] ?></td>
                    <td class="text-capitalize"><?= $item['email'] ?></td>
                    <td class="text-capitalize"><?= $item['gender'] ?></td>
                </tr>
            <?php endforeach ?>
            <!-- end looping data -->
        </tbody>
    </table>

</body>

</html>