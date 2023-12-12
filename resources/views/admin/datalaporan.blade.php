<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Laporan') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('pengaduan.datalaporan') }}" method="POST" >
                        @csrf
                        
                        <!-- <div class="form-group">
                                        <input type="text" name="from" class="form-control"
                                            placeholder="Tanggal Awal" onfocusin="(this.type='date')"
                                            onfocusout="(this.type='text')">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="to" class="form-control"
                                            placeholder="Tanggal Akhir" onfocusin="(this.type='date')"
                                            onfocusout="(this.type='text')">
                                    </div> -->
                        {{-- <label for="month">Per Bulan:</label> --}}
                        <select id="month" name="month" class="me-5">
                            <option value="">select month</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                        <button type="submit" class="btn btn-primary ms-5" style="background-color: blue">Cari</button>
                    </form>
                    <div class="mt-4">
                        <div class="card">
                                @if ($pengaduan ?? '')
                                    <table class="table">
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
                                            @foreach ($pengaduan as $k => $v)
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
                                @else
                                    <div class="text-center">
                                        Tidak ada data
                                    </div>
                                @endif
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</x-app-layout>
