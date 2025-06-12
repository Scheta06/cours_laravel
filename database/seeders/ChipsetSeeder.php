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
                'title'     => 'A520',
                'type'      => 'amd',
                'socket_id' => 1,
            ],
            [
                'title'     => 'B550',
                'type'      => 'amd',
                'socket_id' => 1,
            ],
            [
                'title'     => 'X570',
                'type'      => 'amd',
                'socket_id' => 1,
            ],
            [
                'title'     => 'H610',
                'type'      => 'intel',
                'socket_id' => 4,
            ],
            [
                'title'     => 'B760',
                'type'      => 'intel',
                'socket_id' => 4,
            ],
            [
                'title'     => 'Z790',
                'type'      => 'intel',
                'socket_id' => 4,
            ],
        ];

        foreach ($Array as $item) {
            Chipset::create($item);
        }
    }
}
