<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Contact Us</h2>
            <label>Name :</label>
            <?= $name; ?>
            <br>
            <label>Email :</label>
            <?= $email; ?>
            <br>
            <label>Telp :</label>
            <?= $telp; ?>
            <br>
            <?php foreach ($alamat as $amt) : ?>
                <ul>
                    <li><?= $amt['tipe']; ?></li>
                    <li><?= $amt['alamat']; ?></li>
                    <li><?= $amt['provinsi']; ?></li>
                </ul>

            <?php endforeach; ?>


        </div>
    </div>
</div>

<?= $this->endSection(); ?>