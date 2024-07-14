@extends('layouts.app')

@section('title', 'Hasil Klasterisasi')

@section('content')
    @php
        $total = count($results);
    @endphp
    <div class="container">
        <h2>Hasil Klasterisasi</h2>
        <h5 class="btn-primary rounded-pill p-2" style="border-radius: 5px">Total Mahasiswa: {{ $total }}</h5>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
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
                    @php
                        $number = 1;
                    @endphp
                    @foreach ($results as $row)
                        <tr>
                            <td>{{ $number }}</td>
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
                        @php
                            $number += 1;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br><br><br>
@endsection
