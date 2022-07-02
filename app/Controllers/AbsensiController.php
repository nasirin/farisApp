<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AbsensiModel;

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
		return view('layout/AbsensiLayout');
	}
}
