<div class="container">
    {{-- data keluarga --}}
    <div class="d-flex align-items-center my-4">
        <div class="flex-grow-1 border-top border-dark"></div>
        <span class="px-3 text-muted small">Data Keluarga</span>
        <div class="flex-grow-1 border-top border-dark"></div>
    </div>

    <div class="row mb-3">
        <div class="col-3">
            <x-input label="Kode KK *" name="kode_kk" type="text" />
        </div>
        <div class="col-3 mb-3">
            <x-select name="kelompok_id" label="Kelompok*">
                @foreach ($kelompoks as $kelompok)
                    <option value="{{ $kelompok->id }}">{{ $kelompok->nama }}
                        ({{ $kelompok->kode_kelompok }})
                    </option>
                @endforeach
            </x-select>
        </div>
        <div class="col-6">
            <x-input label="Catatan (isi dengan ' - ' jika tidak ada catatan)" name="catatan" type="text" />
        </div>
    </div>
    {{-- data warga --}}
    <div class="d-flex align-items-center my-4">
        <div class="flex-grow-1 border-top border-dark"></div>
        <span class="px-3 text-muted small">Data Warga</span>
        <div class="flex-grow-1 border-top border-dark"></div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <x-input label="Nama Lengkap *" name="nama" type="text" />
        </div>
        <div class="col-12">
            <x-input label="Alamat *" name="alamat" type="text" />
        </div>
        <div class="col-md-3">
            <x-input label="No Telp *" name="telp" type="text" />
        </div>
        <div class="col-md-3">
            <x-select name="jk" label="Jenis Kelamin*">
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </x-select>
            </select>
        </div>
        <div class="col-md-3">
            <x-input label="Tempat Lahir *" name="tempat_lahir" type="text" />
        </div>
        <div class="col-md-3">
            <x-input label="Tanggal Lahir *" name="tanggal_lahir" type="date" />
        </div>
    </div>
    {{-- Data Kompetensi, Status & Pendidikan --}}
    <div class="d-flex align-items-center my-4">
        <div class="flex-grow-1 border-top border-dark"></div>
        <span class="px-3 text-muted small">Data Kompetensi, Status & Pendidikan</span>
        <div class="flex-grow-1 border-top border-dark"></div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">
            <x-select name="talenta_id" label="Talenta*">
                @foreach ($talentas as $talenta)
                    <option value="{{ $talenta->id }}">{{ $talenta->talenta }}</option>
                @endforeach
            </x-select>
        </div>
        <div class="col-md-4">
            <x-select name="pendidikan_id" label="Pendidikan*">
                @foreach ($pendidikans as $p)
                    <option value="{{ $p->id }}">{{ $p->pendidikan }}</option>
                @endforeach
            </x-select>
        </div>
        <div class="col-md-4">
            <x-select name="pekerjaan_id" label="Pekerjaan*">
                @foreach ($pekerjaans as $p)
                    <option value="{{ $p->id }}">{{ $p->pekerjaan }}</option>
                @endforeach
            </x-select>
        </div>
        <div class="col-md-4 mt-3">
            <x-select name="status_keluarga_id" label="Status Keluarga*">
                @foreach ($statusKeluarga as $status)
                    <option value="{{ $status->id }}">{{ $status->status_keluarga }}</option>
                @endforeach

            </x-select>
        </div>
        <div class="col-md-4 mt-3">
            <x-select name="status_warga_id" label="Status Warga*">
                @foreach ($statusWarga as $status)
                    <option value="{{ $status->id }}">{{ $status->status_warga }}</option>
                @endforeach
            </x-select>
        </div>
        <div class="col-md-4 mt-3">
            <x-select name="status_nikah_id" label="Status Nikah*">
                @foreach ($statusNikah as $status)
                    <option value="{{ $status->id }}">{{ $status->status_nikah }}</option>
                @endforeach
            </x-select>
        </div>
    </div>

    <div class="d-flex align-items-center my-4">
        <div class="flex-grow-1 border-top border-dark"></div>
        <span class="px-3 text-muted small">Data Baptis, Sidhi & Nikah</span>
        <div class="flex-grow-1 border-top border-dark"></div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">
            <x-input label="Tempat Baptis *" name="tempat_baptis" type="text" />
        </div>
        <div class="col-md-2">
            <x-input label="Tanggal Baptis *" name="tanggal_baptis" type="date" />
        </div>
        <div class="col-md-4">
            <x-input label="Tempat Sidhi *" name="tempat_sidhi" type="text" />
        </div>
        <div class="col-md-2">
            <x-input label="Tanggal Sidhi *" name="tanggal_sidhi" type="date" />
        </div>
        <div class="col-md-4 mt-3">
            <x-input label="Tempat Menikah *" name="tempat_menikah" type="text" />
        </div>
        <div class="col-md-2 mt-3">
            <x-input label="Tanggal Menikah *" name="tanggal_menikah" type="date" />
        </div>
    </div>



</div>
