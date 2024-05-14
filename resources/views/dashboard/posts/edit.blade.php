@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Karyawan</h1>
  </div>

  <div class="col-lg-8">
      <form method="post" action="/dashboard/posts/{{ $post->id }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="start" class="form-label">Mulai Bekerja</label>
          <input type="date" class="form-control @error('start') is-invalid @enderror" id="start" 
          name="start" required value="{{old('start', $post->start)}}">
          @error('start')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
      </div>
      <div class="mb-3">
        <label for="salary" class="form-label">Gaji Pokok</label>
        <input type="text" class="form-control @error('salary') is-invalid @enderror" id="salary"
        name="salary" required value="{{old('salary', $post->salary)}}">
        @error('salary')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
      <label for="holiday_salary" class="form-label">Gaji Libur</label>
      <input type="text" class="form-control @error('holiday_salary') is-invalid @enderror" id="holiday_salary"
      name="holiday_salary" required value="{{old('holiday_salary', $post->holiday_salary)}}">
      @error('holiday_salary')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
  </div>
      <button type="submit" class="btn btn-primary">Edit</button>
      </form>
  </div>

@endsection