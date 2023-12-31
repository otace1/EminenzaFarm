<table class="w-full border rounded">
    <thead>
        <tr class="font-medium bg-gray-200 ">
            <th class="p-2">{{ __('Service') }}</th>
            <th class="p-2">{{ __('Options') }}</th>
            <th class="p-2">{{ __('Price') }}</th>
            <th class="p-2">{{ __($order->order_service->service->duration ?? 'Fixed') }}</th>
        </tr>
    </thead>
    <tbody>

        @if (!empty($order))
            <tr class="font-light border-b ">
                <td class="p-2">{{ $order->order_service->service->name ?? '' }}</td>
                <td class="p-2">{{ $order->order_service->options ?? '' }}</td>
                <td class="p-2">{{ currencyFormat($order->order_service->price ?? '') }}</td>
                <td class="p-2">{{ $order->order_service->hours ?? '' }}</td>
            </tr>
        @endif

    </tbody>
</table>
