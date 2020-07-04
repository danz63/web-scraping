<?php

class Home extends Controller
{
    public function index()
    {
        parent::__construct();
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
        $dataTanggal = [];
        $query = "SELECT last_scraped FROM url";
        $exec_query = mysqli_query($this->conn, $query);
        if ($baris = mysqli_fetch_assoc($exec_query)) {
            array_push($dataTanggal, $baris['last_scraped']);
        }
        $data = [
            'title' => 'Jadwal Film',
            'controller' => 'Home',
            'method' => 'index',
            'datafilm' => $dataFilm,
            'datatanggal' => $dataTanggal[0],
            'dataurl' => $dataUrl,
            'datajam' => $dataJamTayang
        ];
        unset($dataTanggal);
        unset($dataFilm);
        unset($dataUrl);
        unset($dataJamTayang);
        $this->view('template/header', $data);
        $this->view('home/index', $data);
        $this->view('template/footer', $data);
    }


    public function about()
    {
        $data = [
            'title' => 'Jadwal Film',
            'controller' => 'Home',
            'method' => 'about'
        ];
        $this->view('template/header', $data);
        $this->view('home/about', $data);
        $this->view('template/footer', $data);
    }


    public function formlogin()
    {
        $data = [
            'title' => 'Jadwal Film',
            'controller' => 'Home',
            'method' => 'login'
        ];
        $this->view('template/header', $data);
        $this->view('home/formlogin', $data);
        $this->view('template/footer', $data);
    }
}
