<?php

class Controller
{
    function __construct()
    {
        $this->conn = mysqli_connect('localhost', 'root', '', 'web_scraping') or die("Koneksi Database Gagal");
    }
    public function view($view, $data = [])
    {
        extract($data);
        unset($data);
        require_once '../app/views/' . $view . '.php';
    }
}
