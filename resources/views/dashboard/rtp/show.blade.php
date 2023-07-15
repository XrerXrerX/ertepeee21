@extends('dashboard.rtp.layout.main')
@section('container')
<h2 class="font-weight-bolder mb-3 ms-3 text-center">

    {{ Request::is('rtp/posts/*') || Request::is('rtp/search/*') ? $provider : '' }}
</h2>

<div class="rowsearch justify-content-center mb-3">
    <div class="col-md-5">
        <a href="/create/rtp/{{ $provider }}"><button class="btn btn-icon btn-3 btn btn-outline-light bg-dark my-4" type="button">
                <span class="btn-inner--text text-large"> <i class="ni ni-fat-add"></i> Tambah Postingan Slot</span>

            </button>
        </a>
    </div>

    <div class="col-md-3">
        <form action="/rtp/search/{{ $id }}">
            <div class="input-group">
                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                <input type="text" class="form-control ps-1" placeholder="Type here..." name="search" value="{{ request('search') }}">
                <button class="btn btn-light" type="submit" id="button-addon2" hidden>Search</button>
            </div>
        </form>
    </div>
</div>
<div class="d-flex justify-content-center my-3">

    @if (session()->has('success'))
    <div class="alert alert-success col-lg-8">
        {{ session('success') }}
    </div>
    @endif

    @if (session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
</div>
<div class="row justify-content-center">
    <div class="card col-md-8">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                    <tr>
                        <th class="text-white text-uppercase text-center text-secondary text-large font-weight-bolder opacity-7">
                            NO</th>
                        <th class="text-white text-uppercase text-secondary text-center text-large font-weight-bolder opacity-7 ps-2">
                            NAMA GAMES</th>
                        <th class="text-white text-center text-uppercase text-secondary text-large font-weight-bolder opacity-7">
                            HOT GAMES</th>
                        <th class="text-white text-center text-uppercase text-secondary text-large font-weight-bolder opacity-7">
                            ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td class="text-white text-center">{{ $loop->iteration }}</td>
                        <td class="text-white">{{ $post->nama }}</td>
                        <td class="d-flex justify-content-center">
                            @if ($post->priority > 0)
                            <div class="form-check form-switch py-2">
                                <input class="form-check-input" type="checkbox" id="priority" name="priority" checked="" disabled>
                            </div>
                            @else
                            <div class="form-check form-switch py-2">
                                <input class="form-check-input" type="checkbox" id="priority" name="priority" disabled>
                            </div>
                            @endif
                        </td>
                        <td class="text-white text-center">
                            {{-- <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><span data-feather="eye" class="align-text-bottom"></span></a> --}}

                            <a href="/rtp/{{ $post->id }}/edit"><button class="badge btn-info bg-dark">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    <span class="badge ">Edit</span>
                                </button>
                            </a>

                            <form action="/rtp/{{ $post->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge btn-danger bg-dark" onclick="return confirm('Apakah anda yakin ingin menghapus?')"> <i class="fas fa-trash">
                                    </i> <span class="badge">Delete</span></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
        <ul class="pagination pagination-secondary justify-content-end mt-3 me-5">
            {{ $posts->onEachSide(1)->links('pagination::bootstrap-4') }}
        </ul>
    </div>
</div>
@endsection