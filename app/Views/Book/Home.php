<?= $this->extend('template/layout') ?>

<?= $this->section('content') ?>
<?php foreach ($books as $book) : ?>
    <h1><?= $book['book_name'] ?></h1>
<?php endforeach ?>
<?= $this->endSection() ?>