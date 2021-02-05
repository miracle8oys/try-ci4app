<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail Item</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/<?= $item['foto'] ?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $item['nama']; ?></h5>
                            <h5 class="card-title text-success"><?= $item['kategori']; ?></h5>
                            <h5 class="card-title text-warning">Rp. <?= number_format($item['harga']); ?></h5>
                            <p class="card-text"><?= $item['deskripsi']; ?>.</p>

                            <a href="/item/edit/<?= $item['slug']; ?>" class="btn btn-warning">Edit</a>

                            <form action="/item/<?= $item['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus Data ?')">Delete</button>
                            </form>

                            <br>
                            <a href="/item">Back To List</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>