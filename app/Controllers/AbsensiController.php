<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AbsensiModel;
use App\Models\AuthModel;
use Dompdf\Dompdf;
use phpDocumentor\Reflection\Types\Boolean;

class AbsensiController extends BaseController
{
	protected $absensi;
	protected $employee;

	public function __construct()
	{
		$this->absensi = new AbsensiModel();
		$this->employee = new AuthModel();
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
		$data = [
			'absensi_log' => $this->absensi->log(),
			'value' => date('Y-m'),
			'karyawan' => $this->employee->getEmployees(),
			'selected' => '',
		];

		return view('pages/absensi/LogAbsensiPage', $data);
	}

	public function filter()
	{
		$post = $this->request->getVar();
		// dd($post);
		$data = [
			'absensi_log' => $this->absensi->filter($post),
			'value' => $post['date'],
			'selected' => $post['karyawan'],
			'karyawan' => $this->employee->getEmployees()
		];

		if ($post['btn'] == 'hasil') {
			return view('pages/absensi/LogAbsensiPage', $data);
		} else {
			return view('pages/absensi/absensiPrint', $data);
		}
	}
}
