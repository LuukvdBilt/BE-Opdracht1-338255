<?php

namespace App\Http\Controllers;

use App\Models\AllergeenModel;
use Illuminate\Http\Request;

class AllergeenController extends Controller
{
    private $allergeenModel;

    public function __construct()
    {
        $this->allergeenModel = new AllergeenModel();
    }

    public function allergenenInfo($productId)
    {
        $allergenenInfo = $this->allergeenModel->getAllergeenInfo($productId);

        $productenInfo = $this->allergeenModel->getProductInfo($productId);

        // var_dump($allergenenInfo, $productenInfo);

        return view('product.allergeenInfo', [
            'title' => 'Allergenen Informatie',
            'allergenenInfo' => $allergenenInfo,
            'productenInfo' => $productenInfo
        ]);
    }

}