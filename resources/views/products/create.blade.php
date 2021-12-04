<x-app-layout title="HAAL - Ürün Ekleme">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Yeni Ürün Ekleme
        </h2>

        <!-- General elements -->
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Ürün Bilgileri
        </h4>
        <form action="/products" method="POST">
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    @csrf
                <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                    <!-- Profile Photo File Input -->
                    <input type="file" name="photo" class="hidden" wire:model="photo" x-ref="photo" x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                    <x-label for="photo" value="Photo" />

                    <!-- Current Profile Photo -->
                    <div class="mt-2" x-show="! photoPreview">
                        <img src="" alt="" class="object-cover w-20 h-20 rounded-full">
                    </div>

                    <!-- New Profile Photo Preview -->
                    <div class="mt-2" x-show="photoPreview">
                <span class="block w-20 h-20 rounded-full" x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                </span>
                    </div>

                    <x-secondary-button class="mt-2" type="button" x-on:click.prevent="$refs.photo.click()">
                        {{ __('Select A New Photo') }}
                    </x-secondary-button>

                    <x-input-error for="photo" class="mt-2" />
                </div>

                    <label class="block text-sm mt-4">
                        <span class="text-gray-700 dark:text-gray-400">Ürün Adı</span>
                        <input name="name" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                        focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300
                        dark:focus:shadow-outline-gray form-input"/>
                    </label>
                    <label class="block text-sm mt-4">
                        <span class="text-gray-700 dark:text-gray-400">Ürün Miktarı (Ton)</span>
                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
                    focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray
                    form-input" name="quantity" type="number" min="0.1" step="0.1" />
                    </label>
                    <label class="block text-sm mt-4">
                        <span class="text-gray-700 dark:text-gray-400">Toplam Fiyat</span>
                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
                    focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray
                    form-input" name="price" type="number" min="0"/>
                    </label>
                    <label class="block text-sm mt-4">
                        <span class="text-gray-700 dark:text-gray-400">Teslim Tarihi</span>
                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
                    focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray
                    form-input" type="date" name="delivery_date" value="{{\Carbon\Carbon::now()->toDateString()}}"/>
                    </label>
            </div>
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Ürün Konum Bilgileri
            </h4>
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    {{--                ADRESBİLGİLERİ--}}
                    {{--<label class="block text-sm mt-4">
                        <span class="text-gray-700 dark:text-gray-400">Bölge</span>
                        <input name="name" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                        focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300
                        dark:focus:shadow-outline-gray form-input" name="address_region"/>

                    </label>--}}
                    <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Bölge
                    </span>
                        <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600
                        dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                        dark:focus:shadow-outline-gray" name="address_region">
                            <option value="Akdeniz">Akdeniz</option>
                            <option value="Ege">Ege</option>
                            <option value="Marmara">Marmara</option>
                            <option value="Karadeniz">Karadeniz</option>
                            <option value="Doğu Anadolu">Doğu Anadolu</option>
                            <option value="Güney Doğu Anadolu">Güney Doğu Anadolu</option>
                            <option value="İç Anadolu">İç Anadolu</option>
                        </select>
                    </label>
                    <label class="block text-sm mt-4">
                        <span class="text-gray-700 dark:text-gray-400">Şehir</span>
                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                        focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300
                        dark:focus:shadow-outline-gray form-input" name="address_city"/>
                    </label>
                    <label class="block text-sm mt-4">
                        <span class="text-gray-700 dark:text-gray-400">İlçe</span>
                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                        focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300
                        dark:focus:shadow-outline-gray form-input" name="address_district"/>
                    </label>
            </div>
                    <label class="block text-sm mt-4">
                        <button class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150
                    bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700
                    focus:outline-none focus:shadow-outline-purple"
                                type="submit">
                            Kaydet
                        </button>
                    </label>

        </form>
    </div>
</x-app-layout>
