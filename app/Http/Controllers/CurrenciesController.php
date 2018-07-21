<?php

namespace App\Http\Controllers;


use App\Currency;
use App\Http\Requests\StoreCurrencyRequest;
use Illuminate\Support\Facades\DB;

class CurrenciesController extends Controller
{


    public function main()
    {
        return view('main', ['title' => 'Currency market']);
    }

    public function index()
    {
        $currencies = DB::table('currency')->select('id', 'title', 'short_name', 'logo_url', 'price')->get();
        return view('currencies', ['title' => 'Currency market', 'currencies' => $currencies->toArray()]);
    }

    public function create()
    {
        return view('add_currency');
    }

    public function show($id)
    {
        $currency = DB::table('currency')->select('logo_url', 'title', 'short_name', 'price')
            ->where('id', $id)->get()->toArray();;
        return view('currency', ['title' => $currency[0]->title, 'id' => $id, 'currency' => $currency[0]]);
    }

    public function store(StoreCurrencyRequest $request)
    {
        $request->validated();
        $currency = new Currency(['title' => $request->post('title'), 'short_name' => $request->post('short_name'),
            'logo_url' => $request->post('logo_url'), 'price' => $request->post('price')]);
        $currency->save();
        return redirect()->route('Currencies');
    }

    public function destroy($id)
    {
        $currency = Currency::find($id);
        $currency->delete();
        return redirect()->route('Currencies');
    }

    public function edit($id)
    {
        $currency = DB::table('currency')->select('logo_url', 'title', 'short_name', 'price')
            ->where('id', $id)->get()->toArray();;
        return view('edit', ['id' => $id, 'currency' => $currency[0]]);
    }

    public function update(StoreCurrencyRequest $request, $id)
    {
        $request->validated();
        $currency = Currency::find($id);
        $currency->title = $request->post('title');
        $currency->short_name = $request->post('short_name');
        $currency->logo_url = $request->post('logo_url');
        $currency->price = $request->post('price');
        $currency->save();
        return redirect()->route('show-currency', ['id' => $id]);
    }
}