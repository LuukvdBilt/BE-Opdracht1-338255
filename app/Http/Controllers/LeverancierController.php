<?php

namespace App\Http\Controllers;

use App\Models\LeverancierModel;
use Illuminate\Http\Request;



class LeverancierController extends Controller
{
    private $leverantie;
    public function __construct()
    {
        $this->leverantie = new LeverancierModel();
    }


     public function leveringsInfo($productId)
    {
        $leverantieInfo = $this->leverantie->getLeverantieInfo($productId);

        $leverancierInfo = $this->leverantie->getLeverancierInfo($productId);

        return view('product.leveringsInfo', [
            'title' => 'Leverantie Informatie',
            'leverantieInfo' => $leverantieInfo,
            'leverancierInfo' => $leverancierInfo
        ]);
    }

}
