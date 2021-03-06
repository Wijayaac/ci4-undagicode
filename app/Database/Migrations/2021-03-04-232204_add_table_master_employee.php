<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTableMasterEmployee extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' 			=> 'INTEGER',
				'constraint'	=> 5,
				'unsigned'		=> true,
				'auto_increment' => true
			],
			'employee_name' => [
				'type'			=> 'VARCHAR',
				'constraint'	=> 128,
			],
			'address' => [
				'type'			=> 'TEXT',
				'constraint'	=> 0,
			],
			'phone' => [
				'type'			=> 'CHAR',
				'constraint'	=> 12
			],
			'email' => [
				'type'			=> 'CHAR',
				'constraint'	=> 64
			],
			'gender' => [
				'type'			=> 'BOOLEAN',
				'null'			=> false,
			],
			'cv' => [
				'type'			=> 'VARCHAR',
				'constraint'	=> 255
			],
			'created_at DATE default CURRENT_TIMESTAMP',
			'updated_at DATETIME default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'
		]);

		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('master_employee');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('master_employee', TRUE);
	}
}
