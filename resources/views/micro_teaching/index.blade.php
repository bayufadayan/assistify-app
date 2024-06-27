@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tahap 3: Micro Teaching</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form method="POST" action="{{ route('micro_teaching.store') }}">
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
                    <td>Penyampaian Materi</td>
                    <td>
                        @foreach(range(10, 100, 10) as $value)
                            <label class="btn btn-outline-{{ $value <= 40 ? 'danger' : ($value <= 70 ? 'warning' : 'success') }} {{ old('penyampaian_materi') == $value ? 'active' : '' }}">
                                <input type="radio" name="penyampaian_materi" value="{{ $value }}" autocomplete="off" {{ old('penyampaian_materi') == $value ? 'checked' : '' }}> {{ $value }}
                            </label>
                        @endforeach
                        @error('penyampaian_materi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>Interaksi dengan Peserta</td>
                    <td>
                        @foreach(range(10, 100, 10) as $value)
                            <label class="btn btn-outline-{{ $value <= 40 ? 'danger' : ($value <= 70 ? 'warning' : 'success') }} {{ old('interaksi_dengan_peserta') == $value ? 'active' : '' }}">
                                <input type="radio" name="interaksi_dengan_peserta" value="{{ $value }}" autocomplete="off" {{ old('interaksi_dengan_peserta') == $value ? 'checked' : '' }}> {{ $value }}
                            </label>
                        @endforeach
                        @error('interaksi_dengan_peserta')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>Pengelolaan Waktu</td>
                    <td>
                        @foreach(range(10, 100, 10) as $value)
                            <label class="btn btn-outline-{{ $value <= 40 ? 'danger' : ($value <= 70 ? 'warning' : 'success') }} {{ old('pengelolaan_waktu') == $value ? 'active' : '' }}">
                                <input type="radio" name="pengelolaan_waktu" value="{{ $value }}" autocomplete="off" {{ old('pengelolaan_waktu') == $value ? 'checked' : '' }}> {{ $value }}
                            </label>
                        @endforeach
                        @error('pengelolaan_waktu')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>Persiapan</td>
                    <td>
                        @foreach(range(10, 100, 10) as $value)
                            <label class="btn btn-outline-{{ $value <= 40 ? 'danger' : ($value <= 70 ? 'warning' : 'success') }} {{ old('persiapan') == $value ? 'active' : '' }}">
                                <input type="radio" name="persiapan" value="{{ $value }}" autocomplete="off" {{ old('persiapan') == $value ? 'checked' : '' }}> {{ $value }}
                            </label>
                        @endforeach
                        @error('persiapan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>Durasi Pengajaran</td>
                    <td>
                        @foreach(range(10, 100, 10) as $value)
                            <label class="btn btn-outline-{{ $value <= 30 ? 'success' : ($value <= 70 ? 'warning' : 'danger') }} {{ old('durasi_pengajaran') == $value ? 'active' : '' }}">
                                <input type="radio" name="durasi_pengajaran" value="{{ $value }}" autocomplete="off" {{ old('durasi_pengajaran') == $value ? 'checked' : '' }}> {{ $value }}
                            </label>
                        @endforeach
                        @error('durasi_pengajaran')
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
