<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <a class="btn btn-primary mt-3" href="/item/create">Tambah Item</a>

            <h1 mt-3>Daftar Item</h1>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n = 1; ?>
                    <?php foreach ($item as $i) : ?>
                        <tr>
                            <th scope="row"><?= $n++; ?></th>
                            <td><img src="/img/<?= $i['foto'] ?>" alt="" class="foto"> </td>
                            <td><?= $i['nama']; ?></td>
                            <td>
                                <a href="/item/<?= $i['slug']; ?>" class="btn btn-primary">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>