<?php

namespace App\Http\Controllers;

use App\Models\Chassis;
use App\Models\Configuration;
use App\Models\Cooler;
use App\Models\Motherboard;
use App\Models\Processor;
use App\Models\Psu;
use App\Models\Rams;
use App\Models\Storage;
use App\Models\Videocard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $configurationErrors = [];

        $configuration = session('configuration', [
            'processors' => null,
            'motherboards' => null,
            'coolers' => null,
            'rams' => null,
            'storages' => null,
            'videocards' => null,
            'psus' => null,
            'chassis' => null,
        ]);

        $components = [
            'processor' => $configuration['processors'] ? Processor::find($configuration['processors']) : null,
            'motherboard' => $configuration['motherboards'] ? Motherboard::find($configuration['motherboards']) : null,
            'cooler' => $configuration['coolers'] ? Cooler::find($configuration['coolers']) : null,
            'ram' => $configuration['rams'] ? Rams::find($configuration['rams']) : null,
            'storage' => $configuration['storages'] ? Storage::find($configuration['storages']) : null,
            'videocard' => $configuration['videocards'] ? Videocard::find($configuration['videocards']) : null,
            'psu' => $configuration['psus'] ? Psu::find($configuration['psus']) : null,
            'case' => $configuration['chassis'] ? Chassis::find($configuration['chassis']) : null,
        ];
        // Проверка сокета процессора и материнской платы
        if (
            isset($components['processor'], $components['motherboard']) &&
            $components['processor'] !== null &&
            $components['motherboard'] !== null &&
            isset($components['processor']->socket, $components['motherboard']->socket) &&
            $components['processor']->socket->title !== $components['motherboard']->socket->title
        ) {
            $processor = $components['processor'];
            $motherboard = $components['motherboard'];
            $errorTitle = 'Процессор ' . $processor->vendor->title . ' ' . $processor->title . ' не совместим с материнской платой ' . $motherboard->vendor->title . ' ' . $motherboard->chipset->title . ' ' . $motherboard->title . ' (разные сокеты)';

            $configurationErrors['processor_and_motherboard'] = $errorTitle;
        }
        // Проверка тепловыделения процессора для кулера
        if (
            isset($components['processor'], $components['cooler']) &&
            $components['processor'] !== null &&
            $components['cooler'] !== null &&
            isset($components['processor']->tdp, $components['cooler']->power) &&
            $components['processor']->tdp > $components['cooler']->power
        ) {
            $processor = $components['processor'];
            $cooler = $components['cooler'];

            $errorTitle = 'Процессор ' . $processor->vendor->title . ' ' . $processor->title . ' не совместим с кулером ' . $cooler->vendor->title . ' ' . $cooler->title . ' из-за тепловыделения процессором ' . $processor->tdp . 'Вт';

            $configurationErrors['processor_and_cooler'] = $errorTitle;
        }
        // Проверка тепловыделения процессора и видеокарты для блока питания
        if (
            isset($components['processor'], $components['videocard'], $components['psu']) &&
            $components['processor'] !== null &&
            $components['videocard'] !== null &&
            $components['psu'] !== null &&
            isset($components['processor']->tdp, $components['videocard']->tdp, $components['psu']->power) &&
            $components['processor']->tdp + $components['videocard']->tdp > $components['psu']->power
        ) {
            $processor = $components['processor']->vendor->title . ' ' . $components['processor']->title;
            $videocard = $components['videocard']->vendor->title . ' ' . $components['videocard']->title;
            $psu = $components['psu']->vendor->title . ' ' . $components['psu']->title;

            $errorTitle = 'Тепловыделение процессора ' . $processor . ' и видеокарты ' . $videocard . ' превышают мощность блока питания ' . $psu;

            $configurationErrors['processor_videocard_and_psu'] = $errorTitle;
        }
        // Проверка на совместимость типа памяти у материнской платы и оперативной памяти
        if (
            isset($components['motherboard'], $components['ram']) &&
            $components['motherboard'] !== null &&
            $components['ram'] !== null &&
            isset($components['motherboard']->memoryType->title, $components['ram']->memoryType->title) &&
            $components['motherboard']->memoryType->title !== $components['ram']->memoryType->title
        ) {
            $motherboard = $components['motherboard']->vendor->title . ' ' . $components['motherboard']->chipset->title . ' ' . $components['motherboard']->title;
            $ram = $components['ram']->vendor->title . ' ' . $components['ram']->title;

            $errorTitle = 'Материнская плата ' . $motherboard . ' не совместима с оперативной памятью ' . $ram . ' (разные типы памяти)';

            $configurationErrors['motherboard_and_ram'] = $errorTitle;
        }

        $componentList = [
            'processors' => [
                'title' => 'Процессор',
                'placeholder' => 'Выбрать процессор',
                'i' => 'fas fa-microchip',
                'selectedComponent' => $components['processor']
            ],
            'motherboards' => [
                'title' => 'Материнская плата',
                'placeholder' => 'Выбрать плату',
                'i' => 'fas fa-network-wired',
                'selectedComponent' => $components['motherboard']
            ],
            'coolers' => [
                'title' => 'Кулер',
                'placeholder' => 'Выбрать кулер',
                'i' => 'fas fa-fan',
                'selectedComponent' => $components['cooler']
            ],
            'rams' => [
                'title' => 'Оперативная память',
                'placeholder' => 'Выбрать оперативную память',
                'i' => 'fas fa-memory',
                'selectedComponent' => $components['ram']
            ],
            'storages' => [
                'title' => 'Накопитель',
                'placeholder' => 'Выбрать накопитель',
                'i' => 'fas fa-database',
                'selectedComponent' => $components['storage']
            ],
            'videocards' => [
                'title' => 'Видеокарта',
                'placeholder' => 'Выбрать видеокарту',
                'i' => 'fas fa-gamepad',
                'selectedComponent' => $components['videocard']
            ],
            'psus' => [
                'title' => 'Блок питания',
                'placeholder' => 'Выбрать блок питания',
                'i' => 'fas fa-bolt',
                'selectedComponent' => $components['psu']
            ],
            'chassis' => [
                'title' => 'Корпус',
                'placeholder' => 'Выбрать корпус',
                'i' => 'fas fa-server',
                'selectedComponent' => $components['case']
            ],
        ];

        return view('index', [
            'componentList' => $componentList,
            'configuration' => $configuration,
            'configurationErrors' => $configurationErrors
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
        $configuration = session('configuration', [
            'processors' => null,
            'motherboards' => null,
            'coolers' => null,
            'rams' => null,
            'storages' => null,
            'videocards' => null,
            'psus' => null,
            'chassis' => null,
        ]);

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
            'processor_id' => $build['processor_id'],
            'motherboard_id' => $build['motherboard_id'],
            'cooler_id' => $build['cooler_id'],
            'ram_id' => $build['ram_id'],
            'storage_id' => $build['storage_id'],
            'videocard_id' => $build['videocard_id'],
            'psu_id' => $build['psu_id'],
            'chassis_id' => $build['case_id'],
        ]);

        session()->forget('configuration');

        return redirect()->route('index')->with('success', 'Сборка сохранена!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($configurationId)
    {
        $configuration = Configuration::findOrFail($configurationId);

        $configuration->delete();

        return redirect()->back()->with('success', 'Конфигурация удалена');
    }
}
