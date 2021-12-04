<x-app-layout title="Dashboard">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Anasayfa
        </h2>

        <!-- New Table -->
            @if(\Illuminate\Support\Facades\Auth::user()->user_type == "farmer" && \Illuminate\Support\Facades\Gate::allows('confirmedFarmer'))
{{--                @can('confirmedFarmer')--}}
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full py-20 bg-red-500 text-center text-2xl font-bold">Çiftçilik Üyeliğinizin Onaylanması İçin Profil Ayarları Sayfasından Çiftçilik Belgenizi Yükleyin.</div>
{{--                @endcan--}}
            @else
                <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                    Siparişlerim
                </h4>
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            @can('isFarmer')
                                <th class="px-4 py-3">Müşteri</th>
                            @endcan
                            @can('isCustomer')
                                <th class="px-4 py-3">Çiftçi</th>
                            @endcan
                            <th class="px-4 py-3">Ürün</th>
                            <th class="px-4 py-3">Miktar</th>
                            <th class="px-4 py-3">Fiyat</th>
                            <th class="px-4 py-3">Teslim Tarihi</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @can('isFarmer')
                            @foreach(\App\Models\Order::where('farmer_id',\Illuminate\Support\Facades\Auth::user()->id)->get() as $order)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <!-- Avatar with inset shadow -->
                                            <div class="relative hidden w-20 h-20 mr-3 rounded-full md:block">
                                                <img class="object-cover w-full h-full rounded-full" src="{{$order->customer->profile_photo_url}}{{--$order->customer->profile_photo_url ? '/storage/'.$order->customer->profile_photo_url :
                                'https://ui-avatars.com/api/?name='.urlencode($order->customer->name).'&color=7F9CF5&background=EBF4FF'--}}" alt="" loading="lazy" />
                                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                            </div>
                                            <div>
                                                <p class="font-semibold">{{$order->customer->name}}</p>
                                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                                    {{$order->customer->phone}}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-xs">
                                        {{$order->product->name}}
                                    </td>
                                    <td class="px-4 py-3 text-xs">
                                        {{$order->product->quantity}}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        ₺{{$order->product->price}}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{\Carbon\Carbon::make($order->product->delivery_date)->format('d-m-Y')}}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
{{--                                        <x-secondary-button>Satın Al</x-secondary-button>--}}
                                    </td>
                                </tr>
                            @endforeach
                        @endcan
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
            </div></div>

        {{--<!-- Charts -->
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Charts
        </h2>--}}
        {{--<div class="grid gap-6 mb-8 md:grid-cols-2">
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                    Revenue
                </h4>
                <canvas id="pie"></canvas>
                <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
                    <!-- Chart legend -->
                    <div class="flex items-center">
                        <span class="inline-block w-3 h-3 mr-1 bg-blue-500 rounded-full"></span>
                        <span>Shirts</span>
                    </div>
                    <div class="flex items-center">
                        <span class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"></span>
                        <span>Shoes</span>
                    </div>
                    <div class="flex items-center">
                        <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
                        <span>Bags</span>
                    </div>
                </div>
            </div>
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                    Traffic
                </h4>
                <canvas id="line"></canvas>
                <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
                    <!-- Chart legend -->
                    <div class="flex items-center">
                        <span class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"></span>
                        <span>Organic</span>
                    </div>
                    <div class="flex items-center">
                        <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
                        <span>Paid</span>
                    </div>
                </div>
            </div>
        </div>--}}
    </div>

</x-app-layout>
