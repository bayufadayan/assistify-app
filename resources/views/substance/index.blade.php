@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tahap 2: Substance Test</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form method="POST" action="{{ route('substance.store') }}">
        @csrf
        <div class="form-group">
            <label for="npm">Pilih Pendaftar</label>
            <select name="npm" id="npm" class="form-control" required>
                <option value="">Pilih Pendaftar</option>
                @foreach ($pendaftars as $pendaftar)
                    <option value="{{ $pendaftar->NPM }}">{{ $pendaftar->Nama_Mahasiswa }} ({{ $pendaftar->NPM }})</option>
                @endforeach
            </select>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sub Kriteria</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Keterampilan Analitis</td>
                    <td>
                        @foreach(range(10, 100, 10) as $value)
                            <label class="btn btn-outline-{{ $value <= 40 ? 'danger' : ($value <= 70 ? 'warning' : 'success') }} {{ (session('randomData.keterampilan_analitis') == $value) ? 'active' : '' }}">
                                <input type="radio" name="keterampilan_analitis" value="{{ $value }}" autocomplete="off" {{ (session('randomData.keterampilan_analitis') == $value) ? 'checked' : '' }}> {{ $value }}
                            </label>
                        @endforeach
                        @error('keterampilan_analitis')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>Pemahaman Konsep</td>
                    <td>
                        @foreach(range(10, 100, 10) as $value)
                            <label class="btn btn-outline-{{ $value <= 40 ? 'danger' : ($value <= 70 ? 'warning' : 'success') }} {{ (session('randomData.pemahaman_konsep') == $value) ? 'active' : '' }}">
                                <input type="radio" name="pemahaman_konsep" value="{{ $value }}" autocomplete="off" {{ (session('randomData.pemahaman_konsep') == $value) ? 'checked' : '' }}> {{ $value }}
                            </label>
                        @endforeach
                        @error('pemahaman_konsep')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>Ketepatan</td>
                    <td>
                        @foreach(range(10, 100, 10) as $value)
                            <label class="btn btn-outline-{{ $value <= 40 ? 'danger' : ($value <= 70 ? 'warning' : 'success') }} {{ (session('randomData.ketepatan') == $value) ? 'active' : '' }}">
                                <input type="radio" name="ketepatan" value="{{ $value }}" autocomplete="off" {{ (session('randomData.ketepatan') == $value) ? 'checked' : '' }}> {{ $value }}
                            </label>
                        @endforeach
                        @error('ketepatan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>Waktu Penyelesaian</td>
                    <td>
                        @foreach(range(10, 100, 10) as $value)
                            <label class="btn btn-outline-{{ $value <= 30 ? 'success' : ($value <= 70 ? 'warning' : 'danger') }} {{ (session('randomData.waktu_penyelesaian') == $value) ? 'active' : '' }}">
                                <input type="radio" name="waktu_penyelesaian" value="{{ $value }}" autocomplete="off" {{ (session('randomData.waktu_penyelesaian') == $value) ? 'checked' : '' }}> {{ $value }}
                            </label>
                        @endforeach
                        @error('waktu_penyelesaian')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Submit Nilai</button>
        {{-- <a href="{{ route('substance.random') }}" class="btn btn-secondary">Generate Data Acak</a> --}}
    </form>
</div>
@endsection
