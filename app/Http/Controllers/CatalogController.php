<?php
namespace App\Http\Controllers;

use App\Models\Psu;
use App\Models\Rams;
use App\Models\Cooler;
use App\Models\Chassis;
use App\Models\Storage;
use App\Models\Processor;
use App\Models\Videocard;
use App\Models\Motherboard;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($componentTitle)
    {
        $title = '';
        $data  = null;
        switch ($componentTitle) {
            case 'processors':
                $title = 'Процессоры';
                $data  = Processor::with(['vendor', 'socket'])->get();
                break;
            case 'motherboards':
                $title = 'Материнские платы';
                $data  = Motherboard::with(['vendor', 'chipset'])->get();
                break;
            case 'coolers':
                $title = 'Кулеры';
                $data  = Cooler::with(['vendor'])->get();
                break;
            case 'storages':
                $title = 'Накопители';
                $data  = Storage::with(['vendor'])->get();
                break;
            case 'rams':
                $title = 'Оперативная память';
                $data  = Rams::with(['vendor'])->get();
                break;
            case 'videocards':
                $title = 'Видеокарты';
                $data  = Videocard::with(['vendor'])->get();
                break;
            case 'psus':
                $title = 'Блоки питания';
                $data  = Psu::with(['vendor'])->get();
                break;
            case 'chassis':
                $title = 'Корпусы';
                $data  = Chassis::with(['vendor'])->get();
                break;
        }
        return view('pages.components.' . $componentTitle . '.index', [
            'title' => $title,
            'data'  => $data,
            'componentTitle' => $componentTitle
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($componentTitle, $componentId)
    {

        $data = null;
        switch ($componentTitle) {
            case 'processors':
                $data = Processor::findOrFail($componentId)->load(['vendor', 'socket']);
                break;
            case 'motherboards':
                $data = Motherboard::findOrFail($componentId)->load(['vendor', 'socket', 'chipset', 'memoryType', 'form']);
                break;
            case 'coolers':
                $data = Cooler::findOrFail($componentId)->load(['vendor']);
                break;
            case 'storages':
                $data = Storage::findOrFail($componentId)->load(['vendor', 'memoryCapacity']);
                break;
            case 'rams':
                $data = Rams::findOrFail($componentId)->load(['vendor', 'memoryCapacity', 'memoryType']);
                break;
            case 'videocards':
                $data = Videocard::findOrFail($componentId)->load(['vendor', 'memoryCapacity', 'memoryType']);
                break;
            case 'psus':
                $data = Psu::findOrFail($componentId)->load(['vendor', 'form']);
                break;
            case 'chassis':
                $data = Chassis::findOrFail($componentId)->load(['vendor', 'form']);
                break;
        }
        return view('pages.components.' . $componentTitle . '.show', [
            'data' => $data,
            'componentTitle' => $componentTitle
        ]);
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
