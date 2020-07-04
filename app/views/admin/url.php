<div class="container" style="margin-top:25px; padding-top:15px; overflow-x:auto;">
    <a href="<?= base_url('url/form') ?>" class="btn">+ Tambah Data</a>
    <table class="table table-bordered table-striped" style="margin-top:25px;">
        <?php if (count($dataUrl) > 0) : ?>
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">URL</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Latest Scraped</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dataUrl as $index => $row) : ?>
                    <tr>
                        <th scope="row"><?= $index + 1; ?></th>
                        <td style="color:#0066CC; text-decoration:underline;"><?= $row['url'] ?></td>
                        <td><?= $row['lokasi'] ?></td>
                        <td><?= date('d-m-Y', strtotime($row['last_scraped'])) ?></td>
                        <td>
                            <a href="<?= base_url('url/form/' . $row['id_url']) ?>" class="badge badge-warning">edit</a>
                            <a href="<?= base_url('url/confirm_delete/' . $row['id_url']) ?>" class="badge badge-danger">hapus</a>
                            <?php $href = $row['last_scraped'] == date('Y-m-d') ? "#" : base_url('scraper/scraping/' . $row['id_url']); ?>
                            <a href="<?= $href ?>" class="badge <?= $href == '#' ? 'badge-secondary disabled' : 'badge-primary' ?>">scrap</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        <?php else : ?>
            <thead>
                <tr>
                    <td colspan="5">
                        <h4 style="text-align: center;">Data Url Kosong</h4>
                    </td>
                </tr>
            </thead>
        <?php endif; ?>
    </table>
</div>