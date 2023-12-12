<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Belum Diproses') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table table-bordered">
                        <thead>
                            <tr>    
                                <th>No</th>
                                <th>Nama</th>
                                <th>Foto</th>
                                <th>Tanggal</th>
                                <th>laporan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $belumDiproses as $k => $v)
                            <tr>
                                <td>{{ $k += 1 }}</td>
                                <td>{{ $v->nama }}</td>
                                <td>
                                    <img src="{{ asset('foto/'.$v->photo) }}" width="120px">
                                </td>
                                <td>{{ date('D - d M Y', $v->created_at->timestamp) }}</td>
                                <td>{{ $v->laporan }}</td>
                                <td>{{ $v->status }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

