 <div class="table-responsive">
     <table class="table table-sm table-hover table-bordered table-striped small display responsive nowrap mt-3 mb-3"
         width="100%">
         <thead>
             <tr class="text-center">
                 <th scope="col">No Induk</th>
                 <th scope="col">Nama</th>
                 <th scope="col">JK</th>
                 <th scope="col">Alamat</th>
                 <th scope="col">No Telp</th>
                 <th scope="col">Kelompok</th>
                 <th scope="col">Opsi</th>
             </tr>
         </thead>
         <tbody>
             @foreach ($data as $item)
                 <tr>
                     <td class="text-center">{{ $item->no_induk }}</td>
                     <td>{{ $item->nama }}</td>
                     <td class="text-center">{{ $item->jk }}</td>
                     <td>{{ $item->alamat }}</td>
                     <td>{{ $item->no_telp }}</td>
                     <td class="text-center">{{ $item->kelompok->nama_kelompok }}</td>
                     <td>
                         <div class="d-flex justify-content-center align-items-center gap-2">
                             <div class="detail">
                                 @include('warga.detail_warga')
                             </div>
                             <div class="edit ml-2">
                                 @include('warga.edit_warga')
                             </div>
                             <div class="delete ml-2">
                                 <form action="{{ route('warga.delete', $item->id) }}" method="post">
                                     @csrf
                                     @method('DELETE')
                                     <button class="btn btn-sm btn-danger show_confirm">
                                         <i class="fas fa-trash"></i>
                                     </button>
                                 </form>
                             </div>
                         </div>
                     </td>
                 </tr>
             @endforeach
         </tbody>
     </table>
 </div>

 @if (method_exists($data, 'links'))
     <div class="paginasi-halaman mt-3">
         {{ $data->links('pagination::bootstrap-5') }}
     </div>
 @endif
