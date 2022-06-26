<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsensiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'absensi';
	protected $primaryKey           = 'id_absensi';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['id_user', 'in', 'out'];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];

	public function in($post)
	{
		$data = ['id_user' => $post['id'], 'in' => $post['in']];
		$this->db->table($this->table)->insert($data);
	}

	public function out($id)
	{
		$data = ['out' => date("Y-M-d H:i:s")];
		$this->db->table($this->table)->where($this->primaryKey, $id)->update($data);
	}
}
