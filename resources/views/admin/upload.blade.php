@extends('layouts.app')

@section('title', 'Upload Data Mahasiswa')

@section('content')
<div class="container">
    <h2>Upload Data Mahasiswa</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('admin.uploadFile') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file">Pilih file Excel:</label>
            <input type="file" class="form-control" id="file" name="file" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
    <form method="POST" action="{{ route('admin.deleteAll') }}" class="mt-3">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete All Data</button>
    </form>
</div>
@endsection
