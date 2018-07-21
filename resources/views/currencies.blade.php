@extends('layouts.app')
@section('title',$title)
@section('content')

    @if(!empty($currencies))
        <table class="table table-bordered" style="margin-top: 25px">
            <thead>
            <th class="text-center" scope="col">Id</th>
            <th class="text-center" scope="col">Title</th>
            <th class="text-center" scope="col">Short Name</th>
            <th class="text-center" scope="col">Logo</th>
            <th class="text-center" scope="col">Price</th>
            <th class="text-center" scope="col">Edit</th>
            <th class="text-center" scope="col">Delete</th>
            </thead>
            <tbody>
            @foreach($currencies as $currency)
                <tr>
                    <td class="text-center">{{$currency->id}}</td>
                    <td class="text-center"><a href="{{route('show-currency',['id'=>$currency->id])}}">
                            {{$currency->title}}</a></td>
                    <td class="text-center">{{$currency->short_name}}</td>
                    <td class="text-center"><img src="{{$currency->logo_url}}" alt=""></td>
                    <td class="text-center">{{$currency->price}}</td>
                    @component('edit_delete_buttons',['currencyId'=>$currency->id])
                    @endcomponent
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="row" style="margin-top: 25px;">
            <div class="col-md-3">
                <div class="alert alert-warning" role="alert">No currencies</div>
            </div>
        </div>
    @endif
@endsection