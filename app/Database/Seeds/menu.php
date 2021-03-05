<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Menu extends Seeder
{
	public function run()
	{
		//
		$menuData = [
			[
				'id' =>  0,
				'menu_name' => 'master product',
				'menu_link' => '/product'
			],
			[
				'id' =>  0,
				'menu_name' => 'master penjualan',
				'menu_link' => '/penjualan'
			],
			[
				'id' =>  0,
				'menu_name' => 'master employee',
				'menu_link' => '/employee'
			],
		];
		foreach ($menuData as $item) {
			// inserting data into database table menu
			$this->db->table('main_menu')->insert($item);
		}
	}
}
