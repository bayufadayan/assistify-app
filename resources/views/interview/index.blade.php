@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tahap 1: Interview</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form method="POST" action="{{ route('interview.store') }}">
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
                    <td>Pemecahan Masalah</td>
                    <td>
                        @foreach(range(10, 100, 10) as $value)
                            <label class="btn btn-outline-{{ $value <= 40 ? 'danger' : ($value <= 70 ? 'warning' : 'success') }} {{ old('pemecahan_masalah') == $value ? 'active' : '' }}">
                                <input type="radio" name="pemecahan_masalah" value="{{ $value }}" autocomplete="off" {{ old('pemecahan_masalah') == $value ? 'checked' : '' }}> {{ $value }}
                            </label>
                        @endforeach
                        @error('pemecahan_masalah')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>Komunikasi</td>
                    <td>
                        @foreach(range(10, 100, 10) as $value)
                            <label class="btn btn-outline-{{ $value <= 40 ? 'danger' : ($value <= 70 ? 'warning' : 'success') }} {{ old('komunikasi') == $value ? 'active' : '' }}">
                                <input type="radio" name="komunikasi" value="{{ $value }}" autocomplete="off" {{ old('komunikasi') == $value ? 'checked' : '' }}> {{ $value }}
                            </label>
                        @endforeach
                        @error('komunikasi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>Gestur</td>
                    <td>
                        @foreach(range(10, 100, 10) as $value)
                            <label class="btn btn-outline-{{ $value <= 40 ? 'danger' : ($value <= 70 ? 'warning' : 'success') }} {{ old('gestur') == $value ? 'active' : '' }}">
                                <input type="radio" name="gestur" value="{{ $value }}" autocomplete="off" {{ old('gestur') == $value ? 'checked' : '' }}> {{ $value }}
                            </label>
                        @endforeach
                        @error('gestur')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>Kepemimpinan</td>
                    <td>
                        @foreach(range(10, 100, 10) as $value)
                            <label class="btn btn-outline-{{ $value <= 40 ? 'danger' : ($value <= 70 ? 'warning' : 'success') }} {{ old('kepemimpinan') == $value ? 'active' : '' }}">
                                <input type="radio" name="kepemimpinan" value="{{ $value }}" autocomplete="off" {{ old('kepemimpinan') == $value ? 'checked' : '' }}> {{ $value }}
                            </label>
                        @endforeach
                        @error('kepemimpinan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>Pengetahuan</td>
                    <td>
                        @foreach(range(10, 100, 10) as $value)
                            <label class="btn btn-outline-{{ $value <= 40 ? 'danger' : ($value <= 70 ? 'warning' : 'success') }} {{ old('pengetahuan') == $value ? 'active' : '' }}">
                                <input type="radio" name="pengetahuan" value="{{ $value }}" autocomplete="off" {{ old('pengetahuan') == $value ? 'checked' : '' }}> {{ $value }}
                            </label>
                        @endforeach
                        @error('pengetahuan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>Waktu Merespon</td>
                    <td>
                        @foreach(range(10, 100, 10) as $value)
                            <label class="btn btn-outline-{{ $value <= 30 ? 'success' : ($value <= 70 ? 'warning' : 'danger') }} {{ old('waktu_merespon') == $value ? 'active' : '' }}">
                                <input type="radio" name="waktu_merespon" value="{{ $value }}" autocomplete="off" {{ old('waktu_merespon') == $value ? 'checked' : '' }}> {{ $value }}
                            </label>
                        @endforeach
                        @error('waktu_merespon')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Submit Nilai</button>
    </form>
</div>
@endsection
