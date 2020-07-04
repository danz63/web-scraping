<?php
$button = $action == 'insert' ? 'Tambah' : 'Update';
$stat = $action == 'insert' ? 'required' : '';
?>
<form class="form" action="<?= base_url('Url/' . $action) ?>" method="POST" style="margin-top: 50px;" enctype="multipart/form-data">
    <h3>Form <?= $button ?> URL</h3>
    <div class="form-group" style="margin-top: 25px;">
        <label for="id_url"><img src="<?= $icon_form['ID'] ?>"></img></label>
        <input type="text" name="id_url" id="id_url" value="<?= $data_url['id_url'] ?>" readonly>
    </div>
    <div class="form-group">
        <label for="url"><img src="<?= $icon_form['DB'] ?>"></img></label>
        <input type="text" name="url" id="url" placeholder="URL" autocomplete="off" value="<?= $data_url['url'] ?>">
    </div>
    <div class="form-group">
        <label for="lokasi"><img src="<?= $icon_form['Loc'] ?>"></img></label>
        <input type="lokasi" name="lokasi" id="lokasi" placeholder="Lokasi" autocomplete="off" value="<?= $data_url['lokasi'] ?>">
    </div>
    <div class="form-group">
        <label for="file"><img src="<?= $icon_form['Code'] ?>"></img></label>
        <input type="file" name="file" id="file" autocomplete="off" <?= $stat ?>>
        <input type="hidden" value="<?= $data_url['script_loc'] ?>" name="script_loc">
    </div>
    <div class="form-group form-button">
        <a href="<?= base_url('url/index') ?>">
            <button class="form-submit" type="button">Kembali</button>
        </a>
        <button type="submit" name="tambah" id="tambah" class="form-submit">
            <?= $button ?>
        </button>
    </div>
</form>