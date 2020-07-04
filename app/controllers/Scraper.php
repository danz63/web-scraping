<?php

class Scraper extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function scraping()
    {
        $get = $_GET['url'];
        $get = rtrim($_GET['url'], '/');
        $get = filter_var($get, FILTER_SANITIZE_URL);
        $get = explode('/', $get);
        $id_url = $get[2];
        unset($get);
        $_SESSION['id_url'] = $id_url;
        $query = "SELECT * FROM url WHERE id_url='$id_url'";
        $exec_query = mysqli_query($this->conn, $query);
        $data_url = mysqli_fetch_assoc($exec_query);
        $url = $data_url['url'];
        $queryDelete = "DELETE FROM jam_tayang WHERE id_url='$id_url'";
        $exec_query = mysqli_query($this->conn, $queryDelete);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        $result = $this->filter_html($result);
        $result .= '<script type="text/javascript" src="' . base_url() . $data_url['script_loc'] . '"></script> </body></html>';
        echo "$result";
    }

    public function filter_html($html = '')
    {
        preg_match('/<div class="schedule-lists">[\s\S]+?<div class="showtimes-sum">/', $html, $str);
        $html = preg_replace('/<div class="showtimes-sum">/', '', $str[0]);
        $html = preg_replace('/<div class="clear"><\/div>/', '', $html);
        return $html;
    }

    public function insert_film()
    {
        $data = json_decode($_POST['json'], true);
        $dataFilm = [];
        $query = mysqli_query($this->conn, "SELECT * FROM film");
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $id_film = $row["id_film"];
                $dataFilm += [$row['id_film'] => $row['title']];
            }
        } else {
            $id_film = "MOV0000";
        }
        $id_film++;
        $queryfilm = "INSERT INTO film (`id_film`,`title`,`genre`,`durasi`,`tahun`) VALUES ";
        if (count($dataFilm) > 0) {
            foreach ($data as $row) {
                if (!in_array($row['title'], $dataFilm)) {
                    $queryfilm .= "('" . $id_film . "','" . $row['title'] . "','" . $row['genre'] . "','" . $row['durasi'] . "','" . $row['tahun'] . "'),";
                    $this->proses_jam_tayang($id_film, $row['jam_tayang']);
                    $id_film++;
                } else {
                    $this->proses_jam_tayang(array_keys($dataFilm, $row['title'])[0], $row['jam_tayang']);
                }
            }
        } else {
            foreach ($data as $row) {
                $queryfilm .= "('" . $id_film . "','" . $row['title'] . "','" . $row['genre'] . "','" . $row['durasi'] . "','" . $row['tahun'] . "'),";
                $this->proses_jam_tayang($id_film, $row['jam_tayang']);
                $id_film++;
            }
        }
        $queryfilm = rtrim($queryfilm, ",");
        if (strlen($queryfilm) > 70) {
            $exect_queryfilm = mysqli_query($this->conn, $queryfilm);
            if (!$exect_queryfilm) {
                echo '
                    <script>
                        alert("Scraping Data Gagal! ' . mysqli_error($this->conn) . '");
                        window.location = "' . base_url('url/index') . '";
                    </script>';
                die;
            }
        }
        echo '
            <script>
                alert("Scraping Data Sukses!");
                window.location = "' . base_url('url/index') . '";
            </script>';
        $tgl = date("Y-m-d");
        $queryUpdate = "UPDATE url SET last_scraped='$tgl' WHERE id_url='" . $_SESSION['id_url'] . "'";
        mysqli_query($this->conn, $queryUpdate);
        unset($_SESSION['id_url']);
    }

    public function proses_jam_tayang($id_film = '', $dataJam = [])
    {
        $id_url = $_SESSION['id_url'];
        $str = "INSERT INTO jam_tayang (`id_film`,`id_url`,`jam`, `tanggal`) VALUES ";
        $tanggal = date("Y-m-d");
        foreach ($dataJam as $value) {
            $str .= "('$id_film','$id_url','$value', '$tanggal'),";
        }
        $str = rtrim($str, ",");
        mysqli_query($this->conn, $str);
    }
}
