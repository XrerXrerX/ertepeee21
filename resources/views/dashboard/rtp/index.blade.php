@extends('dashboard.rtp.layout.main')
@section('container')
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
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-4 col-sm-6 mb-4">
            <a href="/rtp/posts/{{ $totaldivisi[3]->divisi }}">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-6">
                                <div class="numbers">
                                    <div class="col-12">
                                        <h5 class=" mb-0 text-capitalize font-weight-bold">PRAGMATIC</h5>
                                        <h6 class="font-weight-bolder mb-0">
                                            <span class="text-primary font-weight-bolder">{{ $pp }}
                                                games</span>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 text-center mt-3">
                                <div class="icon-shape1 bg-gradient-primary shadow text-center border-radius-md">
                                    <img src="{{ asset('storage/imgrtp/provider/pragmatic.png') }}" class=" text-lg opacity-10" aria-hidden="true" alt="">
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center mt-4">
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/' . $gambarpp[0]) }}" class=" text-sm img-thumbnail opacity-10" aria-hidden="true" alt="">
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/imgrtp/PP/' . $gambarpp[1]) }}" class=" text-sm img-thumbnail opacity-10" aria-hidden="true" alt="">

                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/' . $gambarpp[2]) }}" class=" text-sm img-thumbnail opacity-10" aria-hidden="true" alt="">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

        </div>
        <div class="col-xl-4 col-sm-6 mb-4">
            <a href="/rtp/posts/{{ $totaldivisi[0]->divisi }}">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-6">
                                <div class="numbers">
                                    <h5 class=" mb-0 text-capitalize font-weight-bold">HABANERO</h5>
                                    <h6 class="font-weight-bolder mb-0">
                                        <span class="text-primary font-weight-bolder">{{ $hb }}
                                            games</span>
                                    </h6>
                                </div>
                            </div>
                            <div class="col-6 text-center mt-3">
                                <div class="icon-shape1 bg-gradient-primary shadow text-center border-radius-md">
                                    <img src="{{ asset('storage/imgrtp/provider/habanero.png') }}" class=" text-lg opacity-10" aria-hidden="true" alt="">
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center mt-4">
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/' . $gambarhb[0]) }}" class=" text-sm img-thumbnail opacity-10" aria-hidden="true" alt="">
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/imgrtp/HB/' . $gambarhb[1]) }}" class=" text-sm img-thumbnail opacity-10" aria-hidden="true" alt="">
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/' . $gambarhb[2]) }}" class=" text-sm img-thumbnail opacity-10" aria-hidden="true" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4 col-sm-6 mb-4">
            <a href="/rtp/posts/{{ $totaldivisi[2]->divisi }}">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-6 ">
                                <div class="numbers">
                                    <h5 class=" mb-0 text-capitalize font-weight-bold">MICROGAMING</h5>
                                    <h6 class="font-weight-bolder mb-0">

                                        <span class="text-primary font-weight-bolder">{{ $mic }}
                                            games</span>
                                    </h6>
                                </div>
                            </div>
                            <div class="col-6  text-end">
                                <div class="icon-shape1 bg-gradient-primary shadow text-center border-radius-md">
                                    <img src="{{ asset('storage/imgrtp/provider/microgaming.png') }}" class=" text-lg opacity-10" aria-hidden="true" alt="">
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center mt-4">
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/' . $gambarmic[0]) }}" class=" text-sm img-thumbnail opacity-10" aria-hidden="true" alt="">
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/imgrtp/MIC/' . $gambarmic[1]) }}" class=" text-sm img-thumbnail opacity-10" aria-hidden="true" alt="">
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/imgrtp/MIC/' . $gambarmic[2]) }}" class=" text-sm img-thumbnail opacity-10" aria-hidden="true" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4 col-sm-6">
            <a href="/rtp/posts/{{ $totaldivisi[4]->divisi }}">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-6 ">
                                <div class="numbers">
                                    <h5 class=" mb-0 text-capitalize font-weight-bold">PGSOFT</h5>
                                    <h6 class="font-weight-bolder mb-0">
                                        <span class="text-primary font-weight-bolder">{{ $rtp }}
                                            games</span>
                                    </h6>
                                </div>
                            </div>
                            <div class="col-6  text-end">
                                <div class="icon-shape1 bg-gradient-primary shadow text-center border-radius-md">
                                    <img src="{{ asset('storage/imgrtp/provider/pgsoft.png') }}" class=" text-lg opacity-10" aria-hidden="true" alt="">
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center mt-4">
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/' . $gambarrtp[0]) }}" class=" text-sm img-thumbnail opacity-10" aria-hidden="true" alt="">
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/imgrtp/PG/' . $gambarrtp[1]) }}" class=" text-sm img-thumbnail opacity-10" aria-hidden="true" alt="">
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/imgrtp/PG/' . $gambarrtp[2]) }}" class=" text-sm img-thumbnail opacity-10" aria-hidden="true" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4 col-sm-6">
            <a href="/rtp/posts/{{ $totaldivisi[6]->divisi }}">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-6 ">
                                <div class="numbers">
                                    <h5 class=" mb-0 text-capitalize font-weight-bold">TOPGAMING</h5>
                                    <h6 class="font-weight-bolder mb-0">

                                        <span class="text-primary font-weight-bolder">{{ $ttr }}
                                            games</span>
                                    </h6>
                                </div>
                            </div>
                            <div class="col-6  text-end">
                                <div class="icon-shape1 bg-gradient-primary shadow text-center border-radius-md">
                                    <img src="{{ asset('storage/imgrtp/provider/toptrend.png') }}" class=" text-lg opacity-10" aria-hidden="true" alt="">
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center mt-4">
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/' . $gambarttr[0]) }}" class=" text-sm img-thumbnail opacity-10" aria-hidden="true" alt="">
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/' . $gambarttr[1]) }}" class=" text-sm img-thumbnail opacity-10" aria-hidden="true" alt="">
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/imgrtp/TTR/' . $gambarttr[2]) }}" class=" text-sm img-thumbnail opacity-10" aria-hidden="true" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4 col-sm-6">
            <a href="/rtp/posts/{{ $totaldivisi[1]->divisi }}">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-6 ">
                                <div class="numbers">
                                    <h5 class=" mb-0 text-capitalize font-weight-bold">IDN SLOT</h5>
                                    <h6 class="font-weight-bolder mb-0">

                                        <span class="text-primary font-weight-bolder">{{ $idn }}
                                            games</span>
                                    </h6>
                                </div>
                            </div>
                            <div class="col-6  text-end">
                                <div class="icon-shape1 bg-gradient-primary shadow text-center border-radius-md">
                                    <img src="{{ asset('storage/imgrtp/provider/idnslot.png') }}" class=" text-lg opacity-10" aria-hidden="true" alt="">
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center mt-4">
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/' . $gambaridn[0]) }}" class=" text-sm img-thumbnail opacity-10" aria-hidden="true" alt="">
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/' . $gambaridn[1]) }}" class=" text-sm img-thumbnail opacity-10" aria-hidden="true" alt="">
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/' . $gambaridn[2]) }}" class=" text-sm img-thumbnail opacity-10" aria-hidden="true" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-12 col-sm-12 mt-4">
            <a href="/rtp/posts/{{ $totaldivisi[5]->divisi }}">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-6 ">
                                <div class="numbers">
                                    <h5 class="text-center mb-0 text-capitalize font-weight-bold">GMW</h5>
                                    <h6 class="text-center font-weight-bolder mb-0">
                                        <span class="text-primary font-weight-bolder ">{{ $sg }}
                                            GAMES</span>
                                    </h6>
                                </div>
                            </div>
                            <div class="col-6  text-end">
                                <div class="icon-shape1 bg-gradient-primary shadow text-center border-radius-md">
                                    <img src="{{ asset('storage/imgrtp/provider/gmw.png') }}" class=" text-lg opacity-10" aria-hidden="true" alt="">
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center mt-4">
                                <div class="col-md-1">
                                    <img src="{{ asset('storage/' . $gambarsg[0]) }}" class=" text-sm img-thumbnail opacity-10" aria-hidden="true" alt="">
                                </div>
                                <div class="col-md-1">
                                    <img src="{{ asset('storage/' . $gambarsg[1]) }}" class=" text-sm img-thumbnail opacity-10" aria-hidden="true" alt="">
                                </div>
                                <div class="col-md-1">
                                    <img src="{{ asset('storage/' . $gambarsg[2]) }}" class=" text-sm img-thumbnail opacity-10" aria-hidden="true" alt="">
                                </div>
                                <div class="col-md-1">
                                    <img src="{{ asset('storage/' . $gambarsg[3]) }}" class=" text-sm img-thumbnail opacity-10" aria-hidden="true" alt="">
                                </div>
                                <div class="col-md-1">
                                    <img src="{{ asset('storage/' . $gambarsg[4]) }}" class=" text-sm img-thumbnail opacity-10" aria-hidden="true" alt="">
                                </div>
                                <div class="col-md-1">
                                    <img src="{{ asset('storage/' . $gambarsg[5]) }}" class=" text-sm img-thumbnail opacity-10" aria-hidden="true" alt="">
                                </div>
                                <div class="col-md-1">
                                    <img src="{{ asset('storage/' . $gambarsg[6]) }}" class=" text-sm img-thumbnail opacity-10" aria-hidden="true" alt="">
                                </div>
                                <div class="col-md-1">
                                    <img src="{{ asset('storage/imgrtp/SG/' . $gambarsg[7]) }}" class=" text-sm img-thumbnail opacity-10" aria-hidden="true" alt="">
                                </div>
                                <div class="col-md-1">
                                    <img src="{{ asset('storage/' . $gambarsg[8]) }}" class=" text-sm img-thumbnail opacity-10" aria-hidden="true" alt="">
                                </div>
                                <div class="col-md-1">
                                    <img src="{{ asset('storage/' . $gambarsg[9]) }}" class=" text-sm img-thumbnail opacity-10" aria-hidden="true" alt="">
                                </div>
                                <div class="col-md-1">
                                    <img src="{{ asset('storage/' . $gambarsg[10]) }}" class=" text-sm img-thumbnail opacity-10" aria-hidden="true" alt="">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endsection