<x-app-layout title="HAAL - [ÇİFTÇİ ADI]">
{{--    TODO:Çiftçi adı gelecek--}}
    <div class="container w-11/12 mx-auto pt-15">
        <div class="grid grid-cols-6 pb-10 bg-white border shadow">
            <div class="grid col-span-2 pt-10">
                <div class="relative hidden w-44 h-44 mx-auto rounded-full md:block">
                    <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ" alt="" loading="lazy" />
                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                </div>
                <div class="mx-auto mt-10">
                    <ul>
                        <li>[ŞEHİR]</li>
                        <li>[TELNO]</li>
                    </ul>
                </div>
            </div>
            <div class="grid col-span-4 pt-10">
                <div class="flex flex-col w-full mx-auto">
                    <p class="text-4xl font-medium">Ahmet Ceyran</p>
                    <div class="mt-5 text-black">
                        @for($i=0;$i < 5 ; $i++)
                            <i class="far fa-star"></i>
                        @endfor
                    </div>
                    <p class="font-light mt-3">
                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid eius enim eum incidunt minus modi molestiae rerum vero. Aliquid assumenda beatae cupiditate doloribus facere id magni necessitatibus nihil nisi tenetur!</span>
                        <span>Debitis deleniti distinctio dolores esse, illum in nesciunt numquam provident rem repellat repellendus reprehenderit repudiandae saepe similique soluta suscipit totam ullam! Deserunt est expedita id nesciunt repellendus tempora vitae! Velit.</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 px-5">
            <div class="flex flex-col col-span-2 w-3/4 mx-auto">
                <p class="mt-5 ml-5 text-xl font-medium">REFERANSLAR</p>
                <div class="flex flex-col">
                @for($i=0;$i <5; $i++)
                        <div class="flex flex-col my-3 px-2 py-4 bg-white border rounded">
                            <div class="grid grid-cols-12 pt-2 px-5">
                                <div class="col-span-3 flex flex-col pt-5">
                                    <div class="rounded-full w-15 h-15 bg-blue-400 mx-auto"></div>
                                    <div class="mt-5 text-black text-xs mx-auto">
                                        @for($j=0;$j < 5 ; $j++)
                                            <i class="far fa-star"></i>
                                        @endfor
                                    </div>
                                    <p class="text-gray-500 mx-auto mt-4">[ALINAN ÜRÜN ADI]</p>
                                </div>
                                <div class="col-span-9 flex flex-col pl-3">
                                    <p class="ml-5 text-xl mt-1">[MÜŞTERİ ADI]</p>
                                    <p class="mt-5 text-light tex-sm">
                                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            Adipisci amet beatae culpa cumque distinctio dolore eius et illo ipsum
                                            itaque magnam numquam optio perferendis placeat praesentium quibusdam,
                                            repellendus tempore, ut!</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                @endfor
                </div>
            </div>
            <div class="flex flex-col"></div>
        </div>
    </div>
</x-app-layout>
