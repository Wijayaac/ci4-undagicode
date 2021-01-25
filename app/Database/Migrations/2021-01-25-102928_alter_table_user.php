<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableUser extends Migration
{
	public function up()
	{
		//update field on table user 
		$this->forge->addColumn('user', [
			'updated_at DATETIME default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'
		]);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//delete field if needed for rollback case
		$this->forge->dropColumn('user', 'updated_at');
	}
}
