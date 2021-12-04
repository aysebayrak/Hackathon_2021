<x-app-layout title="HAAL - Sipariş Onayı">
    <form action="/orders" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{$product->id}}">
    <div class="container w-3/4 mx-auto grid grid-cols-6 gap-4 pt-10">
        <div class="grid col-span-4  border rounded shadow px-4 pt-5 pb-52 h-screen">
            <div class="bg-white rounded px-5 pt-7 overflow-y-scroll">
                <h1 class="text-xl font-bold text-center">TARIM HİZMETLERİ ÖN SATIŞ SÖZLEŞMESİ</h1>
                <ul class="list-disc">
                    <li>Bu sözleşme {{\Illuminate\Support\Facades\Auth::user()->name}} İle üretici {{$product->user->name}}
                        arasında yaptıkları sözleşmenin şartlarını belirtir.
                    </li>
                    <li>
                        Taraflar
                    </li>
                    <li class="ml-5">
                        Üretici<br>
                        <ul class="ml-5">
                            <li>Adı Soyadı : {{$product->user->name}}</li>
                            <li>Adresi : {{$product->user->address->open_address}}</li>
                            <li>İl/İlçe : {{$product->user->address->district .
                            "/" . $product->user->address->city}}</li>
                            <li>Telefon No : {{$product->user->phone}}</li>
                        </ul>
                    </li>
                    <li class="ml-5">
                        Alıcı<br>
                        <ul class="ml-5">
                            <li>Adı Soyadı : {{\Illuminate\Support\Facades\Auth::user()->name}}</li>
                            <li>Adresi : {{\Illuminate\Support\Facades\Auth::user()->address->open_address}}</li>
                            <li>İl/İlçe : {{\Illuminate\Support\Facades\Auth::user()->address->district .
                            "/" . \Illuminate\Support\Facades\Auth::user()->address->city}}</li>
                            <li>Telefon No : {{\Illuminate\Support\Facades\Auth::user()->phone}}</li>
                        </ul>
                    </li>
                    <li class="ml-5"> Üreticinin Görevi ve Sorumlulukları <br>
                        <ul class="ml-5">
                            <li>Ürünü belirlenen tarihinde teslim etmek.</li>
                            <li>Ürün teklif miktarı ile aynı miktarda teslim etmek.</li>
                            <li>Teslim öncesi kalite testleri yapmak.</li>
                            <li>Alıcıyla yapılan “Sözleşme” kurallarına uymak.</li>
                        </ul>
                    </li>
                    <li>Alıcı Görevi ve Sorumlulukları<br>
                        <ul class="ml-5">
                            <li>Ürün teklif onayından sonra 10 iş günü içinde toplam tutar fiyatının %10’u kadar peşinat ödemek.</li>
                            <li>Sipariş nakliyeye hazır olduğunda toplam tutarın ödemek.</li>
                            <li>Üreticiyle yapılan “Sözleşme” kurallarına uymak.</li>
                        </ul>
                    </li>
                    <li> Sözleşme süresi, sona ermesi ve fesih<br>
                        <ul class="ml-5">
                            <li>Bu sözleşme tarım hizmetlerinin devamı süresince geçerlidir.</li>
                        </ul>
                    </li>
                    <li>Anlaşmazlıklar</br>
                        <ul class="ml-5">
                            <li>Bu sözleşmenin uygulanmasından doğabilecek anlaşmazlıkların çözümünde mahkeme ve icra daireleri yetkilidir.</li>
                            <li>Bu sözleşme {{\Carbon\Carbon::now()->format("d.m.Y")}} tarihinde hazırlanmış ve taraflarca imzalanmıştır. Bu sözleşmede hüküm bulunmayan konularda genel hükümler uygulanır.</li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="flex mt-6 text-sm">
                <label class="flex items-center text-lg dark:text-gray-400">
                    <input required type="checkbox" class="text-purple-600 form-checkbox focus:border-purple-400
                    focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
                    <span class="ml-2">
                        Yukarıda Bulunan
                        <span class="underline">TARIM HİZMETLERİ ÖN SATIŞ SÖZLEŞMESİ</span>
                        'ni Okudum Kabul Ediyorum.
                    </span>
                </label>
            </div>
        </div>
        <div class="grid col-span-2 border rounded shadow px-4 pt-5 h-auto bg-white">
            <div class="flex flex-col w-full">
                <div class="flex items-center text-sm mb-5">
                    <!-- Avatar with inset shadow -->
                    <div class="relative hidden w-20 h-20 mr-3 rounded-full md:block">
                        <img class="object-cover w-full h-full rounded-full" src="{{$product->photo_url ? '/storage/'.$product->photo_url :
                        'https://ui-avatars.com/api/?name='.urlencode($product->name).'&color=7F9CF5&background=EBF4FF'}}" alt="" loading="lazy" />
                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                    </div>
                    <div>
                        <p class="font-semibold text-xl ml-5">{{$product->name}}</p>
                    </div>
                </div>
                <p class="text-lg ml-5 text-gray-600 dark:text-gray-400">
                    <strong>Miktar: </strong> {{$product->quantity}} Ton
                </p>
                <p class="text-lg ml-5 text-gray-600 dark:text-gray-400">
                    <strong>Fiyat: </strong>₺{{$product->price}}
                </p>
                <p class="text-lg ml-5 text-gray-600 dark:text-gray-400">
                    <strong>Teslim Tarihi: </strong>{{\Carbon\Carbon::make($product->delivery_date)->format('d-m-Y')}}
                </p>
                <div class="flex flex-col w-full py-5 mt-10 border rounded">
                    <div class="flex flex-row py-3">
                        <label for="">
                            <input type="radio" required name="payment_method" class="ml-5">
                            <i class="far fa-credit-card ml-6 mr-2"></i>
                            <span>Kredi Kartı İle Ödeme</span>
                        </label>
                    </div>
                    <div class="flex flex-row py-3">
                        <label for="">
                            <input type="radio" required name="payment_method" class="ml-5">
                            <i class="fas fa-university ml-6 mr-2"></i>
                            <span>Havale İle Ödeme</span>
                        </label>
                    </div>
                </div>
                <button type="submit" class="px-4 py-2 mt-5 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    İşlemi Onayla
                </button>

            </div>
        </div>
    </div>
    </form>
</x-app-layout>
