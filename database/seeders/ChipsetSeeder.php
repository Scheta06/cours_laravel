<?php
namespace Database\Seeders;

use App\Models\Chipset;
use Illuminate\Database\Seeder;

class ChipsetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Array = [
            [
                'title'     => 'a520',
                'socket_id' => 1,
            ],
            [
                'title'     => 'b550',
                'socket_id' => 1,
            ],
            [
                'title'     => 'x570',
                'socket_id' => 1,
            ],
            [
                'title'     => 'h610',
                'socket_id' => 4,
            ],
            [
                'title'     => 'b760',
                'socket_id' => 4,
            ],
            [
                'title'     => 'z790',
                'socket_id' => 4,
            ],
        ];

        foreach ($Array as $item) {
            Chipset::create($item);
        }
    }
}
