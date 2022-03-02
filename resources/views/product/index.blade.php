@extends('app')

@section('content')
    <section class="flex flex-col max-w-lg mx-auto px-4 py-8 bg-white rounded-lg shadow sm:px-6 md:px-8 lg:px-10">
        {{ Form::open(['route' => 'product.store']) }}
        <div class="flex flex-col">
            <x-input.text name="name" required="true" label="Nosaukums" />
        </div>
        <div class="gap-4 md:columns-2 sm:columns-1">
            <x-input.text name="ean13" required="true" label="EAN13 kods" />
            <x-input.text name="stock" required="true" label="Atlikums" />
        </div>
        <div class="gap-4 md:columns-2 sm:columns-1">
            <x-input.text name="cost" required="true" label="Pašizmaksa" />
            <x-input.text name="price" required="true" label="Cena ar PVN" />
        </div>
        <div class="flex flex-col">
            {{ Form::submit('Pievienot', ['class' => 'py-2 px-4 bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg']) }}
        </div>
        {{ Form::close() }}
    </section>
    <section class="max-w-2xl mx-auto my-8">
        <table class="table table-auto mx-auto bg-white shadow rounded-lg">
            <thead>
                <tr>
                    <th class="px-3 py-2 border-b-2">EAN-13 <x-sort column="ean13" /></th>
                    <th class="px-3 py-2 border-b-2">Nosukums <x-sort column="name" /></th>
                    <th class="px-3 py-2 border-b-2">Atlikums <x-sort column="stock" /></th>
                    <th class="px-3 py-2 border-b-2">Pašizmaksa <x-sort column="cost" /></th>
                    <th class="px-3 py-2 border-b-2">Cena ar PVN <x-sort column="price" /></th>
                </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td class="px-2 py-2 border-b-2">{{ $product->ean13 }}</td>
                    <td class="px-2 py-2 border-b-2">{{ $product->name }}</td>
                    <td class="px-2 py-2 border-b-2">{{ $product->stock }}</td>
                    <td class="px-2 py-2 border-b-2">{{ $product->cost }}</td>
                    <td class="px-2 py-2 border-b-2">{{ $product->price }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
@endsection
