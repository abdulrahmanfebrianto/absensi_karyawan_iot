@extends('employee.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Cetak Slip Gaji</h1>
</div>

<form method="post" action="{{ route('employee.payroll.showForm') }}" enctype="multipart/form-data" style="margin-right: 20px;">
    @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="month">Bulan:</label>
                <input type="month" id="month" name="month" class="form-control">
                </select>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Cari</button>
</form>
@endsection