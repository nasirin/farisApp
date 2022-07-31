<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'user';
	protected $primaryKey           = 'id_user';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['nik', 'nama_user', 'notelp_user', 'password', 'username', 'level'];

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

	public function create($post)
	{
		$data = [
			'nik' => $post['nik'],
			'nama_user' => $post['nama'],
			'notelp_user' => $post['notelp'],
			'password' => '12345678',
			'username' => $post['nik'] . '-' . $post['level'],
			'level' => $post['level']
		];

		$this->insert($data);
	}

	public function ubah($post, $id)
	{
		$data = [
			'nik' => $post['nik'],
			'nama_user' => $post['nama'],
			'notelp_user' => $post['notelp'],
			'username' => $post['nik'] . '-' . $post['level'],
			'level' => $post['level']
		];

		$this->update($id, $data);
	}

	public function destroy($id)
	{
		$this->delete($id);
	}

	public function getEmployees()
	{
		return $this->db->table($this->table)->where('level', 'karyawan')->get()->getResultArray();
	}
}
