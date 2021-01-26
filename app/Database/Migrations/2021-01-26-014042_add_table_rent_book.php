<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTableRentBook extends Migration
{
	public function up()
	{
		//creating table the relate to rent book
		$this->forge->addField([
			'id' => [

				'type' 			=> 'CHAR',
				'constraint'	=> 8,
				'unsigned'		=> 'true',
				'auto_increment' => 'false'

			],
			'book_id' => [
				'type'			=> 'CHAR',
				'constraint'	=> 8,
			],
			'user_id' => [
				'type'			=> 'CHAR',
				'constraint'	=> 8,
			],
			'created_at DATETIME default CURRENT_TIMESTAMP',
			'updated_at DATETIME default CURRENT_TIMESTAMP on UPDATE CURRENT_TIMESTAMP',
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('master_rent', TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//method using for rollback case 
		$this->forge->dropTable('master_rent');
	}
}
