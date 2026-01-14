<x-app-layout>
<div class="max-w-7xl mx-auto py-8">

<h1 class="text-2xl font-bold mb-4">Admin Orders</h1>

<table class="w-full bg-white shadow rounded">
    <thead>
        <tr class="border-b">
            <th>ID</th>
            <th>Vendor</th>
            <th>Customer</th>
            <th>Total</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr class="border-b text-center">
            <td>{{ $order->id }}</td>
            <td>{{ $order->vendor->name }}</td>
            <td>{{ $order->user->name }}</td>
            <td>${{ $order->total }}</td>
            <td>{{ $order->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
</x-app-layout>
