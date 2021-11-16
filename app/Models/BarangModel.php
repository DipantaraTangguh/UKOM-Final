<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'barang';
    protected $primaryKey       = 'id_barang';
    protected $useAutoIncrement = false;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_barang', 'nama_barang', 'spesifikasi', 'lokasi', 'kondisi', 'jumlah_barang', 'sumber_dana'];

    public function getNewid()
    {
        $query = $this->db->query("SELECT newkodebarang()");
        $row = $query->getRow();
        return $row;
    }
}
