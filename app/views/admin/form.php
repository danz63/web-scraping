<form class="form" action="<?= base_url('Admin/ubah_pasword') ?>" method="POST" style="margin-top: 50px;">
    <h3>Form Ubah Admin</h3>
    <div class="form-group">
        <label for="user_name"><img src="<?= $icon_form['Admin'] ?>"></img></label>
        <input type="text" name="user_name" id="user_name" value="<?= $data_admin ?>" readonly>
    </div>
    <div class="form-group">
        <label for="old_password"><img src="<?= $icon_form['Key'] ?>"></img></label>
        <input type="password" name="password_lama" id="old_password" placeholder="Password Lama.." autocomplete="off">
    </div>
    <div class="form-group">
        <label for="new_password"><img src="<?= $icon_form['Key'] ?>"></img></label>
        <input type="password" name="password_baru" id="new_password" placeholder="Password Baru.." autocomplete="off">
    </div>
    <div class="form-group form-button">
        <button type="submit" name="update" class="form-submit">Update</button>
    </div>
</form>