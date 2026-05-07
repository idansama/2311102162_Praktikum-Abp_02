<x-app-layout>
<div class="container mx-auto p-6 bg-gray-900 min-h-screen text-white">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Data Produk</h1>

        <a href="{{ route('products.create') }}"
           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow">
           + Tambah Produk
        </a>
    </div>

    <!-- TABLE -->
    <div class="bg-gray-800 rounded shadow p-4">
        <table class="w-full text-white">
            <thead class="bg-gray-700">
                <tr>
                    <th class="p-3">Nama</th>
                    <th class="p-3">Stok</th>
                    <th class="p-3">Harga</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($products as $product)
                <tr class="border-b border-gray-600 hover:bg-gray-700">
                    <td class="p-3">{{ $product->nama }}</td>
                    <td class="p-3">{{ $product->stok }}</td>
                    <td class="p-3">Rp {{ number_format($product->harga) }}</td>

                    <td class="p-3 space-x-2">
                        <a href="{{ route('products.edit', $product->id) }}"
                           class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
                            Edit
                        </a>

                        <button onclick="openModal({{ $product->id }})"
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                            Delete
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

<!-- MODAL DELETE -->
<div id="deleteModal"
     class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">

    <div class="bg-white text-black p-6 rounded shadow-lg w-80">
        <h2 class="text-lg font-bold mb-4">Konfirmasi</h2>
        <p class="mb-4">Yakin ingin menghapus data ini?</p>

        <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')

            <div class="flex justify-end gap-2">
                <button type="button"
                        onclick="closeModal()"
                        class="bg-gray-400 text-white px-3 py-1 rounded">
                    Batal
                </button>

                <button type="submit"
                        class="bg-red-500 text-white px-3 py-1 rounded">
                    Hapus
                </button>
            </div>
        </form>
    </div>
</div>

<!-- SCRIPT -->
<script>
function openModal(id) {
    let form = document.getElementById('deleteForm');
    form.action = '/products/' + id;

    let modal = document.getElementById('deleteModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeModal() {
    let modal = document.getElementById('deleteModal');
    modal.classList.add('hidden');
}
</script>

</x-app-layout>