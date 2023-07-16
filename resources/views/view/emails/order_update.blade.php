@extends('view.emails.raw_plain')
@section('body')
    <div role="article" aria-roledescription="email" aria-label="Confirm your email address" lang="en">
        <div>
            <div style="background-color: #f3f4f6; padding-top: 40px; padding-bottom: 40px">
                <div style="margin-left: auto; margin-right: auto; width: 91.666667%">
                    <div style="display: flex; align-items: center; justify-content: space-between">

                        <img src="{{ url(setting('websiteLogo', asset('images/logo.png'))) }}" alt="logo"
                            style="max-width: 100%; vertical-align: middle; line-height: 1; border: 0; height: 64px; width: 96px">

                        <p style="font-weight: 300; color: #9ca3af">
                            {{ $order->updated_at->format('Y-m-d') }}
                            {{ __('at') }}
                            {{ $order->updated_at->format('h:ia') }}
                        </p>
                    </div>

                    <p style="margin-top: 32px; font-size: 20px; font-weight: 700">{{ __('Hi') }}
                        {{ $order->user->name }}, </p>
                    <p style="font-size: 14px; font-weight: 300">{{ __('This is your receipt.') }}</p>
                </div>
            </div>
            {{-- order details --}}
            <div style="margin-left: auto; margin-right: auto; width: 91.666667%; padding-top: 40px; padding-bottom: 40px;">
                {{-- From details --}}
                <div>
                    <p style="color: #9ca3af;">{{ __('From') }}</p>
                    @empty($order->vendor)
                        {{-- taxi order --}}
                        <p style="font-size: 20px; font-weight: 700;">{{ $order->taxi_order->vehicle_type->name }}</p>
                        <p style="font-size: 14px; font-weight: 300;">{{ $order->taxi_order->pickup_address }}</p>
                    @else
                        {{-- regular order --}}
                        @empty($order->package_type)
                            <p style="font-size: 20px; font-weight: 700;">{{ $order->vendor->name }}</p>
                            <p style="font-size: 14px; font-weight: 300;">{{ $order->vendor->address }}</p>
                            {{-- if is package order --}}
                        @else
                            <p style="font-size: 20px; font-weight: 700;">{{ $order->stops->first()->name }} -
                                ({{ $order->stops->first()->phone }})
                            </p>
                            <p style="font-size: 14px; font-weight: 300;">
                                {{ $order->stops->first()->delivery_address->address }}</p>
                        @endempty
                    @endempty
                </div>
                <div style="height: 24px"></div>
                {{-- To details --}}
                <div>
                    @empty($order->package_type)
                        <p style="color: #9ca3af;">{{ __('To') }}</p>
                        {{-- taxi order --}}
                        @empty($order->vendor)
                            <p style="font-size: 14px; font-weight: 300;">{{ $order->taxi_order->dropoff_address }}</p>
                        @else
                            {{-- regular order --}}
                            @empty($orderStop->delivery_addres)
                                <p style="font-size: 20px; font-weight: 700;">{{ __('Customer Pickup') }}</p>
                            @else
                                <p style="font-size: 20px; font-weight: 700;">{{ $order->delivery_address->name ?? '' }}</p>
                                <p style="font-size: 14px; font-weight: 300;">{{ $order->delivery_address->address ?? '' }}</p>
                            @endempty
                        @endempty
                    @else
                        {{-- all stops details --}}
                        @foreach ($order->stops as $orderStop)
                            {{-- skip the first one --}}
                            @if ($loop->first)
                                @continue
                            @endif
                            <div>
                                <p style="color: #9ca3af;">{{ __('Stop') }}</p>
                                <p style="font-size: 20px; font-weight: 700;">{{ $orderStop->name }} -
                                    ({{ $orderStop->phone }})
                                </p>
                                <p style="font-size: 14px; font-weight: 300;">{{ $orderStop->delivery_address->address }}
                                </p>
                            </div>
                        @endforeach
                    @endempty
                </div>
                <div style="height: 24px;"></div>
                {{-- order details --}}
                @empty($order->package_type)
                    {{-- if is not taxi_order --}}
                    @if (empty($order->taxi_order))
                        <div>
                            {{-- items --}}
                            <p style="color: #9ca3af;">{{ __('Products') }}</p>
                            <hr style="margin-top: 8px">
                            @foreach ($order->products as $orderProduct)
                                <div class="space-x-2"
                                    style="display: flex; align-items: flex-start; justify-content: space-between; border-bottom-width: 1px; padding-top: 8px; padding-bottom: 8px">
                                    <p class="space-x-4" style="display: flex;">
                                        <span style="font-weight: 300;">
                                            {{ $orderProduct->quantity }} x
                                        </span>
                                        <span
                                            style="--tw-space-x-reverse: 0; margin-right: calc(16px * var(--tw-space-x-reverse)); margin-left: calc(16px * calc(1 - var(--tw-space-x-reverse)));">{{ $orderProduct->product->name }}</span>
                                    </p>
                                    <span
                                        style="font-weight: 500; --tw-space-x-reverse: 0; margin-right: calc(8px * var(--tw-space-x-reverse)); margin-left: calc(8px * calc(1 - var(--tw-space-x-reverse)))">{{ currencyFormat($orderProduct->price) }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @else
                    <div>
                        <p>{{ __('Package details') }}</p>
                        <p style="font-size: 20px; font-weight: 700;">{{ $order->package_type->name }}</p>
                        {{-- weight,width,length,height --}}
                        <p class="space-x-2"
                            style="display: flex; align-items: flex-start; justify-content: space-between; border-bottom-width: 1px; padding-top: 8px; padding-bottom: 8px;">
                            <span style="font-weight: 300;">{{ __('Weight') }}</span>
                            <span
                                style="font-weight: 500; --tw-space-x-reverse: 0; margin-right: calc(8px * var(--tw-space-x-reverse)); margin-left: calc(8px * calc(1 - var(--tw-space-x-reverse)));">{{ $order->weight }}kg</span>
                        </p>
                        <p class="space-x-2"
                            style="display: flex; align-items: flex-start; justify-content: space-between; border-bottom-width: 1px; padding-top: 8px; padding-bottom: 8px;">
                            <span style="font-weight: 300;">{{ __('Width') }}</span>
                            <span
                                style="font-weight: 500; --tw-space-x-reverse: 0; margin-right: calc(8px * var(--tw-space-x-reverse)); margin-left: calc(8px * calc(1 - var(--tw-space-x-reverse)));">{{ $order->width }}cm</span>
                        </p>
                        <p class="space-x-2"
                            style="display: flex; align-items: flex-start; justify-content: space-between; border-bottom-width: 1px; padding-top: 8px; padding-bottom: 8px;">
                            <span style="font-weight: 300;">{{ __('Length') }}</span>
                            <span
                                style="font-weight: 500; --tw-space-x-reverse: 0; margin-right: calc(8px * var(--tw-space-x-reverse)); margin-left: calc(8px * calc(1 - var(--tw-space-x-reverse)));">{{ $order->length }}cm</span>
                        </p>
                        <p class="space-x-2"
                            style="display: flex; align-items: flex-start; justify-content: space-between; border-bottom-width: 1px; padding-top: 8px; padding-bottom: 8px;">
                            <span style="font-weight: 300;">{{ __('Height') }}</span>
                            <span
                                style="font-weight: 500; --tw-space-x-reverse: 0; margin-right: calc(8px * var(--tw-space-x-reverse)); margin-left: calc(8px * calc(1 - var(--tw-space-x-reverse)));">{{ $order->height }}cm</span>
                        </p>
                    </div>
                @endempty
                {{-- amount breakdown --}}
                <div class="space-y-2" style="margin-top: 24px; margin-bottom: 24px">
                    {{-- subtotal, discount, delivery fee, tax --}}
                    <div style="display: flex; justify-content: space-between;">
                        <p style="font-weight: 500;">{{ __('Subtotal') }}</p>
                        <p style="font-size: 18px; font-weight: 600">{{ currencyFormat($order->sub_total) }}</p>
                    </div>
                    <div
                        style="display: flex; justify-content: space-between; --tw-space-y-reverse: 0; margin-top: calc(8px * calc(1 - var(--tw-space-y-reverse))); margin-bottom: calc(8px * var(--tw-space-y-reverse));">
                        <p style="font-weight: 500;">{{ __('Discount') }}</p>
                        <p style="font-size: 18px; font-weight: 600;">{{ currencyFormat($order->discount) }}</p>
                    </div>
                    <div
                        style="display: flex; justify-content: space-between; --tw-space-y-reverse: 0; margin-top: calc(8px * calc(1 - var(--tw-space-y-reverse))); margin-bottom: calc(8px * var(--tw-space-y-reverse));">
                        <p style="font-weight: 500;">{{ __('Delivery fee') }}</p>
                        <p style="font-size: 18px; font-weight: 600;">{{ currencyFormat($order->delivery_fee) }}</p>
                    </div>
                    <div
                        style="display: flex; justify-content: space-between; --tw-space-y-reverse: 0; margin-top: calc(8px * calc(1 - var(--tw-space-y-reverse))); margin-bottom: calc(8px * var(--tw-space-y-reverse));">
                        <p style="font-weight: 500;">{{ __('Tax') }}</p>
                        <p style="font-size: 18px; font-weight: 600;">{{ currencyFormat($order->tax) }}</p>
                    </div>
                    {{-- order fees --}}
                    @if (!empty($order->fees))
                        @foreach (json_decode($order->fees ?? []) as $orderFee)
                            <div
                                style="display: flex; justify-content: space-between; --tw-space-y-reverse: 0; margin-top: calc(8px * calc(1 - var(--tw-space-y-reverse))); margin-bottom: calc(8px * var(--tw-space-y-reverse));">
                                <p style="font-weight: 500;">{{ $orderFee->name }}</p>
                                <p style="font-size: 18px; font-weight: 600;">{{ currencyFormat($orderFee->amount) }}
                                </p>
                            </div>
                        @endforeach
                    @endif
                </div>
                <hr>
                <div style="margin-top: 16px; margin-bottom: 16px; display: flex; justify-content: space-between">
                    <p style="font-size: 20px; font-weight: 600;">{{ __('Total') }}</p>
                    <p style="font-size: 18px; font-weight: 700;">{{ currencyFormat($order->total) }}</p>
                </div>
                <div style="display: flex; justify-content: space-between;">
                    <p style="font-weight: 500;">{{ __('Payment Method') }}</p>
                    <p style="font-size: 18px; font-weight: 300;">{{ $order->payment_method->name ?? '' }}</p>
                </div>

            </div>
            <p
                style="margin-top: 16px; margin-bottom: 16px; text-align: center; font-size: 14px; font-weight: 300; color: #9ca3af">
                © {{ date('Y') }} {{ setting('websiteName', env('APP_NAME')) }}
            </p>
        </div>
    </div>
@endsection

@push('style')
    <style>
        .space-x-2> :not([hidden])~ :not([hidden]) {
            --tw-space-x-reverse: 0;
            margin-right: calc(8px * var(--tw-space-x-reverse));
            margin-left: calc(8px * calc(1 - var(--tw-space-x-reverse)))
        }

        .space-x-4> :not([hidden])~ :not([hidden]) {
            --tw-space-x-reverse: 0;
            margin-right: calc(16px * var(--tw-space-x-reverse));
            margin-left: calc(16px * calc(1 - var(--tw-space-x-reverse)))
        }

        .space-y-2> :not([hidden])~ :not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(8px * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(8px * var(--tw-space-y-reverse))
        }

        html,
        body {
            color: #000000;
        }
    </style>
@endpush
