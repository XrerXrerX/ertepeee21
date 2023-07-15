@extends('dashboard.rtp.layout.main')

@section('container')
    <div class="card col-md-6 mx-auto">
        <div class="card-header border-bottom">
            <h5 class="font-weight-bold text-larger ms-2 my-3 text-center"> Tambah Game Slot </h5>
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="card-body">
            <form action="/rtp" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input class="form-control" type="hidden" id="divisi" name="divisi"
                                value="{{ $provider_slt }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nama"
                                class="form-control-label text-white @error('nama') is-invalid @enderror">Nama
                                game</label>
                            <input class="form-control" type="text" id="nama" name="nama"
                                placeholder="Masukkan nama game slot" value="{{ old('nama') }}">
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
                                    <div class="row">
                                        <i class="ni ni-cloud-upload-96 text-dark" style="font-size: 8em; color: #000;">
                                        </i>
                                    </div>
                                    <div class="row">
                                        <i class="text-dark" style="font-size: 2.5em; color: #000;"> ukuran harus : 140 x
                                            93</i>
                                    </div>

                                </div>
                                <div class="form-group mb-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="input-group">
                                                <input class="form-control  @error('gambar') is-invalid @enderror"
                                                    type="file" id="file" name="gambar" accept="image/*" required>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->has('gambar'))
                                        <span class="text-danger">{{ $errors->first('gambar') }}</span>
                                    @endif
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="priority" name="priority">
                                    <label class="form-check-label font-weight-bolder text-white" for="priority">HOT
                                        GAMES</label>
                                </div>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert" id="tmb">
                                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                    <span class="text-black font-weight-bolder"><strong>Warning!</strong> kuran harus sesuai
                                        aturan karena mempengaruhi tampilan SLOT !</span>
                                    <button type="button" class="btn-close font-" data-bs-dismiss="alert"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
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
                    // const divElement = document.getElementById('tmb');
                    // divElement.remove();
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
        const checkbox = document.getElementById('priority');
        const label = document.querySelector('.form-check-label');

        checkbox.addEventListener('change', function() {
            if (this.checked) {
                label.classList.add('green'); // Menambahkan kelas CSS 'green'
            } else {
                label.classList.remove('green'); // Menghapus kelas CSS 'green'
            }
        });
    </script>
@endsection
