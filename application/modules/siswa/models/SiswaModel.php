<?php if (!defined('BASEPATH')) exit('No direct script accessallowed');
class SiswaModel extends CI_Model
{

    public function viewByNis($nis)
    {
        $this->db->where('nis', $nis);
        $result = $this->db->get('siswa')->row(); // Tampilkan data siswa berdasarkan NIS

        return $result;
    }
}
