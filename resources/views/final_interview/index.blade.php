@extends('layouts.app')

@section('title', 'Final Interview - Scoring')

@section('content')
@include('layouts.scoring_navigation')

    <div class="container">
        <h2>Tahap 4: Final Interview</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('final_interview.store') }}">
            @csrf
            <div class="form-group">
                <label for="npm">Pilih Pendaftar</label>
                <select name="npm" id="npm" class="form-control" required>
                    <option value="">Pilih Pendaftar</option>
                    @foreach ($pendaftars as $pendaftar)
                        <option value="{{ $pendaftar->NPM }}">{{ $pendaftar->Nama_Mahasiswa }} ({{ $pendaftar->NPM }})
                        </option>
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
                        <td>Komitmen Jangka Panjang</td>
                        <td>
                            @foreach (range(10, 100, 10) as $value)
                                <label
                                    class="btn btn-outline-{{ $value <= 40 ? 'danger' : ($value <= 70 ? 'warning' : 'success') }} {{ old('komitmen_jangka_panjang') == $value ? 'active' : '' }}">
                                    <input type="radio" name="komitmen_jangka_panjang" value="{{ $value }}"
                                        autocomplete="off" {{ old('komitmen_jangka_panjang') == $value ? 'checked' : '' }}>
                                    {{ $value }}
                                </label>
                            @endforeach
                            @error('komitmen_jangka_panjang')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Visi Pribadi</td>
                        <td>
                            @foreach (range(10, 100, 10) as $value)
                                <label
                                    class="btn btn-outline-{{ $value <= 40 ? 'danger' : ($value <= 70 ? 'warning' : 'success') }} {{ old('visi_pribadi') == $value ? 'active' : '' }}">
                                    <input type="radio" name="visi_pribadi" value="{{ $value }}"
                                        autocomplete="off" {{ old('visi_pribadi') == $value ? 'checked' : '' }}>
                                    {{ $value }}
                                </label>
                            @endforeach
                            @error('visi_pribadi')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Kematangan Emosional</td>
                        <td>
                            @foreach (range(10, 100, 10) as $value)
                                <label
                                    class="btn btn-outline-{{ $value <= 40 ? 'danger' : ($value <= 70 ? 'warning' : 'success') }} {{ old('kematangan_emosional') == $value ? 'active' : '' }}">
                                    <input type="radio" name="kematangan_emosional" value="{{ $value }}"
                                        autocomplete="off" {{ old('kematangan_emosional') == $value ? 'checked' : '' }}>
                                    {{ $value }}
                                </label>
                            @endforeach
                            @error('kematangan_emosional')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Etika Kerja</td>
                        <td>
                            @foreach (range(10, 100, 10) as $value)
                                <label
                                    class="btn btn-outline-{{ $value <= 40 ? 'danger' : ($value <= 70 ? 'warning' : 'success') }} {{ old('etika_kerja') == $value ? 'active' : '' }}">
                                    <input type="radio" name="etika_kerja" value="{{ $value }}" autocomplete="off"
                                        {{ old('etika_kerja') == $value ? 'checked' : '' }}> {{ $value }}
                                </label>
                            @endforeach
                            @error('etika_kerja')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Kesesuaian Budaya</td>
                        <td>
                            @foreach (range(10, 100, 10) as $value)
                                <label
                                    class="btn btn-outline-{{ $value <= 40 ? 'danger' : ($value <= 70 ? 'warning' : 'success') }} {{ old('kesesuaian_budaya') == $value ? 'active' : '' }}">
                                    <input type="radio" name="kesesuaian_budaya" value="{{ $value }}"
                                        autocomplete="off" {{ old('kesesuaian_budaya') == $value ? 'checked' : '' }}>
                                    {{ $value }}
                                </label>
                            @endforeach
                            @error('kesesuaian_budaya')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Keletihan Fisik</td>
                        <td>
                            @foreach (range(10, 100, 10) as $value)
                                <label
                                    class="btn btn-outline-{{ $value <= 30 ? 'success' : ($value <= 70 ? 'warning' : 'danger') }} {{ old('keletihan_fisik') == $value ? 'active' : '' }}">
                                    <input type="radio" name="keletihan_fisik" value="{{ $value }}"
                                        autocomplete="off" {{ old('keletihan_fisik') == $value ? 'checked' : '' }}>
                                    {{ $value }}
                                </label>
                            @endforeach
                            @error('keletihan_fisik')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Submit Nilai</button>
        </form>
    </div>

    <br><br><br>
@endsection
