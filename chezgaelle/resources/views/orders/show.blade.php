<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="orders max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="order-details bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1>Commande n° {{ $order[0]->order_id}}</h1>
                    @foreach($order as $line)
                    <div class="order-line p-6 bg-white border-b border-gray-200 flex">
                        <div class="picture-name">
                            <img class="img-list" src="{{ URL::to('/') }}/images/products/{{ $line->product->picture_slug }}">
                            <p>{{ $line->product->name }}</p>
                        </div>
                        <div class="details-list">
                            <p>Quantité : {{ $line->quantity }}</p>
                            <p>Prix unitaire : {{ number_format($line->price, 2, ',', ' ') }} €</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>