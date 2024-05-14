@extends('dashboard.layouts.main')

@section('container')
<style>
    label {
        font-weight: bold;
    }
</style>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Payroll</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif

<a href="/dashboard/payroll/show" class ="btn btn-primary mb-3">Slip Gaji</a>

<form method="post" action="/dashboard/payroll" enctype="multipart/form-data" style="margin-right: 20px;">
    @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="month">Bulan:</label>
                <input type="month" id="month" name="month" class="form-control" onchange="updatePayrollInfo()">
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="post">Karyawan:</label>
                <select name="post" id="post" class="form-control" onchange="updatePayrollInfo()">
                    @foreach ($posts as $post)
                        <option value="{{ $post->id }}" data-tag="{{ $post->tag }}">{{ $post->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="selected_name_display" class="form-label">Nama:</label>
                <span id="selected_name_display"></span>
                <input type="hidden" id="name" name="name">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="postTag" class="form-label">Tag:</label>
                <span id="post_tag_display"></span>
                <input type="hidden" id="tag" name="tag">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="attendance_count_display" class="form-label">Jumlah Hari Kerja:</label>
                <span id="attendance_count_display"></span>
                <input type="hidden" id="count" name="count">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="holiday_display" class="form-label">Jumlah Libur:</label>
                <span id="holiday_display"></span>
                <input type="hidden" id="holiday" name="holiday">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="late_count_display" class="form-label">Jumlah Telat:</label>
                <span id="late_count_display"></span>
                <input type="hidden" id="late" name="late">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="salary" class="form-label">Gaji Pokok:</label>
                <span id="salary_display"></span>
                <input type="hidden" id="salary" name="salary">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="holiday_salary" class="form-label">Gaji Libur:</label>
                <span id="holiday_salary_display"></span>
                <input type="hidden" id="holiday_salary" name="holiday_salary">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="bonus" class="form-label">Bonus:</label>
                <span id="bonus_display"></span>
                <input type="hidden" id="bonus" name="bonus">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="total_salary" class="form-label">Total Gaji Pokok:</label>
                <span id="total_salary_display"></span>
                <input type="hidden" id="total_salary" name="total_salary">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="cut" class="form-label">Denda:</label>
                <span id="cut_display"></span>
                <input type="hidden" id="cut" name="cut">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="total_transport" class="form-label">Bensin:</label>
                <span id="total_transport_display"></span>
                <input type="hidden" id="total_transport" name="total_transport">
            </div>
        </div> 
    </div>

    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label for="amount" class="form-label">Total:</label>
            <span id="amount_display"></span>
            <input type="hidden" id="amount" name="amount">
        </div>
    </div>
    
    <div class="form-group mb-3">
        <label for="note" class="form-label ">Catatan:</label>
        <input type="text" class="form-control @error('note') is-invalid @enderror" id="note" name="note" required value="{{ old('note') }}">
        @error('note')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary mb-3">Kirim</button>
</div>
</form>

<script>
    function formatCurrency(amount) {
    return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(amount);
        }

    document.addEventListener("DOMContentLoaded", function() {
        updatePayrollInfo();
    });

    document.getElementById('post').addEventListener('change', updatePayrollInfo);
    document.getElementById('month').addEventListener('change', updatePayrollInfo);

    function updatePayrollInfo() {
        var postSelect = document.getElementById('post');
        var monthSelect = document.getElementById('month');
        var monthYearValue = monthSelect.value; 
        var monthYearArray = monthYearValue.split('-'); 

        var month = monthYearArray[1]; 
        var year = monthYearArray[0];
        var postId = postSelect.value;
        var tag = postSelect.options[postSelect.selectedIndex].getAttribute('data-tag');

        document.getElementById('post_tag_display').textContent = tag;
        document.getElementById('tag').value = tag;

        var postOptions = postSelect.options;
    for (var i = 0; i < postOptions.length; i++) {
        var option = postOptions[i];
        if (option.getAttribute('data-tag') === tag) {
            var selectedName = option.textContent;
            
            document.getElementById('selected_name_display').textContent = selectedName;
            document.getElementById('name').value = selectedName;
            break; 
        }
    }

        fetch('/dashboard/payroll/get-salary/' + postId)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                var salary = data.salary;
                document.getElementById('salary_display').textContent = formatCurrency(salary);
                document.getElementById('salary').value = salary;
            })
            .catch(error => console.error('Error:', error));

        // Update Late Count
        fetch('/dashboard/payroll/get-late-count/' + tag + '/' + monthYearValue)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                var lateCount = data.lateCount;
                document.getElementById('late_count_display').textContent = lateCount;
                document.getElementById('late').value = lateCount;

                fetch('/dashboard/payroll/get-fine-value')
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(settingData => {
                        var fineValue = settingData.fineValue;
                        var denda = lateCount * fineValue;

                        document.getElementById('cut_display').textContent = formatCurrency(denda);
                        document.getElementById('cut').value = denda;
                    })
                    .catch(error => console.error('Error:', error));
            })
            .catch(error => console.error('Error:', error));

        fetch('/dashboard/payroll/get-attendance-count/' + tag + '/' + monthYearValue)
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        var attendanceCount = data.attendanceCount;
        document.getElementById('attendance_count_display').textContent = attendanceCount;
        document.getElementById('count').value = attendanceCount;

     
        var year = monthYearValue.split('-')[0]; 
        var daysInMonth = new Date(year, month, 0).getDate(); 
        var holidayCount = daysInMonth - attendanceCount;
        document.getElementById('holiday_display').textContent = holidayCount;
        document.getElementById('holiday').value = holidayCount;

        var bonus = holidayCount <= 2 ? 100000 : 0;
        document.getElementById('bonus').value = bonus;
        document.getElementById('bonus_display').textContent = formatCurrency(bonus);

               
                fetch('/dashboard/payroll/get-holiday-salary/' + postId)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        var add = 1;
                        var holidaySalary = parseFloat(data.holiday_salary);
                        var Salaryholiday = holidaySalary * add;
                        document.getElementById('holiday_salary_display').textContent = formatCurrency(Salaryholiday);
                        document.getElementById('holiday_salary').value = Salaryholiday;

                    
                        var salary = parseFloat(document.getElementById('salary').value);
                        var totalSalary = attendanceCount * salary;
                        document.getElementById('total_salary_display').textContent = formatCurrency(totalSalary);
                        document.getElementById('total_salary').value = totalSalary;

                    })
                    .catch(error => console.error('Error:', error));
                                        
                fetch('/dashboard/payroll/get-transport')
                    .then(response => {
                         if (!response.ok) {
                             throw new Error('Network response was not ok');
                            }
                        return response.json();
                             })
                .then(data => {
                        var fuelValue = data.fuelValue;
                        var totalTransport = fuelValue * attendanceCount;
                        document.getElementById('total_transport_display').textContent =  formatCurrency(totalTransport);
                        document.getElementById('total_transport').value = totalTransport;
                     })
                        .catch(error => console.error('Error:', error));
            })
            .catch(error => console.error('Error:', error));
    Promise.all([
        fetch('/dashboard/payroll/get-salary/' + postId).then(res => res.json()),
        fetch('/dashboard/payroll/get-late-count/' + tag + '/' + monthYearValue).then(res => res.json()),
        fetch('/dashboard/payroll/get-attendance-count/' + tag + '/' + monthYearValue).then(res => res.json()),
        fetch('/dashboard/payroll/get-holiday-salary/' + postId).then(res => res.json()),
        fetch('/dashboard/payroll/get-transport').then(res => res.json()),
        fetch('/dashboard/payroll/get-fine-value').then(res => res.json())
    ]).then(([salaryData, lateCountData, attendanceCountData, SalaryholidayData, transportData,fineValueData]) => {
        
        var salary = salaryData.salary;
        var lateCount = lateCountData.lateCount;
        var attendanceCount = attendanceCountData.attendanceCount;
        var Salaryholiday = parseFloat(document.getElementById('holiday_salary').value);
        var fuelValue = transportData.fuelValue;
        var fineValue = fineValueData.fineValue;
        
        var year = monthYearValue.split('-')[0]; 
        var daysInMonth = new Date(year, month, 0).getDate(); 
        var holidayCount = daysInMonth - attendanceCount;

        var add = 1;
        var totalHoliday = add * Salaryholiday;
        var totalTransport = fuelValue * attendanceCount;
        var bonus = holidayCount <= 2 ? 100000 : 0;
        var denda = lateCount * fineValue;
        var totalSalary = attendanceCount * salary;
        var amount = totalHoliday + totalSalary + bonus + totalTransport - denda ; 
        
        document.getElementById('amount_display').textContent = formatCurrency(amount);
        document.getElementById('amount').value = amount;

    })
    .catch(error => console.error('Error:', error));
    }
   

</script>


@endsection