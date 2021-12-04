<x-guest-layout title="Register">
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">
                    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="{{asset('img/create-account-office.jpeg')}}" alt="Office" />
                    <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block" src="{{asset('img/create-account-office-dark.jpeg')}}" alt="Office" />
                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                            Create account
                        </h1>
                        @if ($errors->any())
                        <div class="mb-4">
                            <div class="font-medium text-red-600">Whoops! Something went wrong.</div>

                            <ul class="mt-3 text-sm text-red-600 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @if (session('status'))
                        <div class="mb-4 text-sm font-medium text-green-600">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Ad Soyad</span>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">E-posta</span>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"  type="email" name="email" :value="old('email')" required />
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Telefon No</span>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                                focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                                dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="tel" name="phone" :value="old('phone')" required />
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Şehir</span>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                                focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                                dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="text" name="address_city" :value="old('address_city')" required />
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">İlçe</span>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                                focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                                dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="text" name="address_district" :value="old('address_district')" required />
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Açık Adres</span>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                                focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                                dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="text" name="address_district" :value="old('address_district')" required />
                            </label>
                            <div class="mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Kullanıcı Tipi
                </span>
                                <div class="mt-2">
                                    <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                                        <input type="radio" class="text-purple-600 form-radio focus:border-purple-400
                                        focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                               name="user_type" value="farmer" />
                                        <span class="ml-2">Çiftçi</span>
                                    </label>
                                    <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                        <input type="radio" class="text-purple-600 form-radio focus:border-purple-400
                                        focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                               name="user_type" value="customer" />
                                        <span class="ml-2">Müşteri</span>
                                    </label>
                                </div>
                            </div>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Şifre</span>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="***************" type="password" name="password" required autocomplete="new-password" />
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Şifrenizi Onaylayın
                                </span>
                                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="***************" type="password" name="password_confirmation" required autocomplete="new-password" />
                            </label>

                            <!-- You should use a button here, as the anchor is only used for the example  -->
                            <button class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" type="submit">
                                {{ __('Register') }}
                            </button>
                        </form>

                        <p class="mt-4">
                            <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" href="{{ route('login') }}">
                                Zaten Üye misiniz? Giriş Yapıın
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
