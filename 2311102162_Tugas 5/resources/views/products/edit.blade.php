<x-app-layout>
<div class="container mx-auto p-5">

    <h1 class="text-2xl mb-5">Edit Produk</h1>

    <form action="{{ route('products.update', $product->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <input type="text"
               name="nama"
               value="{{ $product->nama }}"
               class="border p-2 w-full mb-3">

        <textarea name="deskripsi"
                  class="border p-2 w-full mb-3">{{ $product->deskripsi }}</textarea>

        <input type="number"
               name="stok"
               value="{{ $product->stok }}"
               class="border p-2 w-full mb-3">

        <input type="number"
               name="harga"
               value="{{ $product->harga }}"
               class="border p-2 w-full mb-3">

        <button class="bg-yellow-500 text-white px-4 py-2 rounded">
            Update
        </button>

    </form>

</div>
</x-app-layout>