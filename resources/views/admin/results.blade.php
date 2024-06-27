@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Hasil Klasterisasi</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NPM</th>
                <th>Nama Mahasiswa</th>
                <th>Algoritma</th>
                <th>Statistika</th>
                <th>Nilai Project</th>
                <th>Kedisiplinan Akademik</th>
                <th>Keaktifan</th>
                <th>Cluster</th>
                <th>Label Cluster</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $row)
                <tr>
                    <td>{{ $row->NPM }}</td>
                    <td>{{ $row->Nama_Mahasiswa }}</td>
                    <td>{{ $row->Algoritma }}</td>
                    <td>{{ $row->Statistika }}</td>
                    <td>{{ $row->Nilai_Project }}</td>
                    <td>{{ $row->Kedisiplinan_Akademik }}</td>
                    <td>{{ $row->Keaktifan }}</td>
                    <td>{{ $row->Cluster }}</td>
                    <td>{{ $row->Label_Cluster }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
