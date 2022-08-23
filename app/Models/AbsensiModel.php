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
	protected $allowedFields        = ['id_user', 'in', 'out', 'created_at', 'updated_at'];

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

	public function masuk()
	{
		$data = ['id_user' => session('id'), 'in' => date('Y-m-d H:i:s'), 'created_at' => date('Ymd')];
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

		$query = $this->db->table($this->table)
			->where($condition_masuk)->get()->getRowArray();
		return $query;
	}

	public function out()
	{
		$condition_keluar = ['id_user' => session('id'), 'updated_at' => date('Ymd')];
		return $this->db->table($this->table)
			->where($condition_keluar)->get()->getRowArray();
	}

	public function log()
	{
		if (session('level') == 'admin') {
			$condition = [
				'MONTH(created_at)' => date('m'),
				'YEAR(created_at)' => date('Y')
			];
		} else {
			$condition = [
				'user.id_user' => session('id'),
				'MONTH(created_at)' => date('m'),
				'YEAR(created_at)' => date('Y')
			];
		}

		$query = $this->db->table($this->table)->join('user', 'user.id_user = absensi.id_user')->where($condition)->get()->getResultArray();
		return $query;
	}

	public function filter($post)
	{
		$tahun = date('Y', strtotime($post['date']));
		$bulan = date('m', strtotime($post['date']));

		$condition = [];
		if (session('level') == 'admin') {
			if ($post['karyawan'] != 'semua') {
				$condition = [
					'MONTH(created_at)' => $bulan,
					'YEAR(created_at)' => $tahun,
					'absensi.id_user' => $post['karyawan']
				];
			} else {
				$condition = [
					'MONTH(created_at)' => $bulan,
					'YEAR(created_at)' => $tahun,
				];
			}
		} else {
			$condition = [
				'id_user' => session('id'),
				'MONTH(created_at)' => $bulan,
				'YEAR(created_at)' => $tahun
			];
		}

		$query = $this->db->table($this->table)->join('user', 'user.id_user = absensi.id_user')->where($condition)->get()->getResultArray();
		return $query;
	}
}
