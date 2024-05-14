@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Slip Gaji</h1>
</div>

<div class="col-md-12 text-center mt-3">
    <a href="{{ route('payrolls.pdf') }}" class="btn btn-primary">Download PDF</a>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            @foreach ($payrolls as $payroll)
                                <div>
                                    <p>Nama: {{ $payroll->name }}</p>
                                    <p>Bulan: {{ $payroll->month }}</p>
                                    <p>Jumlah Hari Kerja: {{ $payroll->count }}</p>
                                    <p>Jumlah Hari Libur: {{ $payroll->holiday }}</p>
                                    <p>Jumlah Telat: {{ $payroll->late }}</p>
                                    <p>Total Gaji Pokok: Rp {{ number_format($payroll->total_salary, 0, ',', '.') }}</p>
                                    <p>Bonus: Rp {{ number_format($payroll->bonus, 0, ',', '.') }}</p>
                                    <p>Bensin: Rp {{ number_format($payroll->total_transport, 0, ',', '.') }}</p>
                                    <p>Denda: Rp {{ number_format($payroll->cut, 0, ',', '.') }}</p>
                                    <p>Total: Rp {{ number_format($payroll->amount, 0, ',', '.') }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 text-center mt-3">
    <a href="show" class="btn btn-primary">Back</a>
</div>
@endsection
