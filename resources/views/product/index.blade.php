@extends('app')

@section('content')
    <section class="">
        {{ Form::open(['route' => 'product.store']) }}
        <div>
            {{ Form::label('ean13', 'EAN-13 kods') }}
            {{ Form::text('ean13') }}
            <span>@if($errors->has('ean13')){{ $errors->first('ean13') }}@endif</span>
        </div>
        <div>
            {{ Form::label('name', 'Nosaukums') }}
            {{ Form::text('name') }}
            <span>@if($errors->has('name')){{ $errors->first('name') }}@endif</span>
        </div>
        <div>
            {{ Form::label('stock', 'Atlikums') }}
            {{ Form::text('stock') }}
            <span>@if($errors->has('stock')){{ $errors->first('stock') }}@endif</span>
        </div>
        <div>
            {{ Form::label('cost', 'Pašizmaksa') }}
            {{ Form::text('cost') }}
            <span>@if($errors->has('cost')){{ $errors->first('cost') }}@endif</span>
        </div>
        <div>
            {{ Form::label('price', 'Cena ar PVN') }}
            {{ Form::text('price') }}
            <span>@if($errors->has('price')){{ $errors->first('price') }}@endif</span>
        </div>
        {{ Form::submit('Pievienot') }}
        {{ Form::close() }}
    </section>
    <section>
        <table>
            <tr>
                <th>EAN-13 <x-sort column="ean13" /></th>
                <th>Nosukums <x-sort column="name" /></th>
                <th>Atlikums <x-sort column="stock" /></th>
                <th>Pašizmaksa <x-sort column="cost" /></th>
                <th>Cena ar PVN <x-sort column="price" /></th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->ean13 }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->cost }}</td>
                    <td>{{ $product->price }}</td>
                </tr>
            @endforeach
        </table>
    </section>
@endsection
