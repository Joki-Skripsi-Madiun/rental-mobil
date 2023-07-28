<?php

namespace App\Models;

use CodeIgniter\Model;

class DataPemesanModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'email', 'username', 'fullname', 'jenis_kelamin', 'alamat', 'foto', 'password_hash', 'reset_hash', 'reset_at', 'reset_expires', 'activate_hash',
        'status', 'status_message', 'active', 'force_pass_reset', 'permissions', 'deleted_at',
    ];



    public function getPemesan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function joinPemesan($id = false)
    {
        if ($id == false) {
            $db      = \Config\Database::connect();
            $builder = $db->table('users');
            $builder->select('*');
            $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
            $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
            $builder->where('group_id', 1);
            $query = $builder->get();
            return $query;
        }
        return $this->where(['id' => $id])->first();
    }


    public function hitungJumlahPemesan()
    {
        $pemesan = $this->query('SELECT * FROM users Where status=2');
        return $pemesan->getNumRows();
    }

    public function updateMerk($data, $id_pemesan)
    {
        $query = $this->db->table('mobil')->update($data, array('id_pemesan' => $id_pemesan));
        return $query;
    }
    // ...
}
