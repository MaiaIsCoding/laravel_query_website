<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\InfoCarro;

class SearchController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('search');
    }

    public function search(Request $request)
    {
        $novo_url = "https://www.questmultimarcas.com.br/estoque?termo=" . $_GET["termo"] . "&marca=&modelo=&combustivel=&cambio=&filtroBuscaTipo=&opcionais=&carroceria=&anoinicio=&anofim=&precoMinimo=&precoMaximo=&ordenacao=&registros_por_pagina=";
        urlencode($novo_url);
        $string_file = file_get_contents($novo_url);

        preg_match_all('/<h2 class="card__title ui-title-inner"><a href="?.*>(.*?)<\/a>/',$string_file,$name_car);
        preg_match_all('/<span class="card-list__info">(.*?)<\/span>/s',$string_file,$items);
        preg_match_all('/<span class="card__price-number">&#082;&#036; (.*)<\/span>/',$string_file,$price);
        preg_match_all('/<h2 class="card__title ui-title-inner"><a href="(.*)">/',$string_file,$car_link);

        $new_items = array_chunk($items[0], 6);
        $result = array(); 

        foreach ($new_items as $value)
        {
            array_push($result, $value);
        }

        for ($i = 0; $i < sizeof($name_car[1]); $i++)
        {
            $val_name = $name_car[1][$i];
            $val_items = $new_items[$i];
            $val_price = $price[0][$i];
            $val_link =  $car_link[1][$i];
            array_push($result[$i], $val_name, $val_price, $val_link);
        }
 
        for ($j = 0; $j < sizeof($result); $j++) 
        {
            $car_info = new InfoCarro();
            $car_info->user_id = Auth::id();
            $car_info->ano = strip_tags($result[$j][0]);
            $car_info->quilometragem = strip_tags($result[$j][1]);
            $car_info->combustivel = strip_tags($result[$j][2]);
            $car_info->cambio = strip_tags($result[$j][3]);
            $car_info->portas = strip_tags($result[$j][4]);
            $car_info->cor = strip_tags($result[$j][5]);
            $car_info->nome_veiculo = strip_tags($result[$j][6]);
            $car_info->link = strip_tags($result[$j][8]);

            $car_info->save();
        }

        return view('search', compact('result'));
    }
}