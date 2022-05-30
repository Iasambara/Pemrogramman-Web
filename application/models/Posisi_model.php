<?php
Class Posisi_Model extends CI_Model
{
    function Loker()
    {
        $this->db->order_by('id_loker', 'DESC');
        return $this->db->from('t_loker')
          ->get()
          ->result();
    }

    function GetPosisi($id_loker)
    {
        $this->db->where('id_loker', $id_loker);
        $this->db->order_by('id_loker', 'ASC');
        return $this->db->from('t_lokerdetail')
            ->get()
            ->result();
    }

    public function HitungPelamarPosisi($id_loker, $id_posisi)
    {   
        $query = $this->db->query("SELECT * FROM t_pelamar WHERE id_loker='".$id_loker."' AND id_posisi='".$id_posisi."' ");
        if($query->num_rows()>0)
        {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function HitungPelamarKonfirmasi($id_loker, $id_posisi,$konfirmasi)
    {   
        $query = $this->db->query("SELECT * FROM t_pelamar WHERE id_loker='".$id_loker."' AND id_posisi='".$id_posisi."' AND konfirmasi_hadir='".$konfirmasi."' ");
        if($query->num_rows()>0)
        {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

}
?>