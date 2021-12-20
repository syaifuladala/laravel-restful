@extends('template')

@section('title', 'Order List')

@section('container')

<div class="container">
    <br>
    <div class="row">
        <div class="col-auto me-auto">
            <h2 id="cust_name"></h2>
        </div>
        <div class="col-auto">
            @include('modal')
        </div>
    </div>

    <script>
        document.getElementById("cust_name").innerHTML = localStorage['id_cust'] + localStorage['custname'];
    </script>
    
    <table class="table table-border table-stripped">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Order</th>
                <th>Produk</th>
                <th>Harga (Satuan)</th>
                <th>Jumlah</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>

<script src="{{ url('/assets/pages/orderlist.js') }}"></script>
@endsection