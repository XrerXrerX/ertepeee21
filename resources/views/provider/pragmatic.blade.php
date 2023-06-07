@extends('provider.layout.main')

@section('container')
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

        <script src="./asset_rtp/load.js"></script>
    </div>
    <!-- <table class="table table-dark table-hover"> -->
    <div class="container">
        <div class="row rgame">
            <div class="cgame">
                <table class="table" id="tablegp">
                    <tbody id="tbgame" class="icgame">
                        <tr>
                            <td class="active"><a href="/"><img src="/storage/imgrtp/provider/pragmatic.png"></a></td>
                            <td><a href="/habanero"><img src="/storage/imgrtp/provider/habanero.png"></a></td>
                            <td><a href="/microgaming"><img src="/storage/imgrtp/provider/microgaming.png"></a>
                            </td>
                        </tr>
                        <tr>
                            <td><a href="/pgsoft"><img src="/storage/imgrtp/provider/pgsoft.png"></a>
                            </td>
                            <td><a href="/toptrend"><img src="/storage/imgrtp/provider/toptrend.png"></a></td>
                            <td><a href="/idn"><img src="/storage/imgrtp/provider/idnslot.png"><a href=""></a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"><a href="/gmw"><img src="/storage/imgrtp/provider/gmw.png"></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row rgpame d-flex justify-content-center lazyload">
            <!-- membuat ukuran dalam kartu berapa persen dalam 1 baris -->
            @php $i = 0; @endphp

            @foreach ($pp as $row)
                <!-- border putrih card conten -->
                <div class="gameplay hover10">
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            var lazyLoadInstance = new LazyLoad();
                        });
                    </script>
                    @php
                        $createdAt = $row['created_at'];
                        $updatedAt = $row['updated_at'];
                        
                        if (strtotime($createdAt) > strtotime('2020-01-01') && strtotime($updatedAt) > strtotime('2020-01-01')) {
                            // Jika created_at dan updated_at lebih dari tahun 2020
                            $imageSrc = "/storage/{$row['gambar']}";
                        } elseif (strtotime($createdAt) < strtotime('2020-01-01') && strtotime($updatedAt) > strtotime('2020-01-01')) {
                            // Jika created_at lebih lama dari tahun 2020 dan updated_at lebih dari tahun 2020
                            $imageSrc = "/storage/{$row['gambar']}";
                        } else {
                            // Jika created_at dan updated_at kurang dari atau sama dengan tahun 2020
                            $imageSrc = "/storage/imgrtp/PP/{$row['gambar']}";
                        }
                    @endphp

                    <img class="lazyload" data-src="{{ $imageSrc }}" alt="{{ $row['nama'] }}" data-toggle="modal"
                        data-target="#{{ $i }}">

                    <p
                        style="color: #e9e9e9;
                    background: #131316;
                    text-align: center;
                    font-size: 10px;
                    text-transform: uppercase;
                    overflow: hidden;
                    padding: 5px 10px 5px 10px;
                    overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                        {{ substr($row['nama'], 0, 25) }}
                    </p>
                    <button type="button" class="btnplay button-29" data-toggle="modal"
                        data-target="#{{ $i }}
                    ">
                        POLA
                    </button>
                    <div class="progress">
                        <div id="percent-txt" class="percent-bar percent-bar-striped progress-bar-animated"
                            role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                            <p id="percent-txt" class="percent-txt" style="z-index: 15;">90%</p>

                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal" id="{{ $i }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalcenter" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="namagame">
                                <p style="color: white ; text-align:center ;font-weight: 900;text-transform: uppercase;">
                                    {{ $row['nama'] }}</p>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span class="close" aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!-- pakai ini untuk membuat stake bet berwarna -->
                            <!-- <div class="modal-body bgg"> -->
                            <div class="modal-body">
                                <div class="stake garisbwh"
                                    style="display: flex; justify-content: space-between ;color: white;font-size:10px">
                                    <p>Stake bet :</p>
                                    <p>200 - 9.8k</p>
                                </div>
                                <div class="stake garisbwh"
                                    style="display: flex; justify-content: space-between ;color: white;font-size:10px">
                                    <p>Jam Gacor :</p>
                                    <p class="jamgacorRange">19:08 - 22:40</p>
                                </div>
                            </div>
                            <div class="headcard bgg" style="text-align:center">
                                <p style="color: white;font-family:Verdana">POLA GACOR</p>
                            </div>
                            <div class="jamgacor">
                                <div class="pola" style='color: white;text-align:center;padding-top:0.5em'>
                                    <p>STEP 1 : Panaskan Slot !</p>
                                    <p class="pola1" style="text-align:center;padding-top:0.2em">Manual 10 ✖️✖️✔️</p>
                                    <br style="line-height:30px;">
                                    <p class="jamgacor1">STEP 2 : Naikan Stake Bet !</p>
                                    <p class="pola2" style="text-align:center;padding-top:0.2em">Manual 10 ✖️✖️✔️</p>
                                    <br style="line-height:30px;">
                                    <p>STEP 3 : Langkah terakhir !</p>
                                    <p class="pola3" style="text-align:center;padding-top:0.2em;padding-bottom:1em">
                                        Manual 10 ✖️✖️✔️</p>
                                </div>
                                <div class="notedd" style='background-color: #121010bf' ;>
                                    <p> Catatan : <br>
                                        lakukan pola di atas nimimal 2x!</p>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                @php $i++; @endphp
            @endforeach
        </div>
    @endsection
