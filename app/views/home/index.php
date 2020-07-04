<div class="wrapper">
    <!-- header -->
    <header>
        <!-- navigation -->
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= base_url() ?>home/index"><img class="img-responsive" src="<?= base_url() ?>img/logo.png" alt="Logo" style="max-height: 65px;" /></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <?php if (!isset($_SESSION['nama_pengguna'])) : ?>
                            <li><a href="<?= base_url() ?>home/formlogin">Login</a></li>
                        <?php else : ?>
                            <li><a href="<?= base_url() ?>admin/index">Dashboard</a></li>
                        <?php endif; ?>
                        <li><a href="<?= base_url() ?>home/about">About</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </header>

    <!-- banner -->
    <div class="banner">
        <div class="container">
            <h2>Web Scraping</h2>
            <p>Web Scraping Jadwal Film Pada Situs Bioskop Di Karawang Menggunakan Metode Document Object Model</p>
        </div>
    </div>

    <!-- events -->
    <div class="event" id="event">
        <div class="container">
            <div class="default-heading">
                <h2>Jadwal Film</h2>
                <h5>Tanggal (<?= date("d / m / Y", strtotime($datatanggal)) ?>)</h5>
            </div>
            <div class="row">
                <?php foreach ($datafilm as $film) : ?>
                    <div class="col-md-6 col-sm-6">
                        <!-- event item -->
                        <div class="event-item" data-film="<?= $film['id_film'] ?>">
                            <img class="img-responsive" src="https://via.placeholder.com/150" alt="Jadwal" style="max-width: 150px;" />
                            <h4><a href="#"><?= $film['title'] ?></a></h4>
                            <div class="row">
                                <div class="col"></div>
                            </div>
                            <?php foreach ($dataurl as $url) : ?>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <h4><?= $url['lokasi'] ?></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <?php foreach ($datajam as $jam) : ?>
                                            <?php if ($jam['id_film'] == $film['id_film'] && $jam['id_url'] == $url['id_url']) : ?>
                                                <a href="#"><span class="badge"><?= $jam['jam'] ?></span></a>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <p class="copy-right">&copy; 2020-<?= date('Y') ?> Halaman Ini modifikasi dari template Bloger yang di Desain oleh : <a href="https://www.indiowebsolution.in/portfolio.html">IndioWeb</a></p>
        </div>
    </footer>
</div>
<script>
    var elem;
    window.addEventListener('load', (event) => {
        var el = document.getElementsByClassName("event-item");
        for (let i = 0; i < el.length; i++) {
            elem = el[i];
            sendRequest(elem);
        }
    });

    function sendRequest(el) {
        let title = el.children[1].innerText;
        let idEl = el.getAttribute("data-film");
        var client = new XMLHttpRequest();
        client.onload = function() {
            if (this.status == 200 && this.responseText != null) {
                prosesData(this.responseText, el);
            } else {
                console.log("ERROR");
            }
        };
        client.open("GET", '<?= base_url('film/detail/') ?>' + idEl);
        client.send();
    }

    function prosesData(res, element) {
        res = JSON.parse(res);
        let ahref = element.children[1].children[0];
        ahref.href = "https://www.imdb.com/title/" + res.imdbID;
        let img = element.children[0];
        img.src = res.poster;
        let sm = element.children[2].children[0];
        sm.style.marginLeft = "15px";
        sm.innerHTML = "<small>Genre : " + res.genre + "; </small><small> Durasi : " + res.durasi + " Menit; </small><small> Rating IMDB : " + res.rating + "</small>";
    }
</script>