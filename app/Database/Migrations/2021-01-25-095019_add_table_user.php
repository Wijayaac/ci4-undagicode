<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTableUser extends Migration
{
	public function up()
	{
		//create a table for user
		$this->forge->addField([
			'id' => [

				'type'			=> 'CHAR',
				'constraint'	=>  8,
				'unsigned'		=> 'true',
				'auto_increment' => 'false'
			],
			'username' => [
				'type'			=> 'VARCHAR',
				'constraint'	=> 32,
			],
			'password' => [
				'type' 			=> 'CHAR',
				'constraint'	=> 32
			],
			'name' => [
				'type'			=> 'VARCHAR',
				'constraint'	=> 64
			],
			'telephone' => [
				'type'			=> 'CHAR',
				'constraint'	=> 14
			],
			'created_at DATETIME default CURRENT_TIMESTAMP',
			'updated_at DATETIME default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'
		]);
		// set id as primary key
		$this->forge->addKey('id', TRUE);
		// create table script
		$this->forge->createTable('master_user', TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//delete user table
		$this->forge->dropTable('master_user');
	}
}
