<?php

namespace App\Http\Controllers;


use App\Currency;
use App\Http\Requests\StoreCurrencyRequest;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

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
        if (Gate::allows('add-currency')) {
            return view('add_currency');
        } else {
            return redirect('/');
        }
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
        if (Gate::allows('save-currency')) {
            $currency = new Currency(['title' => $request->post('title'), 'short_name' => $request->post('short_name'),
                'logo_url' => $request->post('logo_url'), 'price' => $request->post('price')]);
            $currency->save();
            return redirect()->route('Currencies');
        } else {
            return redirect('/');
        }
    }

    public function destroy($id)
    {
        if (Gate::allows('delete-currency')) {
            $currency = Currency::find($id);
            $currency->delete();
            return redirect()->route('Currencies');
        } else {
            return redirect('/');
        }
    }

    public function edit($id)
    {
        if (Gate::allows('edit-currency')) {
            $currency = DB::table('currency')->select('logo_url', 'title', 'short_name', 'price')
                ->where('id', $id)->get()->toArray();
            return view('edit', ['id' => $id, 'currency' => $currency[0]]);
        } else {
            return redirect('/');
        }
    }

    public function update(StoreCurrencyRequest $request, $id)
    {
        if (Gate::allows('update-currency')) {
            $request->validated();
            $currency = Currency::find($id);
            $currency->title = $request->post('title');
            $currency->short_name = $request->post('short_name');
            $currency->logo_url = $request->post('logo_url');
            $currency->price = $request->post('price');
            $currency->save();
            return redirect()->route('show-currency', ['id' => $id]);
        } else {
            return redirect('/');
        }
    }
}