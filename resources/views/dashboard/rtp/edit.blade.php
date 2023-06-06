@extends('dashboard.rtp.layout.main')

@section('container')
    <div class="card col-md-6 mx-auto">
        <div class="card-header border-bottom">
            <h5 class="font-weight-bold text-larger ms-2 my-3 text-center"> Update Game Slot </h5>
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="card-body">
            <form action="/rtp/{{ $dataslt }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="col-md-12">
                    <div class="form-group">
                        {{-- <label for="divisi"
                            class="form-control-label text-white @error('divisi') is-invalid @enderror">Nama
                            Provider</label> --}}
                        <input class="form-control" type="hidden" id="divisi" name="divisi"
                            value="{{ $provider_slt->divisi }}" readonly>
                        @if ($errors->has('divisi'))
                            <span class="text-danger">{{ $errors->first('divisi') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nama" class="form-control-label text-white @error('nama') is-invalid @enderror">Nama
                            game</label>
                        <input class="form-control" type="text" id="nama" name="nama"
                            placeholder="Masukkan nama game slot" value="{{ old('nama', $provider_slt->nama) }}">
                        @if ($errors->has('nama'))
                            <span class="text-danger">{{ $errors->first('nama') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="gambar"
                            class="form-control-label text-white @error('gambar') is-invalid @enderror">Gambar Game
                            Slot</label>
                        <div class="card">
                            <div class="img-area bg-dark text-center p-5" data-img="">

                                @if (strtotime($provider_slt->created_at) > strtotime('2022-01-01') &&
                                        strtotime($provider_slt->updated_at) > strtotime('2022-01-01'))
                                    <img src="{{ asset('storage/' . $provider_slt->gambar) }}">
                                @elseif(strtotime($provider_slt->created_at) < strtotime('2022-01-01') &&
                                        strtotime($provider_slt->updated_at) > strtotime('2022-01-01'))
                                    <img src="{{ asset('storage/' . $provider_slt->gambar) }}">
                                @else
                                    <img src="{{ asset('storage/imgrtp/' . $divisi . '/' . $provider_slt->gambar) }}">
                                @endif

                            </div>
                            <div class="form-group mb-4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="input-group">
                                            <input type='hidden' name="oldrtpimage" value="{{ $provider_slt->gambar }}">
                                            <input class="form-control  @error('gambar') is-invalid @enderror"
                                                type="file" id="file" name="gambar" accept="image/*">

                                        </div>
                                    </div>
                                </div>
                                @if ($errors->has('gambar'))
                                    <span class="text-danger">{{ $errors->first('gambar') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-icon btn-3 btn btn-outline-light my-1 bg-dark">Submit</button>
                </div>
        </div>

        </form>
    </div>
    </div>
    <script src="https://demos.creative-tim.com/test/soft-ui-dashboard-pro/assets/js/plugins/dropzone.min.js"
        type="text/javascript"></script>
    <script>
        const selectImage = document.querySelector('.form-control');
        const inputFile = document.querySelector('#file');
        const imgArea = document.querySelector('.img-area');

        selectImage.addEventListener('click', function() {
            inputFile.click();
        });

        inputFile.addEventListener('change', function() {
            const image = this.files[0];
            console.log(image.size);
            if (image.size < 100000) {
                const reader = new FileReader();
                reader.onload = () => {
                    const allImg = imgArea.querySelectorAll('img');
                    allImg.forEach(item => item.remove());
                    const alli = imgArea.querySelectorAll('i');
                    alli.forEach(item => item.remove());
                    const gambar = reader.result;
                    const img = document.createElement('img');
                    img.src = gambar;
                    imgArea.appendChild(img);
                    imgArea.classList.add('active');
                    imgArea.dataset.img = image.name;
                };
                reader.readAsDataURL(image);
            } else {
                alert("Image size more than 100KB");
            }
        });
    </script>
@endsection
