<?php

class Admin extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $method = explode('/', $_GET['url'])[1];
        if ($method != 'login') {
            if (empty($_SESSION['nama_pengguna']))
                header('location:' . base_url('home/index'));
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard Admin',
            'controller' => 'Admin',
            'li' => 'Beranda',
            'method' => 'index',
            'icon' => [
                'Beranda' => 'https://api.iconify.design/fa-home.svg?color=white',
                'Admin' => 'https://api.iconify.design/fa-user.svg?color=white',
                'URL' => 'https://api.iconify.design/fa-globe.svg?color=white',
                'Film' => 'https://api.iconify.design/fa-film.svg?color=white',
                'Jam Tayang' => 'https://api.iconify.design/fa-solid:clock.svg?color=white',
                'Keluar' => 'https://api.iconify.design/fa-sign-out.svg?color=white'
            ]
        ];
        $this->view('template/header', $data);
        $this->view('admin/sidebar', $data);
        $this->view('admin/home', $data);
        $this->view('template/footer', $data);
    }

    public function form()
    {
        if (isset($_SESSION['nama_pengguna'])) {
            $data_admin = ['nama_pengguna' => $_SESSION['nama_pengguna']];
        }
        $data = [
            'title' => 'Dashboard Admin',
            'controller' => 'Admin',
            'li' => 'Admin',
            'method' => 'form',
            'icon' => [
                'Beranda' => 'https://api.iconify.design/fa-home.svg?color=white',
                'Admin' => 'https://api.iconify.design/fa-user.svg?color=white',
                'URL' => 'https://api.iconify.design/fa-globe.svg?color=white',
                'Film' => 'https://api.iconify.design/fa-film.svg?color=white',
                'Jam Tayang' => 'https://api.iconify.design/fa-solid:clock.svg?color=white',
                'Keluar' => 'https://api.iconify.design/fa-sign-out.svg?color=white'
            ],
            'icon_form' => [
                'Key' => 'https://api.iconify.design/fa-solid:key.svg',
                'Admin' => 'https://api.iconify.design/fa-user.svg?color=black'
            ],
            'data_admin' => $data_admin['nama_pengguna']
        ];
        $this->view('template/header', $data);
        $this->view('admin/sidebar', $data);
        $this->view('admin/form', $data);
        $this->view('template/footer', $data);
    }

    public function login()
    {
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        if (!preg_match("/^[a-zA-Z ]*$/", $user_name)) :
            echo '
            <script>
                alert("Username Salah!");
                window.history.back();
            </script>';
            die;
        endif;
        $query_login = "SELECT * FROM user WHERE nama_pengguna='$user_name'";
        $exect_query = mysqli_query($this->conn, $query_login);
        if (mysqli_num_rows($exect_query) < 1) {
            echo '
            <script>
                alert("Username Tidak Ditemukan!");
                window.history.back();
            </script>';
            die;
        }
        $data = mysqli_fetch_assoc($exect_query);
        if (!password_verify($password, $data['kata_sandi'])) {
            echo '
            <script>
                alert("Password Salah!");
                window.history.back();
            </script>';
            die;
        }
        $_SESSION['nama_pengguna'] = $data['nama_pengguna'];
        echo '
            <script>
                alert("Selamat Datang Admin");
                window.location = "' . base_url('admin/index') . '";
            </script>';
    }

    public function logout()
    {
        unset($_SESSION['nama_pengguna']);
        echo '
            <script>
                alert("Anda telah Logout");
                window.location = "' . base_url('home/index') . '";
            </script>';
    }

    public function ubah_pasword()
    {
        $user_name = $_POST['user_name'];
        $password_lama = $_POST['password_lama'];
        $password_baru = $_POST['password_baru'];
        $query_cek = "SELECT * FROM user WHERE nama_pengguna='$user_name'";
        $exect_query = mysqli_query($this->conn, $query_cek);
        if (!$exect_query) {
            echo '
            <script>
                alert("Username Tidak Ditemukan!");
                window.history.back();
            </script>';
            die;
        }
        $data = mysqli_fetch_assoc($exect_query);
        if (!password_verify($password_lama, $data['kata_sandi'])) {
            echo '
            <script>
                alert("Password Lama Salah!");
                window.history.back();
            </script>';
            die;
        }
        $hash_password = password_hash($password_baru, PASSWORD_DEFAULT);
        $query_update = "UPDATE user SET kata_sandi='$hash_password' WHERE nama_pengguna='$user_name'";
        $exect_query = mysqli_query($this->conn, $query_update);
        if (!$exect_query) {
            echo '
            <script>
                alert("Update Data user Gagal! ' . mysqli_error($this->conn) . '");
                window.history.back();
            </script>';
            die;
        }
        echo '
            <script>
                alert("Update Data user Sukses!");
                window.location = "' . base_url('admin/index') . '";
            </script>';
    }
}
