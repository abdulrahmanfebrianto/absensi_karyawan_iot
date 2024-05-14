@extends('employee.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Employee</h1>
    </div>

    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('employee.posts.index') }}" method="GET">
                <div class="form-group">
                    <label for="filterDate">Filter dengan Tanggal:</label>
                    <input type="date" id="filterDate" name="filterDate" class="form-control">
                    <button type="submit" class="btn btn-primary mt-2">Filter</button>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <form action="{{ route('employee.posts.index') }}" method="GET">
                <div class="form-group">
                    <label for="filterMonth">Filter dengan Bulan:</label>
                    <input type="month" id="filterMonth" name="filterMonth" class="form-control">
                    <button type="submit" class="btn btn-primary mt-2">Filter</button>
                </div>
            </form>
        </div>
    </div>

    <div class="mt-3"></div>

    <ul class="nav nav-tabs" id="attendanceTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="in-tab" data-bs-toggle="tab" data-bs-target="#in" type="button"
                role="tab" aria-controls="in" aria-selected="true">Data</button>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="in" role="tabpanel" aria-labelledby="in-tab">
            <div class="row">
                <div class="col-md-12">
                    <h2>Data Absensi</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Waktu Masuk</th>
                                <th>Status Masuk</th>
                                <th>Waktu Keluar</th>
                                <th>Status Keluar</th>
                                <th>Denda</th>
                                <th>Status Kerja</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dailyRecords as $record)
                                <tr>
                                    <td>{{ $record['date'] }}</td>
                                    <td>{{ $record['time_in'] }}</td>
                                    <td>{{ $record['status_in'] }}</td>
                                    <td>{{ $record['time_out'] }}</td>
                                    <td>{{ $record['status_out'] }}</td>
                                    <td>{{ $record['penalty'] }}</td>
                                    <td>{{ $record['work_status'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                </div>
            </div>
        </div>
    </div>
@endsection
