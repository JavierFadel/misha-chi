<x-app-layout>
    <x-slot name="checkout">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 justify-items-center ">
                    @if ($message = Session::get('success'))
                        <div class="p-4 mb-3 bg-green-400 rounded absolute top-0">
                            <p class="text-green-800">{{ $message }}</p>
                        </div>
                    @endif
                    @foreach ($data as $item)
                        <div class="group my-10 flex w-full max-w-xs flex-col overflow-hidden rounded-lg border border-gray-100 bg-white shadow-md">
                            <a class="relative mx-3 mt-3 flex h-60 overflow-hidden rounded-xl" href="{{ URL::to('/product/' . $item['id']) }}">
                                <img class="peer absolute top-0 right-0 h-full w-full object-cover" src="{{ Vite::asset($item['image']) }}" alt="product image" />
                                <img class="peer absolute top-0 -right-96 h-full w-full object-cover transition-all delay-100 duration-1000 hover:right-0 peer-hover:right-0" src="{{ Vite::asset('resources/image/details.png') }}" alt="product image" />
                                <svg class="pointer-events-none absolute inset-x-0 bottom-5 mx-auto text-3xl text-white  transition-opacity group-hover:animate-ping group-hover:opacity-30 peer-hover:opacity-0" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32"><path fill="currentColor" d="M2 10a4 4 0 0 1 4-4h20a4 4 0 0 1 4 4v10a4 4 0 0 1-2.328 3.635a2.996 2.996 0 0 0-.55-.756l-8-8A3 3 0 0 0 14 17v7H6a4 4 0 0 1-4-4V10Zm14 19a1 1 0 0 0 1.8.6l2.7-3.6H25a1 1 0 0 0 .707-1.707l-8-8A1 1 0 0 0 16 17v12Z" /></svg>
                                <span class="absolute top-0 left-0 m-2 rounded-full bg-black px-2 text-center text-sm font-medium text-white">{{ mt_rand(1, 100) }}% OFF</span>
                            </a>
                            <div class="mt-4 px-5 pb-5">
                            <a href="#">
                                <h5 class="text-xl tracking-tight text-slate-900">{{ $item['name'] }}</h5>
                            </a>
                            <div class="mt-2 mb-5 flex items-center justify-between">
                                <p>
                                <span class="text-3xl font-bold text-slate-900">Rp {{ round($item['price'], -3) }}</span>
                                <span class="text-sm text-slate-900 line-through">Rp {{ round($item['price'] + ceil(mt_rand(40000, 200000)), -3) }}</span>
                                </p>
                            </div>

                            <form action="{{ route('page.checkout.add') }}" method="POST" enctype="multipart/form-data" class="align-right">
                                @csrf
                                <input type="hidden" value="{{ $item['id'] }}" name="id">
                                <input type="hidden" value="{{ $item['name'] }}" name="name">
                                <input type="hidden" value="{{ $item['price'] }}" name="price">
                                <input type="hidden" value="{{ $item['image'] }}"  name="image">
                                <input type="hidden" value="1" name="quantity">
                                {{-- TODO: this button will trigger checkout controller. --}}
                                <button type="submit" class="flex items-center justify-center rounded-md bg-slate-900 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="shrink-0 mr-3 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                    Add to cart
                                </button>
                            </form>
                            
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>