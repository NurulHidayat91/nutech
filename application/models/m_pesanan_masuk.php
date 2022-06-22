<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class m_pesanan_masuk extends CI_Model {

    public function pesanan()
    {
        // 0 = ORDER ,  1 = DIPROSES , 2 = DIKIRIM , 3 = SELESAI
        
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_order=0');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function pesanan_diproses()
    {
        // 0 = ORDER ,  1 = DIPROSES , 2 = DIKIRIM , 3 = SELESAI
        
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_order=1');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function pesanan_dikirim()
    {
        // 0 = ORDER ,  1 = DIPROSES , 2 = DIKIRIM , 3 = SELESAI
        
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_order=2');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function pesanan_selesai()
    {
        // 0 = ORDER ,  1 = DIPROSES , 2 = DIKIRIM , 3 = SELESAI
        
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_order=3');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function update_order($data)
    {
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->update('transaksi', $data);
        
        
    }

}

/* End of file Pesanan Masuk.php */

?>