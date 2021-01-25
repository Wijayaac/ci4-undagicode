<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print</title>
</head>
<body>
    <table class="table table-hover tabel">
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