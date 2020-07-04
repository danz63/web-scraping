<?php
class Url extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if (empty($_SESSION['nama_pengguna']))
            header('location:' . base_url('home/index'));
    }

    public function index()
    {
        $query = "SELECT * FROM url";
        $exec_query = mysqli_query($this->conn, $query);
        $dataUrl = [];
        while ($row = mysqli_fetch_assoc($exec_query)) {
            array_push($dataUrl, $row);
        }
        $data = [
            'title' => 'Dashboard Admin',
            'controller' => 'URL',
            'li' => 'URL',
            'method' => 'index',
            'icon' => [
                'Beranda' => 'https://api.iconify.design/fa-home.svg?color=white',
                'Admin' => 'https://api.iconify.design/fa-user.svg?color=white',
                'URL' => 'https://api.iconify.design/fa-globe.svg?color=white',
                'Film' => 'https://api.iconify.design/fa-film.svg?color=white',
                'Jam Tayang' => 'https://api.iconify.design/fa-solid:clock.svg?color=white',
                'Keluar' => 'https://api.iconify.design/fa-sign-out.svg?color=white'
            ],

            'dataUrl' => array_values($dataUrl)
        ];
        $this->view('template/header', $data);
        $this->view('admin/sidebar', $data);
        $this->view('admin/url', $data);
        $this->view('template/footer', $data);
    }

    public function form($id = '')
    {
        if ($id != '') {
            $query = "SELECT * FROM url WHERE id_url='$id'";
            $exec_query = mysqli_query($this->conn, $query);
            $dataUrl = mysqli_fetch_assoc($exec_query);
            $action = 'update';
        } else {
            $query = "SELECT max(id_url) as id FROM url";
            $exec_query = mysqli_query($this->conn, $query);
            $dataId = mysqli_fetch_assoc($exec_query)['id'];
            if ($dataId) {
                $dataId = ++$dataId;
            } else {
                $dataId = "URL001";
            }
            $dataUrl = [
                'id_url' => $dataId,
                'url' => '',
                'lokasi' => '',
                'script_loc' => ''
            ];
            $action = 'insert';
        }
        $data = [
            'title' => 'Dashboard Admin',
            'controller' => 'URL',
            'li' => 'URL',
            'method' => 'index',
            'icon' => [
                'Beranda' => 'https://api.iconify.design/fa-home.svg?color=white',
                'Admin' => 'https://api.iconify.design/fa-user.svg?color=white',
                'URL' => 'https://api.iconify.design/fa-globe.svg?color=white',
                'Film' => 'https://api.iconify.design/fa-film.svg?color=white',
                'Jam Tayang' => 'https://api.iconify.design/fa-solid:clock.svg?color=white',
                'Keluar' => 'https://api.iconify.design/fa-sign-out.svg?color=white'
            ],
            'icon_form' => [
                'Loc' => 'https://api.iconify.design/fa-solid:map-marked-alt.svg',
                'Code' => 'https://api.iconify.design/fa-solid:code.svg',
                'DB' => 'https://api.iconify.design/fa-solid:hockey-puck.svg',
                'File' => 'https://api.iconify.design/fa-solid:file.svg',
                'ID' => 'https://api.iconify.design/fa-solid:flag.svg'
            ],
            'data_url' => $dataUrl,
            'action' => $action
        ];
        $this->view('template/header', $data);
        $this->view('admin/sidebar', $data);
        $this->view('admin/form_url', $data);
        $this->view('template/footer', $data);
    }

    public function insert()
    {
        $script = $_FILES['file'];
        extract($script);
        unset($script);
        extract($_POST);
        unset($_POST);
        if ($error != 0) {
            echo '
            <script>
                alert("File yang di upload melanggar konfigurasi server (php.ini)");
                window.history.back();
            </script>';
            die;
        }
        if ($type != 'application/x-javascript') {
            echo '
            <script>
                alert("File yang di upload bukan berkas javascript");
                window.history.back();
            </script>';
            die;
        }
        if ($size > 10000) {
            echo '
            <script>
                alert("File yang di upload Terlalu besar");
                window.history.back();
            </script>';
            die;
        }
        $upload_location = 'upload/' . $id_url . '.js';
        $status_upload = move_uploaded_file($tmp_name, $upload_location);
        if ($status_upload != 1) {
            echo '
            <script>
                alert("File Gagal Diupload, Error File destinasi");
                window.history.back();
            </script>';
            die;
        }
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            echo '
            <script>
                alert("URL tidak valid");
                window.history.back();
            </script>';
            die;
        }
        $url = filter_var($url, FILTER_SANITIZE_URL);

        // Tanggal default agar dapat di scrap
        $date = "2020-06-01";
        $queryInsert = "INSERT INTO url VALUES('$id_url','$url','$lokasi','$upload_location','$date')";
        $exectQuery = mysqli_query($this->conn, $queryInsert);
        if (!$exectQuery) {
            echo '
            <script>
                alert("Data Gagal dimasukan");
                window.history.back();
            </script>';
            die;
        }
        echo '
            <script>
                alert("Data Berhasil dimasukan");
                window.location="' . base_url('url/index') . '";
            </script>';
    }

    public function update()
    {
        $script = $_FILES['file'];
        extract($_POST);
        unset($_POST);
        $upload_location = $script_loc;
        if ($script['error'] != 4) {
            extract($script);
            unset($script);
            if ($error != 0) {
                echo '
                <script>
                    alert("File yang di upload melanggar konfigurasi server (php.ini)");
                    window.history.back();
                </script>';
                die;
            }
            if ($type != 'application/x-javascript') {
                echo '
                <script>
                    alert("File yang di upload bukan berkas javascript");
                    window.history.back();
                </script>';
                die;
            }
            if ($size > 10000) {
                echo '
                <script>
                    alert("File yang di upload Terlalu besar");
                    window.history.back();
                </script>';
                die;
            }
            $upload_location = 'upload/' . $id_url . '.js';
            $status_upload = move_uploaded_file($tmp_name, $upload_location);
            if ($status_upload != 1) {
                echo '
                <script>
                    alert("File Gagal Diupload, Error File destinasi");
                    window.history.back();
                </script>';
                die;
            }
        }
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            echo '
            <script>
                alert("URL tidak valid");
                window.history.back();
            </script>';
            die;
        }
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $date = date('Y-m-d');
        $queryUpdate = "UPDATE url SET url = '$url', lokasi='$lokasi',script_loc='$upload_location', last_scraped='$date' WHERE id_url='$id_url'";
        $exectQuery = mysqli_query($this->conn, $queryUpdate);
        if (!$exectQuery) {
            echo '
            <script>
                alert("Data Gagal diubah");
                window.history.back();
            </script>';
            die;
        }
        echo '
            <script>
                alert("Data Berhasil diubah");
                window.location="' . base_url('url/index') . '";
            </script>';
    }

    public function confirm_delete($id = '')
    {
        $query = "SELECT * FROM url WHERE id_url='$id'";
        $exec_query = mysqli_query($this->conn, $query);
        if (!$exec_query) {
            echo '
            <script>
                alert("Query Gagal");
                window.location="' . base_url('url/index') . '";
            </script>';
            die;
        }
        $dataUrl = mysqli_fetch_assoc($exec_query);
        $data = [
            'title' => 'Konfirmasi Hapus Data',
            'controller' => 'URL',
            'method' => 'index',
            'dataUrl' => $dataUrl
        ];
        $this->view('template/header', $data);
        $this->view('admin/confirm_delete', $data);
        $this->view('template/footer', $data);
    }

    public function delete()
    {
        $id = $_POST['id'];
        $querySelect = "SELECT script_loc FROM url WHERE id_url='$id'";
        $exec_querySelect = mysqli_query($this->conn, $querySelect);
        $script_loc = mysqli_fetch_assoc($exec_querySelect)['script_loc'];
        $queryDelete = "DELETE FROM url WHERE id_url='$id'";
        $exec_queryDelete = mysqli_query($this->conn, $queryDelete);
        if (!$exec_queryDelete) {
            echo '
            <script>
                alert("Data Gagal dihapus");
                window.location="' . base_url('url/index') . '";
            </script>';
            die;
        }
        unlink($script_loc);
        echo '
            <script>
                alert("Data Berhasil dihapus");
                window.location="' . base_url('url/index') . '";
            </script>';
    }
}
