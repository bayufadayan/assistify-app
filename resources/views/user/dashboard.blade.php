@extends('layouts.app')

@section('title', 'My Dashboard')

@section('content')
<h1 style="text-align: center; padding-block: 20px;">---- Dashboard Asisten Praktikum ----</h1>
    <div class="container text-center top-50 start-50 translate-middle">
        <div class="row justify-content-center align-self-center">
            <div class="col-8">
                <div class="card myfont">
                    <div class="card-header d-flex justify-content-center fw-bold border-0 fs-4"
                        style="background: #00255e; color: white;">
                        Input Nilai
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item py-2 fs-5 mb-3"
                                style="background-color: #4164ff; border-radius: 10px;"><a href="/user/results-pendaftar"
                                    class="text-decoration-none text-white">Lihat
                                    Pendaftar</a></li>
                            <li class="list-group-item py-2 fs-5"><a href="/interview"
                                    class="text-decoration-none text-black">Interview</a></li>
                            <li class="list-group-item py-2 fs-5"><a href="/substance"
                                    class="text-decoration-none text-black">Substance Test</a></li>
                            <li class="list-group-item py-2 fs-5"><a href="/micro-teaching"
                                    class="text-decoration-none text-black">Micro-Teaching</a></li>
                            <li class="list-group-item py-2 fs-5"><a href="/final-interview"
                                    class="text-decoration-none text-black">Final Interview</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="container text-center top-50 start-50 translate-middle">
        <div class="row justify-content-center align-self-center">
            <div class="col-8">
                <div class="card myfont">
                    <div class="card-header d-flex justify-content-center fw-bold border-0 fs-4"
                        style="background: #0d4100; color: white;">
                        Hasil Akhir
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item py-2 fs-5"><a href="/saw-process"
                                    class="text-decoration-none text-success">Lihat Peringkat</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br><br><br>
@endsection
