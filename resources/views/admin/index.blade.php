<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data User') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                     <!-- @if ( Auth::user()->role === 'masyarakat')
                    <a class="btn btn-primary mb-3"  href="{{ route('pengaduan.create') }}">Tambah Data</a>
                    @endif
                    <a class="btn btn-warning mb-3"  href="/pdf" target="_blank">Ekspor PDF</a> -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>    
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($user as $datas)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $datas->nik }}</td>
                                <td>{{ $datas->name }}</td>
                                <td>{{ $datas->email }}</td>
                                <td>{{ $datas->telepon }}</td>
                                <td>{{ $datas->role }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
