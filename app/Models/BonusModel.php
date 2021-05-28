<?php

namespace App\Models;

use CodeIgniter\Model;

class BonusModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'bonus';
	protected $primaryKey           = 'id_bonus';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['nama_karyawan', 'NIP', 'jabatan', 'jml_h_telat', 'bln_bonus', 'thn_bonus', 'bawaan', 'bonus', 'denda', 'total'];

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

	public function simpan($post)
	{
		$bonus = $post['bawaan'] * 1000;
		$denda = $post['telat'] * 10000;
		$total = $bonus - $denda;
		$data = [
			'nama_karyawan' => $post['nama'],
			'NIP' => $post['NIP'],
			'jabatan' => $post['jabatan'],
			'jml_h_telat' => $post['telat'],
			'bln_bonus' => $post['bulan'],
			'thn_bonus' => $post['tahun'],
			'bawaan' => $post['bawaan'],
			'bonus' => $bonus,
			'denda' => $denda,
			'total' => $total
		];

		$this->db->table($this->table)->insert($data);
	}

	public function ubah($post, $id)
	{
		$bonus = $post['bawaan'] * 1000;
		$denda = $post['telat'] * 10000;
		$total = $bonus - $denda;
		$data = [
			'nama_karyawan' => $post['nama'],
			'NIP' => $post['NIP'],
			'jabatan' => $post['jabatan'],
			'jml_h_telat' => $post['telat'],
			'bln_bonus' => $post['bulan'],
			'thn_bonus' => $post['tahun'],
			'bawaan' => $post['bawaan'],
			'bonus' => $bonus,
			'denda' => $denda,
			'total' => $total
		];

		$this->db->table($this->table)->where($this->primaryKey, $id)->update($data);
	}
}
