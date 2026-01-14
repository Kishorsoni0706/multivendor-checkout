<x-app-layout>
    <div class="max-w-6xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Your Cart</h1>

        {{-- Success / Error messages --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        {{-- Check if cart has items --}}
        @if($groupedCart->isEmpty())
            <p class="text-gray-500">Your cart is empty.</p>
        @else
            {{-- Loop through vendors --}}
            @foreach($groupedCart as $vendorName => $items)
                <div class="bg-white p-6 rounded shadow mb-6">
                    <h2 class="text-xl font-semibold mb-3">Vendor: {{ $vendorName }}</h2>
                    
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="border-b">
                                <th class="text-left p-2">Product</th>
                                <th class="text-center p-2">Quantity</th>
                                <th class="text-right p-2">Price</th>
                                <th class="text-right p-2">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $vendorTotal = 0; @endphp
                            @foreach($items as $item)
                                @php
                                    $subtotal = $item->quantity * $item->product->price;
                                    $vendorTotal += $subtotal;
                                @endphp
                                <tr class="border-b">
                                    <td class="p-2">{{ $item->product->name }}</td>
                                    <td class="text-center p-2">{{ $item->quantity }}</td>
                                    <td class="text-right p-2">${{ number_format($item->product->price, 2) }}</td>
                                    <td class="text-right p-2">${{ number_format($subtotal, 2) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3" class="text-right font-bold p-2">Vendor Total:</td>
                                <td class="text-right font-bold p-2">${{ number_format($vendorTotal, 2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endforeach

            {{-- Checkout Button --}}
            <form method="POST" action="{{ route('checkout') }}">
                @csrf
                <div class="text-right">
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold px-6 py-3 rounded">
                        Proceed to Checkout
                    </button>
                </div>
            </form>
        @endif
    </div>
</x-app-layout>
