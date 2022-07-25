<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AbsensiModel;
use Dompdf\Dompdf;
use phpDocumentor\Reflection\Types\Boolean;

class AbsensiController extends BaseController
{
	protected $absensi;
	protected $user;

	public function __construct()
	{
		$this->absensi = new AbsensiModel();
	}

	public function index()
	{

		$data = [
			'absensi_masuk' => $this->absensi->in(),
			'absensi_keluar' => $this->absensi->out()
		];

		return view('pages/absensi/HomePage', $data);
	}

	public function masuk()
	{
		$absensi_masuk = $this->absensi->in();
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
		$absensi_keluar = $this->absensi->out();

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
		$condition_keluar = [
			'id_user' => session('id'),
			'MONTH(created_at)' => date('m'),
			'YEAR(created_at)' => date('Y')
		];
		$data = [
			'absensi_log' => $this->absensi->where($condition_keluar)->find(),
			'value' => date('Y-m')
		];
		return view('pages/absensi/LogAbsensiPage', $data);
	}

	public function filter()
	{
		$post = $this->request->getVar();
		if ($post['btn'] == 'hasil') {
			$tahun = date('Y', strtotime($post['date']));
			$bulan = date('m', strtotime($post['date']));

			$condition_keluar = ['id_user' => session('id'), 'MONTH(created_at)' => $bulan, 'YEAR(created_at)' => $tahun];
			$data = ['absensi_log' => $this->absensi->where($condition_keluar)->find(), 'value' => $post['date']];
			return view('pages/absensi/LogAbsensiPage', $data);
		} else {
			$tahun = date('Y', strtotime($post['date']));
			$bulan = date('m', strtotime($post['date']));
			$condition_keluar = [
				'id_user' => session('id'),
				'MONTH(created_at)' => $bulan,
				'YEAR(created_at)' => $tahun
			];
			return view('pages/absensi/absensiPrint', $data = ['date' => $post['date']]);
		}
	}
}
