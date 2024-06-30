<!-- resources/views/saw/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Proses Perankingan SAW</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NPM</th>
                <th>Nama Mahasiswa</th>
                <th>Total Score</th>
                <th>Ranking</th>
                @foreach($criterias as $criteria)
                    <th>{{ $criteria->sub_criteria }}</th>
                @endforeach
                <th>Potensi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penilaians as $penilaian)
                <tr>
                    <td>{{ $penilaian->NPM }}</td>
                    <td>{{ $penilaian->pendaftar->Nama_Mahasiswa }}</td>
                    <td>{{ number_format($penilaian->SAW_Score, 2) }}</td>
                    <td>{{ $penilaian->Rank }}</td>
                    @foreach($criterias as $criteria)
                        @php
                            $column_name = strtolower(str_replace(' ', '_', $criteria->sub_criteria));
                        @endphp
                        <td>{{ $penilaian->$column_name }}</td>
                    @endforeach
                    <td>{{ $penilaian->pendaftar->Potensi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
