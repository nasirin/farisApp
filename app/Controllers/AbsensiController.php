<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AbsensiModel;
use phpDocumentor\Reflection\Types\Boolean;

class AbsensiController extends BaseController
{
	protected $absensi;
	protected $user;

	public function __construct()
	{
		$this->absensi = new AbsensiModel();
	}

	// $condition = ['id_user' => session('id'), 'created_at' => date('Ymd')];
	// if ($isMany) {
	// 	$this->absensi->where($condition)->orderBy('in', 'desc')->find();
	// } else {
	// 	$this->absensi->where($condition)->orderBy('in', 'desc')->first();
	// }

	public function index()
	{
		$condition_masuk = ['id_user' => session('id'), 'created_at' => date('Ymd')];
		$condition_keluar = ['id_user' => session('id'), 'updated_at' => date('Ymd')];
		$absensi_masuk = $this->absensi->where($condition_masuk)->orderBy('in', 'desc')->first();
		$absensi_keluar = $this->absensi->where($condition_keluar)->orderBy('in', 'desc')->first();
		$data = [
			'absensi_masuk' => $absensi_masuk,
			'absensi_keluar' => $absensi_keluar,
		];
		return view('pages/absensi/HomePage', $data);
	}

	public function masuk()
	{
		$condition_masuk = ['id_user' => session('id'), 'created_at' => date('Ymd')];
		$absensi_masuk = $this->absensi->where($condition_masuk)->orderBy('in', 'desc')->first();
		// dd($absensi_masuk);
		if (!$absensi_masuk) {
			$this->absensi->masuk();
			session()->setFlashdata('success', 'success');
		} else {
			session()->setFlashdata('error', 'error');
		}
		return redirect()->to('/absensi');
	}

	public function keluar($id)
	{
		$condition_keluar = ['id_user' => session('id'), 'updated_at' => date('Ymd')];
		$absensi_keluar = $this->absensi->where($condition_keluar)->orderBy('in', 'desc')->first();
		// dd(!$absensi_keluar);
		if ($id > 0 && !$absensi_keluar) {
			$this->absensi->keluar($id);
			session()->setFlashdata('success', 'success');
		} else {
			session()->setFlashdata('error', 'error');
		}
		return redirect()->to('/absensi');
	}

	public function log()
	{
		return view('pages/absensi/LogAbsensiPage');
	}
}
