<?php

namespace App\Http\Controllers\Admin;

use App\Models\Psu;
use App\Models\Rams;
use App\Models\User;
use App\Models\Cooler;
use App\Models\Chassis;
use App\Models\Storage;
use App\Models\Processor;
use App\Models\Videocard;
use App\Models\Motherboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ArrayOfModels = [
            Processor::class,
            Motherboard::class,
            Cooler::class,
            Storage::class,
            Rams::class,
            Videocard::class,
            Psu::class,
            Chassis::class,
        ];

        $productCount = 0;
        $userCount = User::all()->count();

        foreach($ArrayOfModels as $item) {
            $productCount += $item::count();
        }

        return view('pages.admin.index', [
            'productCount' => $productCount,
            'userCount' => $userCount
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoryInfo = [
            'processors' => [
                'title' => 'Процессор',
                'subtitle' => 'Центральные процессоры (CPU)',
                'icon' => 'fas fa-microchip'
            ],
            'motherboards' => [
                'title' => 'Материнская плата',
                'subtitle' => 'Системные платы (MB)',
                'icon' => 'fas fa-project-diagram'
            ],
            'coolers' => [
                'title' => 'Охлаждение',
                'subtitle' => 'Кулеры и СЖО',
                'icon' => 'fas fa-fan'
            ],
            'rams' => [
                'title' => 'Оперативная память',
                'subtitle' => 'Модули RAM',
                'icon' => 'fas fa-memory'
            ],
            'storages' => [
                'title' => 'Накопитель',
                'subtitle' => 'SSD и HDD',
                'icon' => 'fas fa-hdd'
            ],
            'videocards' => [
                'title' => 'Видеокарта',
                'subtitle' => 'Графические процессоры (GPU)',
                'icon' => 'fas fa-gamepad'
            ],
            'psus' => [
                'title' => 'Блок питания',
                'subtitle' => 'Источники питания (PSU)',
                'icon' => 'fas fa-bolt'
            ],
            'chassis' => [
                'title' => 'Корпус',
                'subtitle' => 'Компьютерные корпуса',
                'icon' => 'fas fa-desktop'
            ],
        ];
        return view('pages.admin.create', [
            'categoryInfo' => $categoryInfo
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($componentTitle)
    {
        return view('pages.componets.' . $componentTitle . '.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
