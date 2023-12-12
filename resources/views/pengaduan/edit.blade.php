<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a class="btn btn-success mb-3" href="{{ route('pengaduan.index') }}">Kembali</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>    
                                <th>Nama</th>
                                <th>Foto</th>
                                <th>laporan</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($pengaduan as $datas)
                            <tr>
                                <td>{{ $datas->nama }}</td>
                                <td>
                                    <img src="{{ asset('foto/'.$datas->photo) }}" width="120px">
                                </td>
                                <td>{{ $datas->laporan }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @foreach($pengaduan as $p)
                    <form action="{{ route('pengaduan.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="form-control" id="id" name="id" placeholder="name" value="{{ $p->id }}">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option>Belum Diproses</option>
                                <option>Sedang Diproses</option>
                                <option>Selesai</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="response">Respon Anda</label>
                            <textarea class="form-control" id="laporan" name="response" rows="3">{{ $p->response }}</textarea>
                        </div>
                        <button type="submit" class="btn-submit">Submit</button>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>