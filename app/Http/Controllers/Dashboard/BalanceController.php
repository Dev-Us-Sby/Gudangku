<?php

namespace App\Http\Controllers\Dashboard;

use App\Entities\Item;
use App\Entities\ItemOut;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BalanceController extends Controller
{
    public function index()
    {
        $items_count = Item::query()->count();
        $out_count = ItemOut::query()->count();

        return view('pages.balance', [
            'items' => $items_count,
            'out' => $out_count
        ]);
    }
}
