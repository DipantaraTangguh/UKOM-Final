<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'supplier';
    protected $primaryKey       = 'id_supplier';
    protected $useAutoIncrement = false;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_supplier', 'nama_supplier', 'alamat_supplier', 'telp_supplier', 'foto'];

    public function getNewid()
    {
        $query = $this->db->query("SELECT newkodesupplier()");
        $row = $query->getRow();
        return $row;
    }
}
