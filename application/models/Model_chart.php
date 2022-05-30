<?php

class Model_chart extends CI_Model
{

    public function siswaPertahun()
    {
        $query = "SELECT tahun_keluar AS TAHUN, COUNT(*) AS total_siswa_lulus FROM t_siswa
                    GROUP BY tahun_keluar";
        //$result = $this->db->query($query)->result();
        $result = $this->db->query($query)->result_array();
        return $result;
    }

    public function siswaKeterserapan()
    {
        $query = "SELECT status AS STATUS, CASE status
        WHEN 1 THEN 'Belum Bekerja'
        WHEN 2 THEN 'Bekerja'
        WHEN 3 THEN 'Kuliah'
        WHEN 4 THEN 'Berwirausaha'
        ELSE 'No Info' END as judul_status, COUNT(*) AS JUMLAH FROM t_siswa GROUP BY `status`";
        //$result = $this->db->query($query)->result();
        $result = $this->db->query($query)->result_array();
        return $result;
    }

    public function Keterserapan($id_jurusan)
    {
        $query = "SELECT status AS STATUS, CASE status
        WHEN 1 THEN 'Belum Bekerja'
        WHEN 2 THEN 'Bekerja'
        WHEN 3 THEN 'Kuliah'
        WHEN 4 THEN 'Berwirausaha'
        ELSE 'No Info' END as judul_status, COUNT(*) AS JUMLAH, nama_jurusan FROM t_siswa 
        INNER JOIN t_jurusan on t_siswa.id_jurusan=t_jurusan.id_jurusan WHERE t_siswa.id_jurusan=$id_jurusan 
        GROUP BY `status`";
        //$result = $this->db->query($query)->result();
        $result = $this->db->query($query)->result_array();
        return $result;
    }

    public function KeterserapanPerjurusan($id_jurusan)
    {
        $query = "SELECT (SELECT COUNT(*) FROM t_siswa WHERE `status`=3 and id_jurusan=$id_jurusan) AS kuliah,
        (SELECT COUNT(*) FROM t_siswa WHERE `status`=2 and id_jurusan=$id_jurusan) AS bekerja,
        (SELECT COUNT(*) FROM t_siswa WHERE `status`=4 and id_jurusan=$id_jurusan) AS wirausaha,
        (SELECT COUNT(*) FROM t_siswa WHERE `status` NOT IN(3,2,4) and id_jurusan=$id_jurusan) AS lain2,
        (SELECT COUNT(*) FROM t_siswa WHERE id_jurusan=$id_jurusan) as jumlah,
        (SELECT nama_jurusan FROM t_jurusan WHERE id_jurusan=$id_jurusan) as jurusan";
        //$result = $this->db->query($query)->result();
        $result = $this->db->query($query)->result_array();
        return $result;
    }
}

