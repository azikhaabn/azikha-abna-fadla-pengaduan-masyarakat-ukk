<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @if ( Auth::user()->role === 'admin')
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-15 mt-5">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="hidden space-x-8 sm:-my-px sm:ml-8 sm:flex">
                    <div class="p-2 text-gray-900">
                        <a class="btn btn-secondary" href="/datalaporan" role="button">All Data<br>{{ $allDataPengaduan }}</a>
                    </div>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-8 sm:flex">
                    <div class="p-2 text-gray-900">
                        <a class="btn btn-secondary" href="/Belum" role="button">Belum Diproses<br>{{  $belumDiproses }}</a>
                    </div>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-8 sm:flex">
                    <div class="p-2 text-gray-900">
                        <a class="btn btn-secondary" href="diproses" role="button">Sedang Diproses<br>{{ $sedangDiproses }}</a>
                    </div>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-8 sm:flex">
                    <div class="p-2 text-gray-900">
                        <a class="btn btn-secondary" href="selesai" role="button">Selesai<br>{{ $selesai }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>
