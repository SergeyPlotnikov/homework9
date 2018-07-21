@extends('layouts.app')

@section('title',$title)

@section('content')
    <table class="table table-bordered" style="margin-top: 25px">
        <thead>
        <tr class="text-center">
            <th class="text-center" scope="col">Title</th>
            <th class="text-center" scope="col">Short Name</th>
            <th class="text-center" scope="col">Logo</th>
            <th class="text-center" scope="col">Price</th>
            <th class="text-center" scope="col">Edit</th>
            <th class="text-center" scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="text-center">{{$currency->title}}</td>
            <td class="text-center">{{$currency->short_name}}</td>
            <td class="text-center"><img src="{{$currency->logo_url}}" alt=""></td>
            <td class="text-center">{{$currency->price}}</td>
            @component('edit_delete_buttons',['currencyId'=>$id])
            @endcomponent
        </tr>
        </tbody>
    </table>
@endsection