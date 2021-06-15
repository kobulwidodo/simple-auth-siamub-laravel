@extends('layout.app')

@section('title')
    Home Page
@endsection

@section('body')
    <div class="container">
        <div class="row mt-5">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/">
                        @csrf
                        <h3 class="text-center">SIAM DATA CHECKER</h3>
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
                    <button class="btn border-bottom w-100 mt-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapsGrade" aria-expanded="false" aria-controls="collapseExample">
                        Lihat Nilai
                    </button>
                    <div class="collapse" id="collapsGrade">
                        <table class="table mt-4">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kode Matkul</th>
                                <th scope="col">Matkul</th>
                                <th scope="col">SKS</th>
                                <th scope="col">Nilai</th>
                                <th scope="col">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['data']['gpa'] as $gpa)
                                <tr>
                                    <th scope="row">{{ $gpa['no'] }}</th>
                                    <td>{{ $gpa['kode_matkul'] }}</td>
                                    <td>{{ $gpa['matkul'] }}</td>
                                    <td>{{ $gpa['sks'] }}</td>
                                    <td>{{ $gpa['nilai'] }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal{{ $gpa['no'] }}">
                                            Tampilkan
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @foreach ($data['data']['gpa'] as $gpa)
                        <div class="modal fade" id="detailModal{{ $gpa['no'] }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detail Nilai {{ $gpa['matkul'] }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Tipe Nilai</th>
                                                <th scope="col">Nilai Ke</th>
                                                <th scope="col">Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data['data']['gpa'][$gpa['no']-1]['detail_nilai'] as $item)
                                                    <tr>
                                                        <th scope="row">{{ $item['no'] }}</th>
                                                        <td>{{ $item['tipe_nilai'] }}</td>
                                                        <td>{{ $item['nilai_ke'] }}</td>
                                                        <td>{{ $item['nilai'] }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @else
                        <p>{{ $data['msg'] }}</p>
                    @endif
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection