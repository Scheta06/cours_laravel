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
                'title' => 'amd',
                'type'  => 'processor',
            ],
            [
                'title' => 'intel',
                'type'  => 'processor',
            ],
            [
                'title' => 'msi',
                'type'  => '',
            ],
            [
                'title' => 'asus',
                'type'  => '',
            ],
            [
                'title' => 'cougar',
                'type'  => '',
            ],
            [
                'title' => 'id-cooling',
                'type'  => '',
            ],
            [
                'title' => 'adata',
                'type'  => '',
            ],
            [
                'title' => 'g.skill',
                'type'  => '',
            ],
            [
                'title' => 'teamgroup',
                'type'  => '',
            ],
        ];

        foreach ($Array as $item) {
            Vendor::create($item);
        }
    }
}
