@extends('layout.main')
@section('content')

    <h1>Order details</h1>

    <div class="row">
        <div class="col-md-8">
            <div class="card order-details">
                <div class="card-header">Product list</div>
                @foreach($order['items'] as $item)
                    <div class="row no-gutters">
                        <div class="col-md-2 align-self-center text-center">
                            <div class="card-block">
                                <img src="https://picsum.photos/100?random={{$item['code']}}" class="" alt="...">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <h5 class="card-title title">{{ $item['title'] }}</h5>
                                <div class="mb-1 card-text description">{{ $item['description'] }}</div>
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
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header"># {{ $order['code'] }} - Summary</div>
                <div class="m-1 row">
                    <span class="col-6 font-weight-bold">Placement date: </span>
                    <span class="col-6 text-right"> {{ date('F d, Y', strtotime($order['placement_date'])) }}</span>
                </div>
                <hr class="m-0">
                <div class="m-1 row">
                    <span class="col-6 font-weight-bold">Items Subotal: </span>
                    <span class="col-6 text-right">$ {{ number_format($order['total_items'], 2) }}</span>
                </div>
                <div class="m-1 row">
                    <span class="col-6 font-weight-bold">Shipping costs: </span>
                    <span class="col-6 text-right">$ {{ number_format($order['shipping'], 2) }}</span>
                </div>
                <div class="m-1 row">
                    <span class="col-6 font-weight-bold">Other taxes: </span>
                    <span class="col-6 text-right">$ {{ number_format($order['taxes'], 2) }}</span>
                </div>
                <hr class="m-0">
                <div class="m-1 row">
                    <span class="col-6 font-weight-bold">TOTAL: </span>
                    <span class="col-6 font-weight-bold text-right">$ {{ number_format($order['total_cost'], 2) }}</span>
                </div>
                <div class="m-1 row">
                    <span class="col-6 font-weight-bold">Payment method: </span>
                    <span class="col-6 text-right">{{ $order['payment_method']['name'] . '/(' . $order['payment_method']['value'].')' }}</span>
                </div>
                <hr class="m-0">
                <div class="m-1 row">
                    <span class="col-6 font-weight-bold">Shipping address: </span>
                </div>
                <div class="m-1 text-right">
                    <span class="col">{{ $order['address']['street'] }}</span><br>
                    <span class="col">{{ $order['address']['city'] . ', ' . $order['address']['state'] }}</span><br>
                    <span class="col">{{ $order['address']['country'] }}</span>
                </div>
            </div>
            <br>
            <div class="text-center">
                <a href="/orders" class="btn btn-primary">Back to order list</a>
            </div>
        </div>
    </div>

@endsection