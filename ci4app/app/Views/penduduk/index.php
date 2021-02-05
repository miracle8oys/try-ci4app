<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 mt-3>Data Penduduk</h1>
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="keyword.." name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="submit">Cari</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <div class="row">
        <div class="col">



            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n = 1 + (5 * ($currenPage - 1)); ?>
                    <?php foreach ($penduduk as $i) : ?>
                        <tr>
                            <th scope="row"><?= $n++; ?></th>
                            <td><?= $i['nama']; ?></td>
                            <td><?= $i['alamat']; ?></td>
                            <td>
                                <a class="btn btn-primary">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <?= $pager->links('penduduk', 'penduduk_pagination'); ?>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>