@extends('layouts.master')
@section('header')

@endsection

@section('content')

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

<h1>Form</h1>
<form action="{{ route('employee.store') }}" method="post">
    @csrf
    <div class="mb-3">
      <label for="nik" class="form-label">NIK</label>
      <input type="text" name="nik" class="form-control" id="nik" placeholder="Enter NIK" value="{{ old('nik') }}">
      @if ($errors->has('nik'))
        <span class="text-danger">{{ $errors->first('nik') }}</span>
    @endif
    </div>
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name" value="{{ old('name') }}">
    @if ($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
    </div>

    <button class="btn btn-primary">Submit</button>
</form>
@endsection

@section('footer')

@endsection
