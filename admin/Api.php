<?php

class Api
{
    protected $koneksi;
    public function __construct()
    {
        $this->koneksi = mysqli_connect('localhost', 'root', '', 'db_webadu');
    }
    public function getBanyak()
    {
        $data = [];
        $bulan = ['Januari', 'Pebruari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'Nopember', 'Desember'];
        for ($a = 1; $a <= 12; $a++) {

            $pending = mysqli_fetch_assoc($this->koneksi->query("SELECT COUNT(id_laporan) as banyak FROM tb_laporan WHERE status = 0 AND MONTH(created_at) = $a"));
            $konfirmasi = mysqli_fetch_assoc($this->koneksi->query("SELECT COUNT(id_laporan) as banyak FROM tb_laporan WHERE status = 1 AND MONTH(created_at) = $a"));
            $selesai = mysqli_fetch_assoc($this->koneksi->query("SELECT COUNT(id_laporan) as banyak FROM tb_laporan WHERE status = 2 AND MONTH(created_at) = $a"));
            $response = [
                'y' => $bulan[$a-1],
                'a' => $pending['banyak'],
                'b' => $konfirmasi['banyak'],
                'c' => $selesai['banyak'],
            ];
            array_push($data, $response);
        }
        return json_encode($data);
    }
}


$data = new Api();
echo $data->getBanyak();
