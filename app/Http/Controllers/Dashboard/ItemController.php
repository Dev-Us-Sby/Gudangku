<?php

namespace App\Http\Controllers\Dashboard;

use App\Entities\Item;
use App\Entities\ItemIn;
use App\Entities\ItemOut;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function master(Request $request)
    {
        $item_query = Item::query();

        if (isset($request->q)) {
            $keyword = $request->q;
            $item_query->where(function (Builder $query) use ($keyword) {
                return $query
                    ->where('product_name', 'LIKE', "%$keyword%")
                    ->orWhere('qty', 'LIKE', "%$keyword%")
                    ->orWhere('date_in', 'LIKE', "%$keyword%");
            });
        }

        $item_count = $item_query->count();

        $item_results = $item_query->latest()->paginate(25);

        return view('pages.master-item', [
            'items' => $item_results,
            'item_count' => $item_count
        ]);
    }

    public function index(Request $request)
    {
        $item_query = ItemIn::query();

        if (isset($request->q)) {
            $keyword = $request->q;
            $item_query->where(function (Builder $query) use ($keyword) {
                return $query
                    ->where('product_name', 'LIKE', "%$keyword%")
                    ->orWhere('qty', 'LIKE', "%$keyword%");
            });
        }

        $item_count = $item_query->count();

        $item_results = $item_query->latest()->paginate(25);

        return view('pages.item', [
            'items' => $item_results,
            'item_count' => $item_count
        ]);
    }

    public function out()
    {
        $item_choose = Item::query();
        $item_query = ItemOut::query();

        if (isset($request->q)) {
            $keyword = $request->q;
            $item_query->where(function (Builder $query) use ($keyword) {
                return $query
                    ->where('qty', 'LIKE', "%$keyword%")
                    ->orWhereHas('item', function (Builder $itemQuery) use ($keyword) {
                        $itemQuery
                            ->where('product_name', 'LIKE', "%$keyword%");
                    });
            });
        }

        $item_count = $item_query->count();
        $item_get = $item_choose->get();
        $item_results = $item_query->paginate(25);

        return view('pages.item-out', [
            'items' => $item_results,
            'choosen' => $item_get,
            'item_count' => $item_count
        ]);
    }

    public function outed(Request $request)
    {
//        dd($request);
        $item = Item::query()->findOrFail($request->item_id);

        if ($request->qty > $item->qty) {
            return redirect()->back()->with('error', 'Stok Item Kurang.');
        }

        $item->qty = $item->qty - $request->qty;
        if ($item->save()) {
            $out = new ItemOut();
            $out->item_id = $item->id;
            $out->qty = $request->qty;
            $out->save();
        }

        return redirect()->back()->with('success', 'Item berhasil dikeluarkan');
    }

    public function outDestroy($id)
    {
        $out = ItemOut::query()->findOrFail($id);
        $out->delete();

        return redirect()->back()->with('success', 'Item keluar berhasil dihapus');
    }

    public function update(Request $request)
    {
//        dd($request);
        if (empty($request->input('id', false))) {
            try {
                $this->newItem = ItemIn::query()->create($request->all());

                $item_find = Item::query()->where('product_name', $this->newItem->product_name)->first();

                if (empty($item_find)) {
                    $item = Item::query()->create([
                        'product_name' => $this->newItem->product_name,
                        'qty' => $this->newItem->qty,
                        'date_in' => Carbon::now()
                    ]);
                } else {
                    $item_find->qty = $item_find->qty + $request->qty;
                    $item_find->save();
                }
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }

            return redirect()->back()->with('success', 'Item baru berhasil ditambahkan');
        }

        $item = ItemIn::query()->findOrFail($request->id);
        $item->update($request->all());

        if (!empty($request->qty)) {
            $items = Item::query()->where('product_name' , $item->product_name)->first();

            if ($items->qty < $request->qty) {
                return redirect()->back()->with('error', 'Stok tidak cukup.');
            }

            $items->qty = $request->qty;
            $items->save();
        }

        return redirect()->back()->with('success', 'Item berhasil diubah');
    }

    public function destroy($id)
    {
        $item = ItemIn::query()->findOrFail($id);

        if ($item->delete()) {
            $items = Item::query()->where('product_name', $item->product_name)->first();
            $items->qty = $items->qty - $item->qty;
            $items->save();
        }


        return redirect()->back()->with('success', 'Item berhasil dihapus');
    }
}
