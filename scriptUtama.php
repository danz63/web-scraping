<?php
// 1 start
// 2
$url = "http://localhost/backup_data/cgv20191212festive.php";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);
preg_match('/<div class="schedule-lists">[\s\S]+?<div class="showtimes-sum">/', $result, $str);
$result = preg_replace('/<div class="showtimes-sum">/', '', $str[0]);
$result = preg_replace('/<div class="clear"><\/div>/', '', $result);
$result .= '<script type="text/javascript" src="upload/URL001.js"></script> </body></html>';
echo "$result";

// $result akan menghasilkan form dengan dengan isi string berformat json yang di proses oleh code di bawah ini
$data = json_decode($_POST['json'], true);
$dataFilm = [];
$query = mysqli_query($this->conn, "SELECT * FROM film");

// 3
if (mysqli_num_rows($query) > 0) {
    // 4
    while ($row = mysqli_fetch_assoc($query)) {
        // 5
        $id_film = $row["id_film"];
        $dataFilm += [$row['id_film'] => $row['title']];
    }
} else {
    // 6
    $id_film = "MOV0000";
}

//7
$id_film++;
$queryfilm = "INSERT INTO film (`id_film`,`title`,`genre`,`durasi`,`tahun`) VALUES ";
// 8
if (count($dataFilm) > 0) {
    // 9
    foreach ($data as $row) {
        // 10
        if (!in_array($row['title'], $dataFilm)) {
            // 11
            $queryfilm .= "('" . $id_film . "','" . $row['title'] . "','" . $row['genre'] . "','" . $row['durasi'] . "','" . $row['tahun'] . "'),";
            $id_url = $_SESSION['id_url'];
            $str = "INSERT INTO jam_tayang (`id_film`,`id_url`,`jam`, `tanggal`) VALUES ";
            $tanggal = date("Y-m-d");
            foreach ($row['jam_tayang'] as $value) {
                // 12
                $str .= "('$id_film','$id_url','$value', '$tanggal'),";
            }
            $str = rtrim($str, ",");
            mysqli_query($this->conn, $str);
            $id_film++;
        } else {
            // 13
            $id_url = $_SESSION['id_url'];
            $str = "INSERT INTO jam_tayang (`id_film`,`id_url`,`jam`, `tanggal`) VALUES ";
            $tanggal = date("Y-m-d");
            foreach ($row['jam_tayang'] as $value) {
                // 14
                $str .= "('$id_film','$id_url','$value', '$tanggal'),";
            }
            $str = rtrim($str, ",");
            mysqli_query($this->conn, $str);
        }
    }
} else {
    // 15
    foreach ($data as $row) {
        // 16
        $queryfilm .= "('" . $id_film . "','" . $row['title'] . "','" . $row['genre'] . "','" . $row['durasi'] . "','" . $row['tahun'] . "'),";
        $id_url = $_SESSION['id_url'];
        $str = "INSERT INTO jam_tayang (`id_film`,`id_url`,`jam`, `tanggal`) VALUES ";
        $tanggal = date("Y-m-d");
        foreach ($row['jam_tayang'] as $value) {
            // 17
            $str .= "('$id_film','$id_url','$value', '$tanggal'),";
        }
        $str = rtrim($str, ",");
        mysqli_query($this->conn, $str);
        $id_film++;
    }
}

// 18
$queryfilm = rtrim($queryfilm, ",");
// 19
if (strlen($queryfilm) > 70) {
    // 20
    $exect_queryfilm = mysqli_query($this->conn, $queryfilm);
    if (!$exect_queryfilm) {
        // 21
        echo '
        <script>
            alert("Scraping Data Gagal! ' . mysqli_error($this->conn) . '");
            window.location = "' . base_url('url/index') . '";
        </script>';
        die;
    }
}
// 22
echo '
    <script>
        alert("Scraping Data Sukses!");
        window.location = "' . base_url('url/index') . '";
    </script>';
$tgl = date("Y-m-d");
$queryUpdate = "UPDATE url SET last_scraped='$tgl' WHERE id_url='" . $_SESSION['id_url'] . "'";
mysqli_query($this->conn, $queryUpdate);
unset($_SESSION['id_url']);

// 23 end