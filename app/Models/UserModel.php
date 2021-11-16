<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'user';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = false;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_user', 'nama', 'username', 'password', 'level'];

    public function generateId()
    {
        $query = $this->db->query("SELECT MAX(id_user) AS last_id FROM $this->table");
        $query = $query->getResultArray();
        $get_num = substr($query[0]['last_id'], 3, 5);
        $get_num++;
        $new_id = "USR" . $get_num;

        return $new_id;
    }

    public function getData($username)
    {
        $query = $this->db->table($this->table);
        $row = $query->where('username', $username);
        $login = $row->get()->getRow();
        return $login;
    }
}
