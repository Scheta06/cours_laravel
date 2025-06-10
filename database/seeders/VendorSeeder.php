<?php
namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Array = [
            [
                'title' => 'AMD',
                'type'  => 'processor',
            ],
            [
                'title' => 'Intel',
                'type'  => 'processor',
            ],
            [
                'title' => 'MSI',
                'type'  => '',
            ],
            [
                'title' => 'Asus',
                'type'  => '',
            ],
            [
                'title' => 'Cougar',
                'type'  => '',
            ],
            [
                'title' => 'ID-COOLING',
                'type'  => '',
            ],
            [
                'title' => 'ADATA',
                'type'  => '',
            ],
            [
                'title' => 'G.Skill',
                'type'  => '',
            ],
            [
                'title' => 'TEAMGROUP',
                'type'  => '',
            ],
        ];

        foreach ($Array as $item) {
            Vendor::create($item);
        }
    }
}
