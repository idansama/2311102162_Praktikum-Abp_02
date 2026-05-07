<x-app-layout>
<div class="container mx-auto p-5">

    <h1 class="text-2xl mb-5">Tambah Produk</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <input type="text"
               name="nama"
               placeholder="Nama Produk"
               class="border p-2 w-full mb-3">

        <textarea name="deskripsi"
                  placeholder="Deskripsi"
                  class="border p-2 w-full mb-3"></textarea>

        <input type="number"
               name="stok"
               placeholder="Stok"
               class="border p-2 w-full mb-3">

        <input type="number"
               name="harga"
               placeholder="Harga"
               class="border p-2 w-full mb-3">

        <button class="bg-blue-500 text-white px-4 py-2 rounded">
            Simpan
        </button>
    </form>

</div>
</x-app-layout>