<form method="POST" class="form" action="<?= base_url('website/insert') ?>">
    <h3>Form Tambah Website</h3>
    <div class="form-group">
        <label for="url_website"><img src="<?= $icon['Save'] ?>"></img></label>
        <input type="text" name="url_website" id="url_website" placeholder="URL Website ..." autocomplete="off">
    </div>
    <div class="form-group form-button">
        <input type="submit" name="submit" id="submit" class="form-submit" value="Tambah Data">
    </div>
</form>