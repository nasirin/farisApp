<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BonusMigration extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_bonus' => ['type' => 'int', 'auto_increment' => true],
			'id_user' => ['type' => 'int', 'constraint' => '16'],
			'jabatan' => ['type' => 'varchar', 'constraint' => '10'],
			'jml_h_telat' => ['type' => 'int', 'constraint' => '16'],
			'bln_bonus' => ['type' => 'varchar', 'constraint' => '10'],
			'thn_bonus' => ['type' => 'int', 'constraint' => '4'],
			'bawaan' => ['type' => 'varchar', 'constraint' => '16'],
			'bonus' => ['type' => 'varchar', 'constraint' => '16'],
			'denda' => ['type' => 'varchar', 'constraint' => '16'],
			'total' => ['type' => 'varchar', 'constraint' => '16']
		]);

		$this->forge->addKey('id_bonus', true);
		$this->forge->createTable('bonus');
	}

	public function down()
	{
		//
	}
}
