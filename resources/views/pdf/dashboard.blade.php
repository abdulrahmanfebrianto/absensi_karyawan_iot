<table
    style="border-collapse: collapse; font-family: Arial, sans-serif; font-size: 12px; width: 100%; border: 1px solid black;">
    <tr>
        <td colspan="2" class="p-2 border border-black"
            style="padding-right: 50px; border: 1px solid black; vertical-align: top;">
            <img src="{{ asset('img/logo.jpeg') }}" width="80px" style="vertical-align: top;">
        </td>
        <td colspan="6" class="border border-black" style="border: 1px solid black; vertical-align: top;">
            <p style="margin: 0; vertical-align: top;">
                STMJ VETERAN<br>
                Susu Telur Madu Jahe Veteran<br>
                Pertokoan Mojoroto No. 18, Jl. Kawi, Mojoroto, Kec. Mojoroto, Kota Kediri, Jawa Timur 64112
            </p>
        </td>
    </tr>
    @foreach ($payrolls as $payroll)
        <tr>
            <th colspan="8"
                style="background-color: red; color: white; text-align: center; padding: 5px; border: 1px solid black; vertical-align: middle;">
                SLIP GAJI STMJ VETERAN
            </th>
        </tr>
        <tr>
            <td colspan="8"
                style="background-color: #f2f2f2; text-align: left; padding: 5px; border: 1px solid black;">
                Nama : {{ $payroll->name }}
            </td>
        </tr>
        <tr>
            <td colspan="8"
                style="background-color: #f2f2f2; text-align: left; padding: 5px; border: 1px solid black;">
                Bulan : {{ $payroll->month }}
            </td>
        </tr>
        <tr>
            <td style="padding: 5px;">Total Gaji Pokok</td>
            <td>:</td>
            <td colspan="6" style="text-align: right; padding: 5px;">Rp
                {{ number_format($payroll->total_salary, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td style="padding: 5px;">Bonus</td>
            <td>:</td>
            <td colspan="6" style="text-align: right; padding: 5px;">Rp
                {{ number_format($payroll->bonus, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td style="padding: 5px;">Uang Bensin</td>
            <td>:</td>
            <td colspan="6" style="text-align: right; padding: 5px;">Rp
                {{ number_format($payroll->total_transport, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td style="padding: 5px;">Denda</td>
            <td>:</td>
            <td colspan="6" style="text-align: right; padding: 5px;">Rp
                {{ number_format($payroll->cut, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td colspan="6" style="border-top: 2px solid black; padding-top: 5px;">Total Gaji</td>
            <td colspan="2" style="border-top: 2px solid black; padding-top: 5px; text-align: right;">Rp
                {{ number_format($payroll->amount, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td colspan="8" style="border: 1px solid black; padding: 5px;">
                Hari Kerja: {{ $payroll->count }} hari<br>
                Hari Libur: {{ $payroll->holiday }} hari<br>
                Telat : {{ $payroll->late }} hari<br>
            </td>
        </tr>
</table>
@endforeach
