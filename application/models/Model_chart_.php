<?php

class Model_chart extends CI_Model
{

    public function siswaPertahun()
    {
        $query = "SELECT tahun_keluar AS TAHUN, COUNT(*) AS total_siswa_lulus FROM t_siswa
                    GROUP BY tahun_keluar";
        $result = $this->db->query($query)->result();
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
        $result = $this->db->query($query)->result();
        return $result;
    }
}

