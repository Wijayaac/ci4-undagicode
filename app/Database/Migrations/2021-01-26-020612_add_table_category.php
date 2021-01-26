<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTableCategory extends Migration
{
	public function up()
	{
		//method for creating a table category
		$this->forge->addField([
			'id' => [
				'type'				=> 'CHAR',
				'constraint'		=> 8,
				'unsigned'			=> 'true',
				'auto_increment'	=> 'false'
			],
			'category_name' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 32,
			],
			'created_at DATETIME default CURRENT_TIMESTAMP',
			'updated_at DATETIME default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'
		]);
		// creating primary key for this table
		$this->forge->addKey('id', TRUE);
		// begin creating table
		$this->forge->createTable('master_category', TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//method for rollback case or deleting this table
		$this->forge->dropTable('master_category');
	}
}
