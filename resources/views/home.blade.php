<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Exchange</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
    </head>
    <body>
        <div class="container">
            @if($exchangeData)
            <h1>Exchange Services</h1>
            <div class="row">
                @php 
                    $results = json_decode($exchangeData->data);
                    $usd = [];
                    $eur = [];
                    $gbp = [];
                @endphp

                @foreach($results as $key => $value)
                    @php
                        $usd[] = $value->usd;
                        $eur[] = $value->eur;
                        $gbp[] = $value->gbp;
                    @endphp
                <div class="col-4">
                    <h5>{{ ucfirst($key) }}</h5>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            USD
                            <span class="badge badge-primary badge-pill">{{ $value->usd }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            EUR
                            <span class="badge badge-primary badge-pill">{{ $value->eur }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            GBP
                            <span class="badge badge-primary badge-pill">{{ $value->gbp }}</span>
                        </li>
                    </ul>
                </div>
                @endforeach
            </div>
            <hr />
            <div class="row">
                <div class="col-4">
                    <h1>Optimal Results</h1>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            USD
                            <span class="badge badge-success badge-pill">{{ min($usd) }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            EUR
                            <span class="badge badge-success badge-pill">{{ min($eur) }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            GBP
                            <span class="badge badge-success badge-pill">{{ min($gbp) }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            @else
            <div class="alert alert-warning mt-5">
                No up-to-date data. Please update exchange values via console.
            </div>
            @endif
        </div>
    </body>
</html>
