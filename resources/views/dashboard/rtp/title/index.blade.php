@extends('dashboard.syair.layout.main')
@section('container')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom ms-3">
        <a href="/syair/posts/create"><button class="btn btn-icon btn-3 btn btn-outline-light bg-dark my-4" type="button">
                <span class="btn-inner--text text-large"> <i class="ni ni-fat-add"></i> Ubah Postingan Syair</span>

            </button></a>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8">
            {{ session('success') }}
        </div>
    @endif


    <div class="card col-md-11 ms-2">

        <table class="border">
            <thead class="border">
                <tr>
                    <th
                        class="text-white text-center text-uppercase text-secondary text-large font-weight-bolder opacity-7 ps-2 w-45 ">
                        title</th>
                    <th
                        class="text-white text-center text-uppercase text-secondary text-large font-weight-bolder opacity-7 w-45">
                        body</th>
                    <th
                        class="text-white text-center text-uppercase text-secondary text-large font-weight-bolder opacity-7 w-10">
                        Action</th>
                </tr>
            </thead>
            <tbody class="border">

                <tr>

                    <td class="border ">{{ $title1->title }}</td>
                    <td class="border">{{ $title1->body }}</td>
                    <td class="text-white text-center">

                        <a href="/syair/title/{{ $title1->id }}/edit">
                            <button class="badge btn-info bg-dark">
                                <i class="fas fa-pencil-alt"></i>
                                <span class="badge">Edit</span>
                            </button>
                        </a>
                    </td>
                </tr>


            </tbody>
        </table>

    </div>
@endsection
