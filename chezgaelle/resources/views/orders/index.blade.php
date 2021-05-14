<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="orders max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="cart bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1>À Valider</h1>
                <div class="order-by-status">
                    @foreach($validation as $order)
                    <div class="inside-cart p-6 bg-white border-b border-gray-200 flex">
                        <div class="details-list">
                            <h1>Commande n° {{ $order->id}}</h1>
                            <p>{{ $order->pickup_date }}</p>
                            <p>{{ $order->order_status }}</p>
                        </div>
                        <div class="buttons">
                            <a href="{{ route('orders.show',  $order->id) }}">
                                <button class="order-buttons">
                                    Details
                                </button>
                            </a>
                            <form method="post" action="{{ route('orders.update', [$order->id, $order->order_status]) }}">
                                @csrf
                                <button class="order-buttons">
                                    Valider
                                </button>
                            </form>  
                            
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="cart bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1>À Préparer</h1>
                <div class="order-by-status">
                    @foreach($preparation as $order)
                    <div class="inside-cart p-6 bg-white border-b border-gray-200 flex">
                        <div class="details-list">
                            <h1>Commande n° {{ $order->id}}</h1>
                            <p>{{ $order->pickup_date }}</p>
                            <p>{{ $order->order_status }}</p>
                        </div>
                        <div class="buttons">
                            <a href="{{ route('orders.show',  $order->id) }}">
                                <button class="order-buttons">
                                    Details
                                </button>
                            </a>
                            <form method="post" action="{{ route('orders.update', [$order->id, $order->order_status]) }}">
                                @csrf
                                <button class="order-buttons">
                                    Commande prête
                                </button>
                            </form>                            
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="cart bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1>À Récupérer</h1>
                <div class="order-by-status">
                    @foreach($reception as $order)
                    <div class="inside-cart p-6 bg-white border-b border-gray-200 flex">
                        <div class="details-list">
                            <h1>Commande n° {{ $order->id}}</h1>
                            <p>{{ $order->pickup_date }}</p>
                            <p>{{ $order->order_status }}</p>
                        </div>
                        <div class="buttons">
                            <a href="{{ route('orders.show',  $order->id) }}">
                                <button class="order-buttons">
                                    Details
                                </button>
                            </a>
                            <form method="post" action="{{ route('orders.update', [$order->id, $order->order_status]) }}">
                                @csrf
                                <button class="order-buttons">
                                    Commande délivrée
                                </button>
                            </form>  
                            
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>