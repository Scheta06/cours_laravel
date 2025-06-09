<?php
namespace App\Http\Controllers;

use App\Models\Cooler;
use App\Models\Motherboard;
use App\Models\Processor;
use App\Models\Psu;
use App\Models\Rams;
use App\Models\Storage;
use App\Models\Videocard;
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
                $data  = Motherboard::with(['vendor', 'socket', 'chipset', 'memoryType', 'form'])->get();
                break;
            case 'coolers':
                $title = 'Кулеры';
                $data  = Cooler::with(['vendor'])->get();
                break;
            case 'storages':
                $title = 'Хранилище';
                $data  = Storage::with(['vendor', 'memoryCapacity'])->get();
                break;
            case 'rams':
                $title = 'Оперативная память';
                $data  = Rams::with(['vendor', 'memoryCapacity', 'memoryType'])->get();
                break;
            case 'videocards':
                $title = 'Видеокарты';
                $data  = Videocard::with(['vendor', 'memoryCapacity', 'memoryType'])->get();
                break;
            case 'psus':
                $title = 'Блоки питания';
                $data  = Psu::with(['vendor', 'form'])->get();
                break;
            case 'chassis':
                $title = 'Корпусы';
                $data  = Psu::with(['vendor', 'form'])->get();
                break;
        }
        return view('pages.componets.' . $componentTitle . '.index', [
            'title' => $title,
            'data'  => $data,
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
