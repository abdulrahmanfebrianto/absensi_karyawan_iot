@extends('employee.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Karyawan</h1>
  </div>

  <div class="col-lg-8">
      <form method="post" action="/employee/profile/{{ $post->tag }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Nama</label>
          <input type="text" class="form-control" id="name" 
          name="name" value="{{ $post->name }}">
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="address"
        name="address" value="{{ $post->address }}">
    </div>
    <div class="mb-3">
      <label for="telp" class="form-label">Telp</label>
      <input type="text" class="form-control" id="telp"
      name="telp" value="{{ $post->telp }}">
  </div>
      <div class="mb-3">
      <label for="image" class="form-label">Edit Foto</label>
      @if($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" alt="Employee Image" width="150" class="img-thumbnail d-block">
      @endif
      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
    </div>
      <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control" id="username"
      name="username" value="{{ $user->username }}">
  </div>
      <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="text" class="form-control" id="password"
      name="password">
  </div>
      <button type="submit" class="btn btn-primary">Save</button>
      <a href="/employee/profile/show" class="btn btn-success"><svg class="bi"><use xlink:href="#arrow-left"/></svg> Back to profile</a>
      </form>
  </div>

@endsection