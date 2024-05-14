@foreach ($payrolls as $payroll)
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Slip Gaji</h1>
</div>
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

