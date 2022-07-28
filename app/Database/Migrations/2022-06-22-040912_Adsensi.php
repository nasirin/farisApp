<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Adsensi extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_absensi' => ['type' => 'int', 'auto_increment' => true],
			'id_user' => ['type' => 'int', 'constraint' => '16'],
			'in' => ['type' => 'datetime'],
			'out' => ['type' => 'datetime', 'null' => true],
			'created_at' => ['type' => 'date'],
			'updated_at' => ['type' => 'date'],
		]);

		$this->forge->addKey('id_absensi', true);
		$this->forge->createTable('absensi');
	}

	public function down()
	{
		//
	}
}
