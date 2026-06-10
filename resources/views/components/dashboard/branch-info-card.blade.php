@props(['branch'])

<x-common.card title="Informasi Cabang">
    <dl class="space-y-2 text-sm">
        <div class="flex justify-between">
            <dt class="font-semibold text-gray-600">Nama:</dt>
            <dd>{{ $branch->name }}</dd>
        </div>
        <div class="flex justify-between">
            <dt class="font-semibold text-gray-600">Kota:</dt>
            <dd>{{ $branch->city }}</dd>
        </div>
        <div class="flex justify-between">
            <dt class="font-semibold text-gray-600">Alamat:</dt>
            <dd>{{ $branch->address }}</dd>
        </div>
        <div class="flex justify-between">
            <dt class="font-semibold text-gray-600">Telepon:</dt>
            <dd>{{ $branch->phone ?? '-' }}</dd>
        </div>
    </dl>
</x-common.card>
