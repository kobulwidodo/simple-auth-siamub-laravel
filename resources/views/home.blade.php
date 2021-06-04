@extends('layout.app')

@section('title')
    Home Page
@endsection

@section('body')
    <div class="container">
        <div class="row mt-5">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/auth">
                        @csrf
                        <h3 class="text-center">SIAM LOGIN</h3>
                        <div class="mb-3 mt-3">
                            <label for="inputNim" class="form-label">NIM</label>
                            <input type="number" class="form-control" id="inputNim" name="nim">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            @if ($data != null)
            <div class="card">
                <div class="card-body">
                    <h5>Result : </h5>
                    @if ($data['msg'] == "success")
                    <div class="d-flex justify-content-between flex-wrap">
                        <div class="">
                            <p>Nama             : {{ $data['data']['nama'] }}</p>
                            <p>NIM              : {{ $data['data']['nim'] }}</p>
                            <p>Program Studi    : {{ $data['data']['prodi'] }} </p>
                            <p>Jurusan          : {{ $data['data']['jurusan'] }}</p>
                            <p>Fakultas         : {{ $data['data']['fakultas'] }}</p>
                        </div>
                        <div class="">
                            <img src="https://siakad.ub.ac.id/dirfoto/foto/foto_2020/{{ $data['data']['nim'] }}.jpg" alt="" width="150px">
                        </div>
                    </div>
                    @else
                        <p>{{ $data['msg'] }}</p>
                    @endif
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection