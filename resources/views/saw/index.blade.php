@extends('layouts.app')

@section('title', 'Hasil Akhir')

@section('content')
<div class="container">
    <h2>Proses Perankingan SAW</h2>
    <h5 class="btn-primary rounded-pill p-2" style="border-radius: 5px">Total Mahasiswa: {{ $total }}</h5>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
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
                @php
                    $number = 1;
                @endphp
                @foreach($penilaians as $penilaian)
                    <tr>
                        <td>{{ $number }}</td>
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
