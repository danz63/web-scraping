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
                    <a class="navbar-brand" href="<?= base_url() ?>home/index"><img class="img-responsive" src="<?= base_url() ?>img/Logo.png" alt="Logo" /></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?= base_url() ?>home/formlogin">Login</a></li>
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
                <!-- heading -->
                <h2>Credit</h2>
                <hr>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <p>Data Film Dan Jadwal Diambil dari : <a href="https://www.cgv.id/">Situs CGV</a></p>
                    <p>Icon Diambil dari : <a href="https://iconify.design/">API Iconify</a> dan <a href="https://svgrepo.com">svgrepo.com</a></p>
                    <p>Detail Film (Rating, Poster Film, Genre) Diambil dari : <a href="http://www.omdbapi.com/">OMDb API</a></p>
                    <p>Template Home dan About hasil modifikasi dari : <a href="https://www.indiowebsolution.in/portfolio.html">IndioWeb</a></p>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <p class="copy-right">Halaman Ini modifikasi dari template Bloger yang di Desain oleh : <a href="https://www.indiowebsolution.in/portfolio.html">IndioWeb</a> &copy; 2014</p>
        </div>
    </footer>
</div>