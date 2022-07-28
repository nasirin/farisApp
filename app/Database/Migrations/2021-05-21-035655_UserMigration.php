<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserMigration extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_user' => ['type' => 'int', 'auto_increment' => true],
			'nama_user' => ['type' => 'varchar', 'constraint' => '30'],
			'notelp_user' => ['type' => 'varchar', 'constraint' => '20'],
			'password' => ['type' => 'varchar', 'constraint' => '50'],
			'username' => ['type' => 'varchar', 'constraint' => '30'],
			'level' => ['type' => 'enum', 'constraint' => ['admin', 'karyawan']],
			'nik' => ['type' => 'varchar', 'constraint' => '50'],
		]);

		$this->forge->addKey('id_user', true);
		$this->forge->createTable('user');
	}

	public function down()
	{
		//
	}
}
