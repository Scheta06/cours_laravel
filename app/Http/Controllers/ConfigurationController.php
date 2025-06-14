<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuration;
use Illuminate\Support\Facades\Auth;

class ConfigurationController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $componentList = [
            'processors'   => [
                'title'       => 'Процессор',
                'placeholder' => 'Выбрать процессор',
                'i' => 'fas fa-microchip',
            ],
            'motherboards' => [
                'title'       => 'Материнская плата',
                'placeholder' => 'Выбрать плату',
                'i' => 'fas fa-network-wired',
            ],
            'coolers'      => [
                'title'       => 'Кулер',
                'placeholder' => 'Выбрать кулер',
                'i' => 'fas fa-fan',
            ],
            'rams'        => [
                'title'       => 'Оперативная память',
                'placeholder' => 'Выбрать оперативную память',
                'i' => 'fas fa-memory',
            ],
            'storages'     => [
                'title'       => 'Накопитель',
                'placeholder' => 'Выбрать накопитель',
                'i' => 'fas fa-database',
            ],
            'videocards'     => [
                'title'       => 'Видеокарта',
                'placeholder' => 'Выбрать видеокарту',
                'i' => 'fas fa-gamepad',
            ],
            'psus'     => [
                'title'       => 'Блок питания',
                'placeholder' => 'Выбрать блок питания',
                'i' => 'fas fa-bolt',
            ],
            'chassis'     => [
                'title'       => 'Корпус',
                'placeholder' => 'Выбрать корпус',
                'i' => 'fas fa-server',
            ],
        ];
        $configuration = session('configuration', []);

        return view('index', [
            'componentList' => $componentList,
            'configuration' => $configuration
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($componentTitle, $componentId)
    {
        $configuration = session('configuration', []);

        $configuration[$componentTitle] = $componentId;

        session(['configuration' => $configuration]);

        return redirect()->route('index')->with('success', 'Компонент успешно добавлен');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, $componentTitle, $componentId)
    {
        $build = session('configuration', []);

        $requiredComponents = [
            'processors',
            'motherboards',
            'coolers',
            'rams',
            'storages',
            'videocards',
            'psus',
            'chassis',
        ];

        $missing = array_diff($requiredComponents, array_keys($build));

        if (!empty($missing)) {
            return redirect()->back()->withErrors([
                'message' => 'Выберите недостающие компоненты: ' . implode(', ', $missing),
            ]);
        }

        Configuration::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => Auth::user()->id,
            'processor_id' => $build['processors'],
            'motherboard_id' => $build['motherboards'],
            'cooler_id' => $build['coolers'],
            'ram_id' => $build['rams'],
            'storage_id' => $build['storages'],
            'videocard_id' => $build['videocards'],
            'psu_id' => $build['psus'],
            'chassis_id' => $build['chassis'],
        ]);

        session()->forget('configuration');

        return redirect()->route('index')->with('success', 'Сборка сохранена!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
