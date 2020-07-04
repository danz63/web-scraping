<div id="mySidenav" class="sidenav">
    <a href="#">
        <h3><img src="https://api.iconify.design/fa-tachometer.svg?color=white"> Dashboard</h3>
    </a>
    <div class="divider"></div>
    <a class=" <?= $li == 'Beranda' ? 'selected' : '' ?>" href="<?= base_url() ?>admin/index">
        <img src="<?= $icon['Beranda'] ?>"></img>&nbsp;Beranda
    </a>
    <div class="divider"></div>
    <a class="<?= $li == 'Admin' ? 'selected' : '' ?>" href="<?= base_url() ?>admin/form">
        <img src="<?= $icon['Admin'] ?>"></img>&nbsp;Ubah Password
    </a>
    <div class="divider"></div>
    <a class=" <?= $li == 'URL' ? 'selected' : '' ?>" href="<?= base_url() ?>url/index">
        <img src="<?= $icon['URL'] ?>"></img>&nbsp; <span> URL </span>
    </a>
    <div class="divider"></div>
    <a class="<?= $li == 'Film' ? 'selected' : '' ?>" href="<?= base_url() ?>film/index">
        <img src="<?= $icon['Film'] ?>"></img>&nbsp;Film
    </a>
    <div class="divider"></div>
    <a href="<?= base_url() ?>admin/logout"> <img src="<?= $icon['Keluar'] ?>"></img>&nbsp;Keluar
    </a>
    <div class="divider"></div>
</div>
<div id="main">
    <div class="breadcrumb">
        <span onclick="sideNav();" class="hamburger">&#9776;</span>
        <span class="breadcrumb-menu"><?= $controller ?> / <?= $method ?></span>
    </div>