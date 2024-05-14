@extends('dashboard.layouts.main')

@section('container')

<form method="post" action="{{ route('dashboard.payroll.showForm') }}" enctype="multipart/form-data" style="margin-right: 20px;">
    @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="month">Bulan:</label>
                <input type="month" id="month" name="month" class="form-control">
                </select>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="post">Karyawan:</label>
                <select name="post" id="post" class="form-control">
                    @foreach ($posts as $post)
                        <option value="{{ $post->id }}">{{ $post->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Cari</button>
    <a href="/dashboard/payroll" class="btn btn-primary">Back</a>
</form>



@endsection