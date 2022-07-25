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
	protected $useTimestamps        = true;
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

	public function masuk()
	{
		$data = ['id_user' => session('id'), 'in' => date('Y-m-d H:i:s')];
		$this->db->table($this->table)->insert($data);
	}

	public function keluar($id)
	{
		$data = ['out' => date("Y-m-d H:i:s"), 'updated_at' => date("Ymd")];
		$this->db->table($this->table)->where($this->primaryKey, $id)->update($data);
	}

	public function in()
	{
		$condition_masuk = ['id_user' => session('id'), 'created_at' => date('Ymd')];
		return $this->db->table($this->table)
			->where($condition_masuk)->get()->getRowArray();
	}

	public function out()
	{
		$condition_keluar = ['id_user' => session('id'), 'updated_at' => date('Ymd')];
		return $this->db->table($this->table)
			->where($condition_keluar)->get()->getRowArray();
	}
}
