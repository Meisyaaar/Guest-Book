<div class="flex justify-around w-full gap-2">
    <div class="flex flex-col items-center justify-center w-full gap-2">
        @if ($item->tamu)
            <h6 class="text-sm font-semibold leading-0 text-grey">Nama Tamu</h6>
        @else
            <h6 class="text-sm font-semibold leading-0 text-grey">Nama Kurir</h6>
        @endif
        <h6 class="text-base text-darkGray">{{ $item->tamu->Nama ?? $item->ekspedisi->Nama_kurir }}</h6>
    </div>
    <div class="flex flex-col items-center justify-center w-full gap-2">
        <h6 class="text-sm font-semibold leading-0 text-grey">Bertemu Dengan</h6>
        <h6 class="text-base text-darkGray">{{ $item->pegawai->user->name }}</h6>
    </div>
    @if ($item->tamu)
        <div class="flex flex-col items-center justify-center w-full gap-2">
            <h6 class="text-sm font-semibold leading-0 text-grey">Waktu Pertemuan</h6>
            <h6 class="text-sm text-darkGray">{{ $item->formatWaktu }}</h6>
        </div>
    @endif
</div>
<div class="flex mb-2">
    @if ($item->tamu)
        <span class="w-1/6 font-semibold">Email</span>
    @else
        <span class="w-1/6 font-semibold">Ekspedisi</span>
    @endif
    <span class="w-5/6">: {{ $item->tamu->email ?? $item->ekspedisi->Ekspedisi}}</span>
</div>
<div class="flex mb-2">
    <span class="w-1/6 font-semibold">No. Telpon</span>
    <span class="w-5/6">: {{ $item->tamu->no_telpon ?? $item->ekspedisi->No_Telp}}</span>
</div>
@if ($item->tamu)
    <div class="flex mb-2">
        <span class="w-1/6 font-semibold">Alamat</span>
        <span class="w-5/6">: {{ $item->tamu->Alamat ?? '-' }}</span>
    </div>
    <div class="flex mb-2">
        <span class="w-1/6 font-semibold">Instansi</span>
        <span class="w-5/6">: {{ $item->instansi ?? '-' }}</span>
    </div>
    <div class="flex flex-col gap-1">
        <span class="font-semibold">Tujuan</span>
        <div class="w-full h-24 px-3 py-2 overflow-auto rounded-lg bg-lightRed2">
            {{ $item->tujuan ?? 'N/A' }}
        </div>
    </div>
@endif
