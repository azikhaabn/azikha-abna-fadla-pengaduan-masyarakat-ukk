<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengaduan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                     @if ( Auth::user()->role === 'masyarakat')
                    <a class="btn btn-primary mb-3"  href="{{ route('pengaduan.create') }}">Tambah Data</a>
                    @endif
                    @if ( Auth::user()->role === 'admin')
                    <a class="btn btn-warning mb-3"  href="/pdf" target="_blank">Ekspor PDF</a>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>    
                                <th>No</th>
                                <th>Nama</th>
                                <th>Foto</th>
                                <th>Tanggal</th>
                                <th>laporan</th>
                                <th>Status</th>
                                <th>Response</th>
                                @if ( Auth::user()->role === 'petugas')
                                <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($pengaduan as $datas)
                            <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $datas->nama }}</td>
                            <!-- <td>{{ $datas->photo }}</td> -->
                            <td>
                                <img src="{{ asset('foto/'.$datas->photo) }}" width="120px">
                            </td>
                            <td>{{ date ('D - d M Y', $datas->created_at->timestamp)}}</td>
                            <td>{{ $datas->laporan }}</td>
                            <td>{{ $datas->status }}</td>
                            <td>{{ $datas->response }}</td>
                            <td>
                            @if ( Auth::user()->role !== 'masyarakat')
                                <a class="btn btn-success" href="{{ route('pengaduan.edit',$datas->id) }}">Tanggapi</a>
                                <a class="btn btn-danger" href="/pengaduan/hapus/{{ $datas->id }}">Hapus</a>
                            @endif
                            </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>