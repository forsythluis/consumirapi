<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class Apicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //resolver la página actual
        //$page =LengthAwarePaginator::resolveCurrentPage();
        
        //definir cuantos item mostrar
        //$perpage= 10;
        
        //llamamos a la api
        // $datos = Http::get('https://jsonplaceholder.typicode.com/photos',[
        
        //     'page' => $page,
        //     'perpage' => $perpage,
        
        // ]);
        
        $datos = Http::get('https://jsonplaceholder.typicode.com/photos');
        
        
        $contenido = $datos->json();
        $currentpage = Paginator::resolveCurrentPage();
        $col = collect($contenido);
        $perpage = 5;
        $currentPageItem = $col->slice(($currentpage - 1) * $perpage, $perpage)->all();
        $items = new Paginator($currentPageItem, count($col), $perpage);
        $items->setPath('/lista');
        //$items->setPath($request->url());
        //$items->append($request->all());
        //$total = count($contenido);
        //$rango = range(1,10);
        
        //crear una nueva instancia de LengthAwarePaginator
        //$paginator = new LengthAwarePaginator($contenido['items'], $contenido['total'], $perpage, $page, ['path' => LengthAwarePaginator::resolveCurrentPath(),]);
        //$paginator = new LengthAwarePaginator($rango, $total, $perpage, $page, ['path' => LengthAwarePaginator::resolveCurrentPath(),]);
        //print_r($col);
       //print_r($contenido);
        return view('index', compact('contenido', 'items'));
        
        //pasar la instancia del paginator a la vista
        //return view('index', ['items' => $paginator]);
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
