<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StarterCategory extends Seeder
{
	public function run()
	{
		//make a starter data while running script
		// php spark db:feed
		$categoryName =
			[
				[
					'id'			=> rand(),
					'category_name'	=> 'Fiction'
				],
				[
					'id'			=> rand(),
					'category_name'	=> 'Language'
				],
				[
					'id'			=> rand(),
					'category_name'	=> 'Computer'
				],
				[
					'id'			=> rand(),
					'category_name'	=> 'Science'
				],
				[
					'id'			=> rand(),
					'category_name'	=> 'Culture'
				],
				[
					'id'			=> rand(),
					'category_name'	=> 'Travell'
				]
			];
		foreach ($categoryName as $item)
		{
			$this->db->table('master_category')->insert($item);
		}
	}
}
