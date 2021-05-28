<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BonusModel;
use Dompdf\Dompdf;

class BonusController extends BaseController
{
	protected $bonus;

	public function __construct()
	{
		$this->bonus = new BonusModel();
	}

	public function index()
	{
		$data = [
			'no' => 1,
			'bonus' => $this->bonus->findAll(),
		];

		return view('pages/BonusPage', $data);
	}

	public function form($id = null)
	{
		if ($id) {
			$data['bonus'] = $this->bonus->find($id);
			return view('pages/FormPageUbah', $data);
		} else {
			return view('pages/FormPage');
		}
	}

	public function simpan($id = null)
	{
		if ($id) {
			$post = $this->request->getVar();
			$this->bonus->ubah($post, $id);
			session()->setFlashdata('success', 'Data Changed Successfully');
			return redirect()->to('/bonus/form/' . $id);
		} else {
			$post = $this->request->getVar();
			$this->bonus->simpan($post);
			session()->setFlashdata('success', 'Data added successfully');
			return redirect()->to('/bonus/form');
		}
	}

	public function print($id)
	{
		$data['bonus'] = $this->bonus->find($id);
		$gaji = $this->bonus->find($id);
		$html = view('pages/SlipGajiPage', $data);
		$pdf = new Dompdf();
		$pdf->loadHtml($html);
		$pdf->setPaper('A4', 'portrait');
		$pdf->render();
		$pdf->stream('Slip-Bonus' . '-' . $gaji['nama_karyawan'] . '.pdf');
	}
}
