<section class="bg-background food-pattern">
    <div class="max-w-screen-xl px-4 py-12 mx-auto sm:px-6 lg:px-8 lg:py-16">
        <h2 class="text-3xl tracking-wide text-center text-primary sm:text-5xl font-superFood">
            Baca Ulasan Terpercaya Dari Pelanggan Kami
        </h2>

        <div class="mt-8 [column-fill:_balance] md:columns-2 md:gap-6 lg:columns-3 lg:gap-8">
            @php
                $profiles = [
                    [
                        'name' => 'Agus Santoso',
                        'image' =>
                            'https://images.unsplash.com/photo-1705249541153-ec92176f9197?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8aW5kb25lc2lhbiUyMGJveXxlbnwwfHwwfHx8MA%3D%3D',
                        'review' =>
                            'Emping singkong ini sangat renyah dan pas buat camilan sehari-hari. Rasa gurihnya bikin ketagihan!',
                    ],
                    [
                        'name' => 'Siti Nurhayati',
                        'image' =>
                            'https://images.unsplash.com/photo-1661254730616-9df1ada97631?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjJ8fGluZG9uZXNpYW4lMjBnaXJsfGVufDB8fDB8fHww',
                        'review' =>
                            'Suka banget dengan rasa originalnya. Tidak terlalu asin dan cocok untuk teman minum teh.',
                    ],
                    [
                        'name' => 'Rizky Saputra',
                        'image' =>
                            'https://images.unsplash.com/photo-1722083033920-db8c5ca9464e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTF8fGluZG9uZXNpYW4lMjBib3l8ZW58MHx8MHx8fDA%3D',
                        'review' =>
                            'Emping yang enak dengan tekstur yang pas, tidak terlalu tebal. Sangat cocok untuk dikonsumsi bersama keluarga.',
                    ],
                    [
                        'name' => 'Dewi Lestari',
                        'image' =>
                            'https://images.unsplash.com/photo-1625506381812-525ff7ac1a94?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mjd8fGluZG9uZXNpYW4lMjBnaXJsfGVufDB8fDB8fHww',
                        'review' =>
                            'Suka dengan kualitas empingnya yang renyah dan tidak berminyak. Rekomendasi banget!',
                    ],
                    [
                        'name' => 'Hendra Wijaya',
                        'image' =>
                            'https://images.unsplash.com/photo-1722099588943-33adb4d37bc6?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTV8fGluZG9uZXNpYW4lMjBib3l8ZW58MHx8MHx8fDA%3D',
                        'review' =>
                            'Rasanya gurih dan renyah, cocok buat ngemil kapan saja. Sangat puas dengan produk ini!',
                    ],
                    [
                        'name' => 'Lestari Wulandari',
                        'image' =>
                            'https://images.unsplash.com/photo-1702316992093-5f3b19fe3ca5?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzR8fGluZG9uZXNpYW4lMjBnaXJsfGVufDB8fDB8fHww',
                        'review' =>
                            'Emping yang sangat renyah dan tidak terlalu asin, cocok untuk dinikmati saat santai bersama keluarga.',
                    ],
                    [
                        'name' => 'Ahmad Fauzan',
                        'image' =>
                            'https://images.unsplash.com/photo-1603696774332-6dcf0e5aa964?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzR8fGluZG9uZXNpYW4lMjBib3l8ZW58MHx8MHx8fDA%3D',
                        'review' => 'Camilan makaroni yang cocok buat semua kalangan. Gurihnya pas dan bikin nagih!',
                    ],
                    [
                        'name' => 'Ratna Sari',
                        'image' =>
                            'https://images.unsplash.com/photo-1697605373317-b6481110d04f?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NzF8fGluZG9uZXNpYW4lMjBnaXJsfGVufDB8fDB8fHww',
                        'review' => 'cipruk mantap! Rasa original yang simpel tapi bikin pengen terus ngemil.',
                    ],
                    [
                        'name' => 'Bayu Kurniawan',
                        'image' =>
                            'https://images.unsplash.com/photo-1602714007833-58fc14b465e0?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NjB8fGluZG9uZXNpYW4lMjBib3l8ZW58MHx8MHx8fDA%3D',
                        'review' =>
                            'Emping singkong ini sangat cocok untuk segala acara. Renyah dan tidak terlalu asin.',
                    ],
                ];
            @endphp

            @foreach ($profiles as $profile)
                <div class="mb-8 sm:break-inside-avoid">
                    <blockquote class="p-6 rounded-lg shadow-sm bg-gray-50 sm:p-8">
                        <div class="flex items-center gap-4">
                            <img alt="{{ $profile['name'] }}" src="{{ $profile['image'] }}"
                                class="object-cover rounded-full size-14" loading="lazy" />
                            <div>
                                <div class="flex justify-center gap-0.5 text-green-500">
                                    @for ($i = 0; $i < 5; $i++)
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    @endfor
                                </div>
                                <p class="mt-0.5 text-lg font-medium text-gray-900">{{ $profile['name'] }}</p>
                            </div>
                        </div>
                        <p class="mt-4 text-gray-700">
                            {{ $profile['review'] }}
                        </p>
                    </blockquote>
                </div>
            @endforeach

        </div>
    </div>
</section>
