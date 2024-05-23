@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambahkan Data Baru</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/posts" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="tag" class="form-label">Tag</label>
                <select class="form-control @error('tag') is-invalid @enderror" id="tag" name="tag" required>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->tag }}" {{ old('tag') == $tag->tag ? 'selected' : '' }}>
                            {{ $tag->tag }}</option>
                    @endforeach
                </select>
                @error('tag')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    required value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                    name="address" required value="{{ old('address') }}">
                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="telp" class="form-label">Telp</label>
                <input type="text" class="form-control @error('telp') is-invalid @enderror" id="telp" name="telp"
                    required value="{{ old('telp') }}">
                @error('telp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="start" class="form-label">Mulai Bekerja</label>
                <input type="date" class="form-control @error('start') is-invalid @enderror" id="start"
                    name="start" required value="{{ old('start') }}">
                @error('start')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Gaji Pokok</label>
                <select class="form-control @error('salary') is-invalid @enderror" id="salary" name="salary" required>
                    <option value="0">
                        Silahkan Pilih Gaji Pokok</option>
                    @foreach ($gaji as $g)
                        <option value="{{ $g->nominal }}" {{ old('salary') == $g->nominal ? 'selected' : '' }}>
                            {{ $g->nominal }} [{{ $g->name }}] </option>
                    @endforeach
                </select>
                @error('salary')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="holiday_salary" class="form-label">Gaji Libur</label>
                <input type="text" class="form-control" id="holiday_salary" name="holiday_salary" readonly>
            </div>
            <script>
                document.getElementById('salary').addEventListener('change', function() {
                    var salaryValue = parseFloat(this.value);
                    if (!isNaN(salaryValue)) {
                        document.getElementById('holiday_salary').value = salaryValue * 2;
                    } else {
                        document.getElementById('holiday_salary').value = '';
                    }
                });
            </script>
            <div class="mb-3">
                <label for="image" class="form-label">Upload Foto</label>
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                    name="image">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Status</label>
                <input type="text" class="form-control  @error('role') is-invalid @enderror" id="role"
                    name="role" required value="{{ old('role') }}">
                @error('role')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control  @error('username') is-invalid @enderror" id="username"
                    name="username" required value="{{ old('username') }}">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control  @error('password') is-invalid @enderror" id="password"
                    name="password" required value="{{ old('password') }}">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
@endsection
