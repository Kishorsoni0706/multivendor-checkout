<x-app-layout>
<div class="max-w-7xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">All Orders</h1>

    <table class="w-full bg-white shadow rounded">
        <thead>
            <tr class="border-b">
                <th class="p-2 text-left">Order ID</th>
                <th class="p-2 text-left">Vendor</th>
                <th class="p-2 text-left">Customer</th>
                <th class="p-2 text-left">Total</th>
                <th class="p-2 text-left">Status</th>
                <th class="p-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-2">{{ $order->id }}</td>
                    <td class="p-2">{{ $order->vendor->name }}</td>
                    <td class="p-2">{{ $order->user->name }}</td>
                    <td class="p-2">${{ $order->total }}</td>
                    <td class="p-2">{{ $order->status }}</td>
                    <td class="p-2">
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="text-blue-600 hover:underline">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if($orders->isEmpty())
        <p class="text-gray-500 mt-4">No orders found.</p>
    @endif
</div>
</x-app-layout>
