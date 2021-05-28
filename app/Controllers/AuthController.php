<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthModel;

class AuthController extends BaseController
{
	protected $user;

	public function __construct()
	{
		$this->user = new AuthModel();
	}

	public function index()
	{
		return view('pages/LoginPage');
	}

	public function login()
	{
		$post = $this->request->getVar();
		$login = $this->user->where('username', $post['username'])->where('password', $post['password'])->get()->getRowArray();
		if ($login) {
			$data = [
				'id' => $login['id_user'],
				'nama' => $login['username'],
				'level' => $login['level']
			];
			session()->set($data);
			return redirect()->to('/');
		} else {
			session()->setFlashdata('error', 'Wrong Username Or Password');
			return redirect()->to('/auth');
		}
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to('/auth');
	}
}
