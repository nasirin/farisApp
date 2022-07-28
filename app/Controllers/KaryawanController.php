<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthModel;

class KaryawanController extends BaseController
{
	protected $karyawan;

	public function __construct()
	{
		$this->karyawan = new AuthModel();
	}

	public function index()
	{
		$data = [
			'karyawan' => $this->karyawan->findAll()
		];
		return view('pages/karyawan/KaryawanData', $data);
	}

	public function create()
	{

		return view('pages/karyawan/FormKaryawan');
	}

	public function push()
	{
		$post = $this->request->getVar();
		// dd($post);
		$this->karyawan->create($post);
		session()->setFlashdata('success', 'Data create Successfully');
		return redirect()->to('/karyawan');
	}

	public function update($id)
	{
		$data['karyawan'] = $this->karyawan->find($id);
		return view('pages/karyawan/UbahKaryawan', $data);
	}

	public function change($id)
	{
		$post = $this->request->getVar();
		$this->karyawan->ubah($post, $id);
		return redirect()->to('/karyawan');
	}

	public function destroy($id)
	{
		$this->karyawan->destroy($id);
		session()->setFlashdata('success', 'Data Delete Successfully');
		return redirect()->to('/karyawan');
	}
}
