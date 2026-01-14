<x-app-layout>
<div class="max-w-6xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Your Orders</h1>

    @foreach($orders as $order)
        <div class="bg-white p-6 rounded shadow mb-6">
            <h2 class="text-xl font-semibold mb-2">Order #{{ $order->id }} - Vendor: {{ $order->vendor->name }}</h2>
            <p>Status: <span class="font-bold">{{ $order->status }}</span></p>
            <p>Total: ${{ $order->total }}</p>

            <h3 class="mt-3 font-semibold">Items:</h3>
            <ul class="list-disc ml-5">
                @foreach($order->items as $item)
                    <li>{{ $item->product->name }} × {{ $item->quantity }} = ${{ $item->quantity * $item->price }}</li>
                @endforeach
            </ul>
        </div>
    @endforeach

    @if($orders->isEmpty())
        <p class="text-gray-500">You have no orders yet.</p>
    @endif
</div>
</x-app-layout>
