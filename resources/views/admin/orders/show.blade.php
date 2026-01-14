<x-app-layout>
<div class="max-w-7xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Order #{{ $order->id }}</h1>
    <p>Vendor: {{ $order->vendor->name }}</p>
    <p>Customer: {{ $order->user->name }}</p>
    <p>Status: {{ $order->status }}</p>
    <p>Total: ${{ $order->total }}</p>

    <h2 class="mt-4 text-xl font-semibold">Items</h2>
    <table class="w-full bg-white shadow rounded mt-2">
        <thead>
            <tr class="border-b">
                <th class="p-2 text-left">Product</th>
                <th class="p-2 text-left">Quantity</th>
                <th class="p-2 text-left">Price</th>
                <th class="p-2 text-left">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-2">{{ $item->product->name }}</td>
                    <td class="p-2">{{ $item->quantity }}</td>
                    <td class="p-2">${{ $item->price }}</td>
                    <td class="p-2">${{ $item->quantity * $item->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>
