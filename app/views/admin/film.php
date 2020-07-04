<div class="container" style="margin-top:25px; padding-top:15px; overflow-x:auto;">
    <table class="table table-bordered table-striped" style="margin-top:25px;">
        <?php if (count($datafilm) > 0) : ?>
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul Film</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Durasi</th>
                    <th scope="col">Tahun Rilis</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datafilm as $index => $row) : ?>
                    <tr>
                        <th scope="row"><?= $index + 1; ?></th>
                        <td><?= ucwords(strtolower($row['title'])) ?></td>
                        <td><?= ucwords(strtolower($row['genre'])) ?></td>
                        <td><?= $row['durasi'] ?> Menit</td>
                        <td><?= $row['tahun'] ?></td>
                        <td>
                            <a href="#" class="badge badge-info" data-id="<?= $row['id_film'] ?>" onclick="showModal(this);">detail</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        <?php else : ?>
            <thead>
                <div class='row'>
                    <td colspan="5">
                        <h4 style="text-align: center;">Data Film Kosong</h4>
                    </td>
                    </tr>
            </thead>
        <?php endif; ?>
    </table>
</div>

<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        padding-top: 10px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);

    }

    /* Modal Content */
    .modal-content {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        border: 1px solid #888;
        border-radius: 10px;
        width: 80%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        -webkit-animation-name: animatetop;
        -webkit-animation-duration: 0.4s;
        animation-name: animatetop;
        animation-duration: 0.4s
    }

    /* Add Animation */
    @-webkit-keyframes animatetop {
        from {
            top: -300px;
            opacity: 0
        }

        to {
            top: 0;
            opacity: 1
        }
    }

    @keyframes animatetop {
        from {
            top: -300px;
            opacity: 0
        }

        to {
            top: 0;
            opacity: 1
        }
    }

    /* The Close Button */
    #close {
        color: white;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    #close:hover,
    #close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .modal-header {
        padding: 2px 16px;
        background-color: #000046;
        color: white;
    }

    .modal-body {
        padding: 20px 26px;
    }

    .modal-body .row .col .row {
        margin-top: 5px;
    }

    .modal-footer {
        padding: 2px 16px;
        background-color: #000046;
        color: white;
    }
</style>

<div id="myModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span id="close">&times;</span>
            <h2 id="head"></h2>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col col-5">
                    <div class='col' id="poster"></div>
                </div>
                <div class="col">
                    <div class='row' style="margin-top: 20px;">
                        <div class='col col-1'>Genre</div>
                        <div class='col' id="genre"></div>
                    </div>
                    <div class='row'>
                        <div class='col col-1'>Rating</div>
                        <div class='col' id="rating"></div>
                    </div>
                    <div class='row'>
                        <div class='col col-1'>Durasi</div>
                        <div class='col' id="durasi"></div>
                    </div>
                    <div class='row'>
                        <div class='col col-1'>Tahun</div>
                        <div class='col' id="tahun"></div>
                    </div>
                    <div class='row'>
                        <div class='col col-1'>Jam</div>
                        <div class='col' id="jam"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <h3>&nbsp;</h3>
        </div>
    </div>
</div>


<script>
    var modal = document.getElementById("myModal");
    modal.style.display = "none";

    function showModal(el) {
        let idEl = el.getAttribute("data-id");
        let head = document.getElementById("head");
        let genre = document.getElementById("genre");
        let durasi = document.getElementById("durasi");
        let tahun = document.getElementById("tahun");
        let poster = document.getElementById("poster");
        let rating = document.getElementById("rating");
        let jam = document.getElementById("jam");
        let btnClose = document.getElementById("close");
        head.innerHTML = "";
        poster.innerHTML = "";
        genre.innerHTML = "";
        rating.innerHTML = "";
        durasi.innerHTML = "";
        tahun.innerHTML = "";
        jam.innerHTML = "";
        var request = new XMLHttpRequest();
        request.open('GET', '<?= base_url('film/detail/') ?>' + idEl, true);
        request.onload = function() {
            if (this.status >= 200 && this.status < 400) {
                var data = this.response;
                data = JSON.parse(data);
                head.innerHTML = data.title;
                poster.innerHTML = "<img src='" + data.poster + "'/>";
                genre.innerHTML = data.genre;
                rating.innerHTML = data.rating;
                durasi.innerHTML = data.durasi + " Menit";
                tahun.innerHTML = data.tahun;
                let datajam = '';
                for (let [key, value] of Object.entries(data.jam)) {
                    datajam = `
                        <div class="row">
                            <div class="col"><h4>` + key + `</h4></div>
                        </div>
                        <div class="row">
                            <div class="col">`
                    for (let i = 0; i < value.length; i++) {
                        datajam += `<a href="#" class="badge badge-info" >` + value[i] + `</a>`;
                    }
                    datajam += `</div>
                        </div>
                    `;
                    jam.innerHTML += datajam;
                }
            }
        };
        request.send();
        modal.style.display = "block";
        btnClose.onclick = function() {
            modal.style.display = "none";
        }

    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>