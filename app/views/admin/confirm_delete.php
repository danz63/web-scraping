<form class="form" action="<?= base_url('url/delete') ?>" method="POST" style="margin-top: 50px;">
    <input type="hidden" value="<?= $dataUrl['id_url'] ?>" name="id">
    <h3>Anda yakin menghapus data dengan detail </h3>
    <div class="container" style="margin-top: 15px;">
        <table class="table table-bordered">
            <tr>
                <td>ID</td>
                <td>:</td>
                <td><?= $dataUrl['id_url'] ?></td>
            </tr>
            <tr>
                <td>URL</td>
                <td>:</td>
                <td><?= $dataUrl['url'] ?></td>
            </tr>
            <tr>
                <td>Lokasi</td>
                <td>:</td>
                <td><?= $dataUrl['lokasi'] ?></td>
            </tr>
        </table>
    </div>
    <div class="form-group form-button">
        <a href="<?= base_url('url/index') ?>">
            <button type="button" class="form-submit">Kembali</button>
        </a>
        <button type="submit" name="update" class="form-submit">Yakin</button>
    </div>
</form>