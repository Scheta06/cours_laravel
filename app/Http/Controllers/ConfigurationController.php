<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('index', [
            'componentList' => $componentList,
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
