<?php
namespace Database\Seeders;

use App\Models\MemoryType;
use Illuminate\Database\Seeder;

class MemoryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Array = [
            [
                'title' => 'ddr4',
            ],
            [
                'title' => 'ddr5',
            ],
            [
                'title' => 'gddr6',
            ],
            [
                'title' => 'gddr6x',
            ],
            [
                'title' => 'gddr7x',
            ],
        ];

        foreach ($Array as $item) {
            MemoryType::create($item);
        }
    }
}
