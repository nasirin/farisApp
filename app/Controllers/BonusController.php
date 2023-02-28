<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BonusModel;
use App\Models\AuthModel;
use Dompdf\Dompdf;

class BonusController extends BaseController
{
	protected $bonus;
	protected $user;

	public function __construct()
	{
		$this->bonus = new BonusModel();
		$this->user = new AuthModel();
	}

	public function index()
	{
		if (session('level') == 'karyawan') {
			$data['bonus'] = $this->bonus->getAll(session('id'));
		}else{
			$data['bonus'] = $this->bonus->getAll();

		}
		$data['no'] = 1;
		
		return view('pages/BonusPage', $data);
	}

	public function form($id = null)
	{
		if ($id) {
			$data['bonus'] = $this->bonus->getData($id);
			$data['employee'] = $this->user->getEmployees();
			
			return view('pages/FormPageUbah', $data);
		} else {
			$data['employee'] = $this->user->getEmployees();
			
			return view('pages/FormPage',$data);
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
		$data['bonus'] = $this->bonus->getData($id);
		$html = view('pages/SlipGajiPage', $data);
		$pdf = new Dompdf();
		$pdf->loadHtml($html);
		$pdf->setPaper('A4', 'portrait');
		$pdf->render();
		$pdf->stream('Slip-Bonus' . '-' . $data['bonus']['nama_user'] . '.pdf');
	}
}
