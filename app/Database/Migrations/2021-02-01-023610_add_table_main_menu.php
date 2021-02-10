<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTableMainMenu extends Migration
{
	public function up()
	{
		//method for creating new table: main_menu
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 2,
				'unsigned'	=> true,
				'auto_increment' => true
			],
			'menu_name' => [
				'type'	=> 'VARCHAR',
				'constraint'	=> 128
			],
			'menu_link' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			]
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('main_menu');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//method for droping table: main_menu
		$this->forge->dropTable('main_menu');
	}
}
