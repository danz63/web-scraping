<?php
class Film extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $method = explode('/', $_GET['url'])[1];
        if ($method != 'detail') {
            if (empty($_SESSION['nama_pengguna']))
                header('location:' . base_url('home/index'));
        }
    }

    public function index()
    {
        $dataFilm = [];
        $query = "SELECT * FROM film";
        $exec_query = mysqli_query($this->conn, $query);
        while ($baris = mysqli_fetch_assoc($exec_query)) {
            array_push($dataFilm, $baris);
        }
        $dataUrl = [];
        $query = "SELECT * FROM url";
        $exec_query = mysqli_query($this->conn, $query);
        while ($baris = mysqli_fetch_assoc($exec_query)) {
            array_push($dataUrl, $baris);
        }
        $dataJamTayang = [];
        $query = "SELECT * FROM jam_tayang";
        $exec_query = mysqli_query($this->conn, $query);
        while ($baris = mysqli_fetch_assoc($exec_query)) {
            array_push($dataJamTayang, $baris);
        }
        $data = [
            'title' => 'Data Film',
            'controller' => 'Film',
            'li' => 'Film',
            'method' => 'index',
            'icon' => [
                'Beranda' => 'https://api.iconify.design/fa-home.svg?color=white',
                'Admin' => 'https://api.iconify.design/fa-user.svg?color=white',
                'URL' => 'https://api.iconify.design/fa-globe.svg?color=white',
                'Film' => 'https://api.iconify.design/fa-film.svg?color=white',
                'Jam Tayang' => 'https://api.iconify.design/fa-solid:clock.svg?color=white',
                'Keluar' => 'https://api.iconify.design/fa-sign-out.svg?color=white'
            ],
            'datafilm' => $dataFilm,
        ];
        unset($dataFilm);
        $this->view('template/header', $data);
        $this->view('admin/sidebar', $data);
        $this->view('admin/film', $data);
        $this->view('template/footer', $data);
    }

    public function detail($id = '')
    {
        $query = "SELECT * FROM film WHERE id_film='$id'";
        $exec_query = mysqli_query($this->conn, $query);
        $baris = mysqli_fetch_assoc($exec_query);
        $title = explode(' ', $baris['title']);
        $title = $title[0];
        $res = file_get_contents("http://www.omdbapi.com/?apikey=a7ec2b75&s=" . $title . "&y=" . $baris['tahun'] . "&type=movie");
        $res = json_decode($res, true);
        $res = $res['Search'];
        $res = $res[0];
        $imdbID = $res['imdbID'];
        $res = file_get_contents("http://www.omdbapi.com/?apikey=a7ec2b75&i=" . $imdbID);
        $res = json_decode($res, true);
        $poster = (filter_var($res['Poster'], FILTER_VALIDATE_URL)) ? $res['Poster'] : "https://via.placeholder.com/150";
        $ret = "{
            \"title\" : \"" . $res['Title'] . "\",
            \"tahun\" : \"" . $res['Year'] . "\",
            \"imdbID\" : \"" . $imdbID . "\",
            \"genre\" : \"" . $res['Genre'] . "\",
            \"durasi\" : \"" . explode(' ', $res['Runtime'])[0] . "\",
            \"poster\" : \"" . $poster . "\",
            \"rating\" : \"" . $res['imdbRating'] . "\",";
        $ret .= "\"jam\" :  ";
        $query = "SELECT b.lokasi,a.jam FROM jam_tayang a JOIN url b ON a.id_url=b.id_url WHERE a.id_film='$id'";
        $exec_query = mysqli_query($this->conn, $query);
        $arrjam = [];
        while ($baris = mysqli_fetch_assoc($exec_query)) {
            array_push($arrjam, $baris);
        }
        foreach ($arrjam as $value) {
            $newarray[$value['lokasi']][] = $value['jam'];
        }
        $newarray = json_encode($newarray);
        $ret .= $newarray;
        $ret .= "}";
        echo $ret;
    }
}
