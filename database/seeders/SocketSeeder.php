<?php
namespace Database\Seeders;

use App\Models\Socket;
use Illuminate\Database\Seeder;

class SocketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Array = [
            [
                'title' => 'am4',
            ],
            [
                'title' => 'am5',
            ],
            [
                'title' => 'lga 1200',
            ],
            [
                'title' => 'lga 1700',
            ],
        ];

        foreach ($Array as $item) {
            Socket::create($item);
        }
    }
}
