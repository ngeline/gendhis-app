<html>

<body>
    <form action="{{ route('store.order', ['id' => $data->id]) }}" method="POST">
        <div class="row">
            <div class="col-lg-12">
                <label for="">Nama Pemesan</label>
                <input type="text" class="@error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}"
                    autofocus>
                @error('nama')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-lg-12">
                <label for="">No Telepon Pemesan</label>
                <input type="text" class="@error('telepon') is-invalid @enderror" name="telepon"
                    value="{{ old('telepon') }}" autofocus>
                @error('telepon')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-lg-12">
                <label for="">No KTP Pemesan</label>
                <input type="text" class="@error('ktp') is-invalid @enderror" name="ktp"
                    value="{{ old('ktp') }}" autofocus>
                @error('ktp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            @isset($data->getTravelFromProduk)
                <div class="col-lg-12">
                    <label for="">Kategori Pemesanan</label>
                    <input type="text" value="{{ $data->kategori }}" readonly>
                </div>
                <div class="col-lg-12">
                    <label for="">Jenis Paket</label>
                    <input type="text" value="{{ $data->getTravelFromProduk->nama_paket }}" readonly>
                </div>
                <div class="col-lg-12">
                    <label for="">Harga Paket</label>
                    <input type="text" value="{{ $data->getTravelFromProduk->harga_paket }}" readonly>
                </div>
            @endisset
            @isset($data->getBimbelFromProduk)
                <div class="col-lg-12">
                    <label for="">Nama Anak Yang Didaftarkan</label>
                    <input type="text" class="@error('anak') is-invalid @enderror" name="anak"
                        value="{{ old('anak') }}" autofocus>
                    @error('anak')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-lg-12">
                    <label for="">Usia Anak Yang Didaftarkan</label>
                    <input type="text" class="@error('usia') is-invalid @enderror" name="usia"
                        value="{{ old('usia') }}" autofocus>
                    @error('usia')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-lg-12">
                    <label for="">Kategori Pemesanan</label>
                    <input type="text" value="{{ $data->kategori }}" readonly>
                </div>
                <div class="col-lg-12">
                    <label for="">Jenis Paket</label>
                    <input type="text" value="{{ $data->getBimbelFromProduk->nama_paket }}" readonly>
                </div>
                <div class="col-lg-12">
                    <label for="">Harga Paket</label>
                    <input type="text" value="{{ $data->getBimbelFromProduk->harga_paket }}" readonly>
                </div>
            @endisset
            @isset($data->getJasaFotoFromProduk)
                <div class="col-lg-12">
                    <label for="">Tanggal Pemesanan</label>
                    <input type="text" class="@error('tanggal') is-invalid @enderror" name="tanggal"
                        value="{{ old('tanggal') }}" autofocus>
                    @error('tanggal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-lg-12">
                    <label for="">Lokasi Pemesanan</label>
                    <input type="text" class="@error('alamat') is-invalid @enderror" name="alamat"
                        value="{{ old('alamat') }}" autofocus>
                    @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-lg-12">
                    <label for="">Kategori Pemesanan</label>
                    <input type="text" value="{{ $data->kategori }}" readonly>
                </div>
                <div class="col-lg-12">
                    <label for="">Jenis Paket</label>
                    <input type="text" value="{{ $data->getJasaFotoFromProduk->nama_paket }}" readonly>
                </div>
                <div class="col-lg-12">
                    <label for="">Harga Paket</label>
                    <input type="text" value="{{ $data->getJasaFotoFromProduk->harga_paket }}" readonly>
                </div>
            @endisset
        </div>
        <div class="col-lg-12">
            <input type="submit" value="Simpan">
        </div>
    </form>
</body>

</html>
