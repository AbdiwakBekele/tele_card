@extends('layout.adminLayout')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Stock Dashboard</h1>

    <div class="row">
        <div class="col">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body center">
                    <h5> Total Stock</h5>
                    <hr>
                    {{ number_format($total_stock, 2, '.', ',') }} ETB
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body center">
                    <h5>Available Amount</h5>
                    <hr>

                </div>
            </div>
        </div>

        <div class="col">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body center">
                    <h5>Today's Consumption</h5>
                    <hr>

                    {{ number_format($today_sales, 2, '.', ',') }} ETB
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body center">
                    <h5>This Month's Consumption</h5>
                    <hr>
                    {{ number_format($thisMonth_sales, 2, '.', ',') }} ETB
                </div>
            </div>
        </div>
    </div>

    <!-- Each Pin Status | Today sales & Amount -->
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Each E-Pin Today Sales
                </div>
                <div class="card-body"><canvas id="epin_today_sales" width="100%" height="40"></canvas>
                    <div id="maxTodaySales" data-max-today-sales="{{ $maxTodaySales }}"></div>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Each Available Stock
                </div>
                <div class="card-body"><canvas id="epin_stock" width="100%" height="40"></canvas>
                    <div id="maxStock" data-max-stock="{{ $maxStock }}"></div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
var chartStockData = @json($chartStockData);
var chartTodaySalesData = @json($chartTodaySalesData);
var maxStock = Number(document.getElementById('maxStock').getAttribute('data-max-stock'));
var maxTodaySales = Number(document.getElementById('maxTodaySales').getAttribute('data-max-today-sales'));
</script>

@endsection