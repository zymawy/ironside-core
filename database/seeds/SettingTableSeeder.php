<?php
namespace Bpocallaghan\Titan\Seeds;
use Illuminate\Database\Seeder;
use Bpocallaghan\Titan\Models\Settings;

class SettingTableSeeder extends Seeder
{
	public function run()
	{
		$csvPath = database_path() . '/seeds/csv/' . 'settings.csv';
        $items = csv_to_array($csvPath);

        foreach ($items as $key => $item)
        {
            Settings::create([
                                
            ]);
        }
	}
}