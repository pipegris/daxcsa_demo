@extends('layout.main')
@section('content')

    <h1>My Orders</h1>
    @foreach($orders as $order)
        <div class="mb-4 card order">
            <div class="card-header">
                <div class="row">
                    <div class="status-section col-md-4 col-6">
                        <div class="order-status">ORDER <span
                                    class="order-status">{{ strtoupper($order['status']) }}</span></div>
                        <div class="placement-date">{{ date('F d, Y', strtotime($order['placement_date'])) }}</div>
                    </div>
                    <div class="total-section col-md-5 col-6">TOTAL <br>
                        <div class="total-order">USD$ {{ $order['total_cost'] }}</div>
                    </div>
                    <div class="details-section col-md-3 col-12 text-right">
                        <div class="order-code w-100">ORDER # {{ $order['code'] }}</div>
                        <div class="order-links">
                            <a href="/orders/{{ $order['id'] }}">
                                Order Details</a>&nbsp;&nbsp;<span class="text-muted">|</span>&nbsp;&nbsp;
                            <a class="disabled" href="#">Invoice</a>
                        </div>
                    </div>
                </div>
            </div>
            @foreach($order['items'] as $item)
                <div class="row no-gutters">
                    <div class="col-md-2 align-self-center text-center">
                        <div class="card-block">
                            <img src="https://picsum.photos/100?random={{$item['code']}}" class="" alt="...">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h5 class="card-title text-truncate">{{ $item['title'] }}</h5>
                            <div class="mb-1 card-text text-truncate">{{ $item['description'] }}</div>
                            <div class="card-text row">
                                <div class="col-6">
                                    $ {{ $item['price'] }}&nbsp;<small class="text-muted">
                                        x {{ $item['quantity'] }}</small>
                                </div>
                                <div class="col-6 text-right item-total">
                                    $ {{ number_format($item['quantity']*$item['price'],2) }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card-body">
                            <button disabled class="w-100 mb-1 btn btn-primary">Buy again</button>
                            <button disabled class="w-100 btn btn-secondary">Write a review</button>
                        </div>
                    </div>

                </div>
                @if(!$loop->last)
                    <hr class="m-0">
                @endif
            @endforeach
        </div>

    @endforeach

@endsection