<?php

namespace Database\Seeders;

use App\Models\Form;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mb = 'mb';
        $psu = 'psu';
        $case = 'case';
        $Array = [
            [
                'title' => 'Standart ATX',
                'type' => $mb,
            ],
            [
                'title' => 'micro-ATX',
                'type' => $mb,
            ],
            [
                'title' => 'mini-ATX',
                'type' => $mb,
            ],
            [
                'title' => 'ATX',
                'type' => $psu,
            ],
            [
                'title' => 'SFX',
                'type' => $psu,
            ],
            [
                'title' => 'TFX',
                'type' => $psu,
            ],
            [
                'title' => 'full tower',
                'type' => $case,
            ],
            [
                'title' => 'mid tower',
                'type' => $case,
            ],
            [
                'title' => 'mini tower',
                'type' => $case,
            ],
        ];

        foreach($Array as $item) {
            Form::create($item);
        }
    }
}
