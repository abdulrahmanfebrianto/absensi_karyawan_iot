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
        <button class="nav-link active" id="in-tab" data-bs-toggle="tab" data-bs-target="#in" type="button" role="tab" aria-controls="in" aria-selected="true">Masuk</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="out-tab" data-bs-toggle="tab" data-bs-target="#out" type="button" role="tab" aria-controls="out" aria-selected="false">Keluar</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="absen-tab" data-bs-toggle="tab" data-bs-target="#absen" type="button" role="tab" aria-controls="absen" aria-selected="false">Absen</button>
    </li>
</ul>

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="in" role="tabpanel" aria-labelledby="in-tab">
        <div class="row">
            <div class="col-md-6">
                <h2>Masuk</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inAttendances as $attendance)
                        <tr>
                            <td>{{ $attendance->date }}</td>
                            <td>{{ $attendance->time }}</td>
                            <td>{{ $attendance->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="out" role="tabpanel" aria-labelledby="out-tab">
        <div class="row">
            <div class="col-md-6">
                <h2>Keluar</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($outAttendances as $attendance)
                        <tr>
                            <td>{{ $attendance->date }}</td>
                            <td>{{ $attendance->time }}</td>
                            <td>{{ $attendance->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="absen" role="tabpanel" aria-labelledby="absen-tab">
        <div class="row">
            <div class="col-md-6">
                <h2>Absen</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Denda</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($absences as $absence)
                        <tr>
                            <td>{{ $absence['date'] }}</td>
                            <td>{{ $absence['penalty'] }}</td>
                            <td>{{ $absence['status'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
