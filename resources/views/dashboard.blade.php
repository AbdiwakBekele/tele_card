@extends('layout.adminLayout')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Total Agents: {{$agents->count()}}</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Total Sub-Agents: {{$sub_agents->count()}}</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Total Staff: {{$staffs->count()}}</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Sales(Birr)
                </div>
                <div class="card-body"><canvas id="myWeeksSales" width="100%" height="30"></canvas>
                    <div id="maxWeekSales" data-max-week-sales="{{ $maxWeekSales }}"></div>
                </div>
            </div>
        </div>

    </div>

    <!-- Staffs Table -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Staffs
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Title</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Title</th>
                    </tr>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($staffs as $staff)
                    <tr>
                        <td>{{$staff->fullname}}</td>
                        <td> {{$staff->email}} </td>
                        <td>{{$staff->title}}</td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
var chartWeeksSalesData = @json($chartWeeksSalesData);
var dates = @json($dates);

var maxWeekSales = Number(document.getElementById('maxWeekSales').getAttribute('data-max-week-sales'));
</script>

@endsection