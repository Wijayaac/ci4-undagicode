<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTableMasterData extends Migration
{
	public function up()
	{
		// *creating a table using command --php spark migrate--
		$this->forge->addField([
			'id' => [
				'type' 			=> 'CHAR',
				'constraint'	=> 32,
				'unsigned'		=> 'true',
				'auto_increment' => 'false'
			],
			'product_name' => [
				'type'			=> 'VARCHAR',
				'constraint'	=> 128,
			],
			'price' => [
				'type'			=> 'INT',
				'constraint'	=> 8
			],
			'weight' => [
				'type'			=> 'FLOAT',
				'constraint'	=> 4
			],
			'category' => [
				'type'			=> 'VARCHAR',
				'constraint'	=> 32
			],
			'tag' => [
				'type'			=> 'VARCHAR',
				'constraint'	=> 32
			],
			'stock' => [
				'type'			=> 'INT',
				'constraint'	=> 8
			],
			'description' => [
				'type'			=> 'TEXT',
				'constraint'	=> 0,
			],
			'image' => [
				'type'			=> 'VARCHAR',
				'constraint'	=> 255
			],
			'seller' => [
				'type'			=> 'VARCHAR',
				'constraint'	=> 128
			],
			'created_at DATE default CURRENT_TIMESTAMP',
			'updated_at DATETIME default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'
		]);

		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('master_product');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		// *method that use for rollback case using command --php spark migrate:refresh---
		// ! drop the table master_product

		$this->forge->dropTable('master_product', TRUE);
	}
}
