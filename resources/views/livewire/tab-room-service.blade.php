<div>
    <div class="flex justify-center align-center mx-1 mt-1 mb-5">
        <div class="flex overflow-x-auto items-center p-1 space-x-1 rtl:space-x-reverse text-sm text-gray-600 bg-gray-500/5 rounded-xl">
            <button type="button" wire:click="tabRoomService('room')"
                class="flex whitespace-nowrap items-center h-8 px-5 font-medium rounded-lg outline-none focus:ring-2 focus:ring-green-600 focus:ring-inset @if ($tab == 'room') text-green-600 shadow bg-white @endif"
            >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 m-1">
                    <path d="M19.006 3.705a.75.75 0 1 0-.512-1.41L6 6.838V3a.75.75 0 0 0-.75-.75h-1.5A.75.75 0 0 0 3 3v4.93l-1.006.365a.75.75 0 0 0 .512 1.41l16.5-6Z" />
                    <path fill-rule="evenodd" d="M3.019 11.114 18 5.667v3.421l4.006 1.457a.75.75 0 1 1-.512 1.41l-.494-.18v8.475h.75a.75.75 0 0 1 0 1.5H2.25a.75.75 0 0 1 0-1.5H3v-9.129l.019-.007ZM18 20.25v-9.566l1.5.546v9.02H18Zm-9-6a.75.75 0 0 0-.75.75v4.5c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75V15a.75.75 0 0 0-.75-.75H9Z" clip-rule="evenodd" />
                </svg>
                &nbsp;   Rooms
            </button>
    
            <button type="button" wire:click="tabRoomService('service')"
                class="flex whitespace-nowrap items-center h-8 px-5 font-medium rounded-lg outline-none focus:ring-2 focus:ring-green-600 focus:ring-inset hover:text-gray-800 focus:text-green-600 @if ($tab == 'service') text-green-600 shadow bg-white @endif"
            >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 m-1">
                    <path fill-rule="evenodd" d="M2.25 4.125c0-1.036.84-1.875 1.875-1.875h5.25c1.036 0 1.875.84 1.875 1.875V17.25a4.5 4.5 0 1 1-9 0V4.125Zm4.5 14.25a1.125 1.125 0 1 0 0-2.25 1.125 1.125 0 0 0 0 2.25Z" clip-rule="evenodd" />
                    <path d="M10.719 21.75h9.156c1.036 0 1.875-.84 1.875-1.875v-5.25c0-1.036-.84-1.875-1.875-1.875h-.14l-8.742 8.743c-.09.089-.18.175-.274.257ZM12.738 17.625l6.474-6.474a1.875 1.875 0 0 0 0-2.651L15.5 4.787a1.875 1.875 0 0 0-2.651 0l-.1.099V17.25c0 .126-.003.251-.01.375Z" />
                </svg>
                &nbsp;   Services
            </button>
        </div>
    </div>
    <div class="@if($tab != 'room') hidden @endif">
        <div class="flex justify-center md:px-52">
            <div class="table w-full shadow-md border border-green-500 rounded-lg p-2 mx-1">
                <div class="table-header-group bg-green-500">
                <div class="table-row font-medium">
                    <div class="table-cell text-left w-1/4 py-2 align-middle px-6 text-left text-white">Room</div>
                    <div class="table-cell text-left w-1/4 py-2 align-middle px-6 text-left text-white">Type</div>
                    <div class="table-cell text-left w-1/4 py-2 align-middle px-6 text-center text-white">Bedroom</div>
                    <div class="table-cell text-left w-1/4 py-2 align-middle px-6 text-center text-white">Customer</div>
                    <div class="table-cell text-left w-1/4 py-2 align-middle px-6 text-left text-white">Price</div>
                    <div class="table-cell text-left w-1/4 py-2 align-middle px-6 text-left text-white">Discount</div>
                    <div class="table-cell text-left w-64 py-2 align-middle px-6 text-center text-white">Service</div>
                    <div class="table-cell text-left w-1/4 py-2 align-middle px-6 text-left text-white flex" x-data="{collapse: false}">
                        <button class="px-2 rounded shadow bg-white text-green-500 outline-none" type="button" @click="collapse = ! collapse">New</button>
                        <form class="z-20 fixed top-0 h-screen w-1/3 overflow-y-auto right-0 bg-white flex justify-center border-l border-green-500 shadow offcanvas overflow-y" x-show="collapse"
                            x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100"
                            x-transition:leave="transition offcanvas-out duration-300"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            @click.outside="collapse = false"
                            enctype="multipart/form-data"
                        >
                            @include('admin.block.alert')
                            <div class="w-full block text-slate-800">
                                <div class="sticky top-0 flex justify-between bg-slate-50 z-20 py-3 px-4 shadow-md">
                                    <h1 class="text-green-600 text-center font-medium">New Room</h1>
                                    <svg @click="collapse = false" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 stroke-slate-500 cursor-pointer hover:stroke-green-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>                                  
                                </div>
                                <div class="mx-1 mt-5 px-5">
                                    <div class="my-2 border border-green-600 @error($insert_name) border-red-600 @enderror rounded bg-white font-medium">
                                        <p class="label__input text-green-600 @error($insert_name) text-red-600 @enderror text-sm">@error($insert_name) {{ $message }} @enderror Room</p>
                                        <input wire:model='insert_name' class="my-2 px-3 w-full outline-none" type="number" placeholder="101">
                                    </div>
                                </div>
                                <div class="mx-1 mt-5 px-5">
                                    <div class="my-2 border border-green-600 @error($insert_type) border-red-600 @enderror rounded bg-white font-medium">
                                        <p class="label__input text-green-600 @error($insert_type) text-red-600 @enderror text-sm">@error($insert_type) {{ $message }} @enderror Type</p>
                                        <select wire:model='insert_type' class="my-2 px-3 w-full outline-none cursor-pointer">
                                            <option></option>
                                            <option value="Standard">Standard</option>
                                            <option value="Superior">Superior</option>
                                            <option value="Deluxe">Deluxe</option>
                                            <option value="Suite">Suite</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mx-1 mt-5 px-5">
                                    <div class="my-2 border border-green-600 @error($insert_bedroom) border-red-600 @enderror rounded bg-white font-medium">
                                        <p class="label__input text-green-600 @error($insert_bedroom) text-red-600 @enderror text-sm">@error($insert_bedroom) {{ $message }} @enderror Bedroom</p>
                                        <select wire:model='insert_bedroom' class="my-2 px-3 w-full outline-none cursor-pointer"  wire:click="getCustomer">
                                            <option selected></option>
                                            <option value="Single">Single</option>
                                            <option value="Twin">Twin</option>
                                            <option value="Double">Double</option>
                                            <option value="Triple">Triple</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mx-1 mt-5 px-5" wire:click="getCustomer">
                                    <div class="my-2 border border-green-600 @error($insert_customer) border-red-600 @enderror rounded bg-white font-medium">
                                        <p class="label__input text-green-600 @error($insert_customer) text-red-600 @enderror text-sm">@error($insert_customer) {{ $message }} @enderror Customer</p>
                                        <input wire:model='insert_customer' class="my-2 px-3 w-full outline-none" type="number" value="{{ $insert_customer }}">
                                    </div>
                                </div>
                                <div class="mx-1 mt-5 px-5">
                                    <div class="my-2 border border-green-600 @error($insert_price) border-red-600 @enderror rounded bg-white font-medium">
                                        <p class="label__input text-green-600 @error($insert_price) text-red-600 @enderror text-sm">@error($insert_price) {{ $message }} @enderror Price</p>
                                        <input wire:model='insert_price' class="my-2 px-3 w-full outline-none" x-mask:dynamic="$money($input,',')" min="0" placeholder="1.750.000">
                                    </div>
                                </div>
                                <div class="mx-1 mt-5 mb-4 px-5">
                                    <div class="my-2 border border-green-600 rounded bg-white font-medium">
                                        <p class="label__input text-green-600 text-sm"> Discount</p>
                                        <input wire:model='insert_discount' class="my-2 px-3 w-full outline-none" type="number" min="0" max="100" placeholder="50">
                                    </div>
                                </div>
                                <div class="flex flex-warp justify-center">
                                    <div class="m-1 w-11/12 px-1">
                                        <div class="my-2 border border-green-600 rounded bg-white font-medium">
                                            <p class="label__input text-green-600 text-sm">Service <button wire:click='checkAllService' type="button" class="px-3 rounded outline-none bg-green-500 text-white">Check All</button></p>
                                            <div class="my-3 mx-5 font-normal">
                                                @foreach ($services as $vals)
                                                    <div class="m-1 p-1">
                                                        <input wire:model="insert_service" class="mx-2 mt-1 accent-green-600" type="checkbox" id="s{{$vals->id}}" value="{{ $vals->id }}" wire:key='s{{$vals->id}}' checked>
                                                        <label for="s{{$vals->id}}" class="cursor-pointer">{{ $vals->name }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mx-1 mt-2 mb-4 px-5">
                                    <div class="my-2 border border-green-600 rounded bg-white font-medium">
                                        <p class="label__input text-green-600 text-sm"> Title</p>
                                        <input wire:model='insert_title' class="my-2 px-3 w-56 outline-none" type="text">
                                    </div>
                                </div>
                                <div class="m-1 px-5">
                                    <div class="my-2 border border-green-600 rounded bg-white font-medium">
                                        <p class="label__input text-green-600 text-sm"> Description</p>
                                        <textarea wire:model='insert_description' class="my-2 px-3 w-full outline-none" cols="10" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="m-1 px-5">
                                    <input wire:model='insert_file' class="my-2 w-56 outline-none" type="file" multiple>
                                </div>
                                <div class="flex justify-center p-5">
                                    <button type="button" wire:click.prevent='saveRoom' class="py-1 px-5 bg-green-600 w-60 rounded outline-none text-white font-medium">Success</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
                <div class="table-row-group bg-white">
                    @foreach ($rooms as $key => $item)
                        <div class="table-row hover:bg-gray-100/50">
                            <div class="table-cell w-1/4 py-1 align-middle px-6 border-b border-gray-200 truncate text-green-600 font-medium capitalize">{{ 'P'.$item->numberRoom }}</div>
                            <div class="table-cell w-1/4 py-1 align-middle px-6 border-b border-gray-200 truncate">{{ $item->types }}</div>
                            <div class="table-cell w-1/4 py-1 align-middle px-6 border-b border-gray-200 truncate">{{ $item->bed }}</div>
                            <div class="table-cell w-1/4 py-1 align-middle px-6 border-b border-gray-200 truncate text-center">{{ $item->customer }}</div>
                            <div class="table-cell w-1/4 py-1 align-middle px-6 border-b border-gray-200 truncate text-blue-600">{{ number_format($item->price, 0, '.', '.') }} <span class="text-xs">&#8363;</span></div>
                            <div class="table-cell w-1/4 py-1 align-middle px-6 border-b border-gray-200 truncate">{{ $item->discount }} @if($item->discount > 0)<span class="text-xs">%</span>@endif</div>
                            <div class="table-cell w-64 py-1 align-middle px-6 border-b border-gray-200 truncate">
                                <p class="w-64 truncate">
                                    @php
                                        $exp_lstService = explode(', ',$item->service);
                                        foreach ($exp_lstService as $itemService) {
                                            foreach ($services as $value) {
                                                if ($itemService == $value->id) {
                                                    echo $value->name.', ';
                                                }
                                            }
                                        }
                                    @endphp
                                </p>
                            </div>
                            <div class="table-cell w-1/4 py-1 align-middle px-6 border-b border-gray-200 truncate" x-data="{ dropdown: false }">
                                <button class="p-1 m-1 outline-none" type="button" @click="dropdown = true">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 fill-green-600 hover:fill-green-400 hover:animate-spin duration-1000">
                                        <path d="M17.004 10.407c.138.435-.216.842-.672.842h-3.465a.75.75 0 0 1-.65-.375l-1.732-3c-.229-.396-.053-.907.393-1.004a5.252 5.252 0 0 1 6.126 3.537ZM8.12 8.464c.307-.338.838-.235 1.066.16l1.732 3a.75.75 0 0 1 0 .75l-1.732 3c-.229.397-.76.5-1.067.161A5.23 5.23 0 0 1 6.75 12a5.23 5.23 0 0 1 1.37-3.536ZM10.878 17.13c-.447-.098-.623-.608-.394-1.004l1.733-3.002a.75.75 0 0 1 .65-.375h3.465c.457 0 .81.407.672.842a5.252 5.252 0 0 1-6.126 3.539Z" />
                                        <path fill-rule="evenodd" d="M21 12.75a.75.75 0 1 0 0-1.5h-.783a8.22 8.22 0 0 0-.237-1.357l.734-.267a.75.75 0 1 0-.513-1.41l-.735.268a8.24 8.24 0 0 0-.689-1.192l.6-.503a.75.75 0 1 0-.964-1.149l-.6.504a8.3 8.3 0 0 0-1.054-.885l.391-.678a.75.75 0 1 0-1.299-.75l-.39.676a8.188 8.188 0 0 0-1.295-.47l.136-.77a.75.75 0 0 0-1.477-.26l-.136.77a8.36 8.36 0 0 0-1.377 0l-.136-.77a.75.75 0 1 0-1.477.26l.136.77c-.448.121-.88.28-1.294.47l-.39-.676a.75.75 0 0 0-1.3.75l.392.678a8.29 8.29 0 0 0-1.054.885l-.6-.504a.75.75 0 1 0-.965 1.149l.6.503a8.243 8.243 0 0 0-.689 1.192L3.8 8.216a.75.75 0 1 0-.513 1.41l.735.267a8.222 8.222 0 0 0-.238 1.356h-.783a.75.75 0 0 0 0 1.5h.783c.042.464.122.917.238 1.356l-.735.268a.75.75 0 0 0 .513 1.41l.735-.268c.197.417.428.816.69 1.191l-.6.504a.75.75 0 0 0 .963 1.15l.601-.505c.326.323.679.62 1.054.885l-.392.68a.75.75 0 0 0 1.3.75l.39-.679c.414.192.847.35 1.294.471l-.136.77a.75.75 0 0 0 1.477.261l.137-.772a8.332 8.332 0 0 0 1.376 0l.136.772a.75.75 0 1 0 1.477-.26l-.136-.771a8.19 8.19 0 0 0 1.294-.47l.391.677a.75.75 0 0 0 1.3-.75l-.393-.679a8.29 8.29 0 0 0 1.054-.885l.601.504a.75.75 0 0 0 .964-1.15l-.6-.503c.261-.375.492-.774.69-1.191l.735.267a.75.75 0 1 0 .512-1.41l-.734-.267c.115-.439.195-.892.237-1.356h.784Zm-2.657-3.06a6.744 6.744 0 0 0-1.19-2.053 6.784 6.784 0 0 0-1.82-1.51A6.705 6.705 0 0 0 12 5.25a6.8 6.8 0 0 0-1.225.11 6.7 6.7 0 0 0-2.15.793 6.784 6.784 0 0 0-2.952 3.489.76.76 0 0 1-.036.098A6.74 6.74 0 0 0 5.251 12a6.74 6.74 0 0 0 3.366 5.842l.009.005a6.704 6.704 0 0 0 2.18.798l.022.003a6.792 6.792 0 0 0 2.368-.004 6.704 6.704 0 0 0 2.205-.811 6.785 6.785 0 0 0 1.762-1.484l.009-.01.009-.01a6.743 6.743 0 0 0 1.18-2.066c.253-.707.39-1.469.39-2.263a6.74 6.74 0 0 0-.408-2.309Z" clip-rule="evenodd" />
                                    </svg>                                                               
                                </button>
                                <div class="absolute z-10 flex flex-col border border-green-500 rounded-md bg-green-500" x-show="dropdown" @click.outside="dropdown = false">
                                    <p wire:click='modalUpdateRoom({{$item->id}})' class="cursor-pointer py-1 px-3 rounded-t-md text-white text-xs font-medium border-b hover:bg-white hover:text-green-500 hover:duration-200">More</p>
                                    <p wire:click='modalDestroyRoom({{$item->id}})' class="cursor-pointer py-1 px-3 rounded-b-md text-white text-xs font-medium hover:bg-white hover:text-green-500 hover:duration-200">Delete</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="md:px-52 mt-3">
            {{ $rooms->links() }}
        </div>
        @foreach ($rooms as $itemRoom)
            <div wire:key='user{{ $itemRoom->id }}' 
                class="@if($modal_room == 'modalRoom'.$itemRoom->id || 'modalRoom'.session()->get('error2') == 'modalRoom'.$itemRoom->id)  fixed w-full h-full top-0 left-0 z-20 flex justify-center items-center bg-gray-500/50 @else hidden @endif"
            >
                <form action="{{ route('UpdateRoom', ['id'=>$itemRoom->id]) }}" method="POST" enctype="multipart/form-data"
                    class="flex flex-col w-fit max-h-screen p-5 rounded-lg shadow bg-white"
                >   @csrf
                    <div class="flex block max-h-full overflow-y-auto">
                        <div class="sticky top-0">
                            <img class="w-6 rounded-full" src="{{ asset('img/icon_wyndham.png') }}">
                        </div>

                        <div class="mx-3">
                            <h2 class="font-semibold capitalize text-gray-800 mb-2 pb-2 sticky top-0 bg-white">
                                Room ID - {{ $itemRoom->id }}
                            </h2>
                            <div class="flex flex-warp">
                                <div class="m-2">
                                    <div class="my-5 border border-green-600 @error('up_name') border-red-500 @enderror rounded bg-white font-medium">
                                        <p class="label__input text-green-600 @error('up_name') text-red-500 @enderror text-sm ">Room @error('up_name') {{ $message }} @enderror</p>
                                        <input name='up_name' class="w-60 my-2 px-3 outline-none" type="text" value="{{ $itemRoom->numberRoom }}">
                                    </div>
                                    <div class="my-5 border border-green-600 rounded bg-white font-medium">
                                        <p class="label__input text-green-600 text-sm">Type</p>
                                        <select name='up_type' class="w-60 my-2 mx-3 outline-none">
                                            <option value="Standard" @if($itemRoom->types == 'Standard') selected @endif>Standard</option>
                                            <option value="Superior" @if($itemRoom->types == 'Superior') selected @endif>Superior</option>
                                            <option value="Deluxe" @if($itemRoom->types == 'Deluxe') selected @endif>Deluxe</option>
                                            <option value="Suite" @if($itemRoom->types == 'Suite') selected @endif>Suite</option>
                                        </select>
                                    </div>
                                    <div class="my-5 border border-green-600 rounded bg-white font-medium">
                                        <p class="label__input text-green-600 text-sm">Bedroom</p>
                                        <select name='up_bedroom' class="w-60 my-2 mx-3 outline-none">
                                            <option value="Single" @if($itemRoom->bed == 'Single') selected @endif>Single</option>
                                            <option value="Twin" @if($itemRoom->bed == 'Twin') selected @endif>Twin</option>
                                            <option value="Double" @if($itemRoom->bed == 'Double') selected @endif>Double</option>
                                            <option value="Triple" @if($itemRoom->bed == 'Triple') selected @endif>Triple</option>
                                        </select>
                                    </div>
                                    <div class="my-5 border border-green-600 @error('up_price') border-red-500 @enderror rounded bg-white font-medium">
                                        <p class="label__input text-green-600 @error('up_price') text-red-500 @enderror text-sm">Price @error('up_price') {{ $message }} @enderror</p>
                                        <input name='up_price' class="w-60 my-2 px-3 outline-none" type="text" value="{{ number_format($itemRoom->price, 0, '.', '.') }}">
                                    </div>
                                    <div class="my-5 border border-green-600 rounded bg-white font-medium">
                                        <p class="label__input text-green-600 text-sm">Discount %</p>
                                        <input name='up_discount' class="w-60 my-2 px-3 outline-none" type="number" min="0" max="100" value="{{ $itemRoom->discount }}">
                                    </div>
                                    <div class="my-5 border border-green-600 rounded bg-white font-medium">
                                        <p class="label__input text-green-600 text-sm">Title</p>
                                        <input name='up_title' class="w-60 my-2 px-3 outline-none" type="text" value="{{ $itemRoom->title }}">
                                    </div>
                                    <div class="my-5 border border-green-600 rounded bg-white font-medium">
                                        <p class="label__input text-green-600 text-sm">Description</p>
                                        <textarea name="up_description" class="w-60 my-2 px-3 outline-none" cols="20" rows="3">{{ $itemRoom->description }}</textarea>
                                    </div>
                                    <div class="my-5 border border-green-600 rounded bg-white font-medium">
                                        <p class="label__input text-green-600 text-sm">IMG</p>
                                        <input name='up_file[]' class="w-60 my-2 px-3 outline-none" type="file" multiple>
                                        <br>
                                        <div class="px-3 mb-1 w-60 truncate text-xs text-gray-500">
                                            {{ $itemRoom->img }}
                                        </div>
                                    </div>
                                </div>
                                <div class="m-2">
                                    <div class="my-5 border border-green-600 rounded bg-white font-medium">
                                        <p class="label__input text-green-600 text-sm">Service</p>
                                        @php
                                            $exp_upService = explode(', ',$itemRoom->service);
                                        @endphp
                                        <div class="my-3 mx-5 font-normal">
                                        @foreach ($services as $value_up)
                                            <div class="m-1 p-1">
                                                <input type="checkbox" name="up_service[]" value="{{$value_up->id}}" id="s2_{{$value_up->id}}"
                                                    class="mx-2 mt-1 accent-green-600"
                                                    @foreach ($exp_upService as $item_upService)
                                                        @if($item_upService == $value_up->id) checked @endif
                                                    @endforeach
                                                ><label for="s2_{{$value_up->id}}" class="cursor-pointer">{{$value_up->name}}</label>
                                            </div>
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end items-center mt-3">
                        <button wire:click="modalUpdateRoom(false)" type="button" class="mx-1 px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm font-medium rounded-md">
                            Cancel
                        </button>
                        <button type="submit" class="mx-1 px-4 py-2 bg-green-500 hover:bg-green-600 text-white text-sm font-medium rounded-md">
                            Update
                        </button>
                    </div>
                </form>
            </div>
            <div class="@if($modal_destroyRoom == 'modal_destroyRoom'.$itemRoom->id)  fixed w-full h-full top-0 left-0 z-20 flex justify-center items-center bg-gray-500/50 @else hidden @endif" wire:click="modalDestroyRoom(false)">
                <div class="flex flex-col w-fit h-fit p-5 rounded-lg shadow bg-white">
                    <div class="flex">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-red-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                            </svg>                                  
                        </div>

                        <div class="mx-3">
                            <h2 class="font-semibold capitalize text-red-500">
                                Are you sure ?
                            </h2>
                            <p class="my-3">
                                Delete room {{$itemRoom->name}} from Wyndham Phu Cuoc !
                            </p>
                        </div>
                    </div>

                    <div class="flex justify-end items-center mt-3">
                        <button wire:click="modalDestroyRoom(false)" type="button" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm font-medium rounded-md">
                            Cancel
                        </button>

                        <button wire:click='destroyRoom({{ $itemRoom->id }})' type="button" class="px-4 py-2 ml-2 bg-red-500 hover:bg-red-600 text-white text-sm font-medium rounded-md">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
        @if (session()->has('error2'))
                <div class="z-40 fixed top-0 left-0 w-full py-5 bg-red-500 text-white text-center font-bold text-lg capitalize rounded-b flex justify-center alert"
                    x-data="{ error: true }" x-show="error" x-init="setTimeout(() => error = false, 5000)"
                    x-transition:leave="transition alert-out duration-300"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7 mx-2">
                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                    </svg>       
                    <p class="mx-2">Cannot be null input * please ! </p>
                </div>
        @endif
        @if (session()->has('success2'))
            <div class="z-40 fixed top-0 left-0 w-full py-5 bg-green-500 text-white text-center font-bold text-lg capitalize rounded-b flex justify-center alert"
                x-data="{ success: true }" x-show="success" x-init="setTimeout(() => success = false, 3000)"
                x-transition:leave="transition alert-out duration-300"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
            >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7 mx-2">
                    <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.497 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.306 4.491 4.491 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                </svg>          
                <p class="mx-2">{{ session()->get('success2') }}</p>
            </div>
        @endif
    </div>
    
    <div class="@if($tab != 'service') hidden @endif ">
        @include('admin.block.alert')
        <div class="flex justify-center">
            <div>
                <div class="sticky top-0 z-20 bg-white rounded-lg mx-1">
                    <div class="flex justify-center">
                        <button wire:click="actionService('insert')" class="w-full px-2 pb-1 outline-none bg-white border hover:border-green-600 hover:text-green-600 @if($action_service == 'insert') border-green-600 text-green-600 @endif" type="button">Insert</button>
                        <button wire:click="actionService('update')" class="w-full px-2 pb-1 outline-none bg-white border hover:border-green-600 hover:text-green-600 @if($action_service == 'update') border-green-600 text-green-600 @endif" type="button">Update</button>
                    </div>
                    <form wire:submit.prevent="saveService" class="@if($action_service != 'insert') hidden @endif mb-5 p-2 border-x border-green-600">
                        @csrf
                        <div class="my-2 border border-green-600 @error($in_nameService) border-red-600 @enderror rounded bg-white font-medium">
                            <p class="label__input text-green-600 @error($in_nameService) text-red-600 @enderror text-sm">@error($in_nameService) {{ $message }} @enderror Name</p>
                            <input wire:model='in_nameService' class="my-2 px-3 w-full outline-none" type="text">
                        </div>
                        <button type="submit" class="w-full bg-green-500 text-white font-medium pb-1 rounded-md">Confirm</button>
                    </form>
                    <form wire:submit.prevent="updateService" class="@if($action_service != 'update') hidden @endif mb-5 p-2 border-x border-green-600">
                        @csrf
                        <div class="my-2 border border-green-600 @error($up_nameService) border-red-600 @enderror rounded bg-white font-medium">
                            <p class="label__input text-green-600 @error($up_nameService) text-red-600 @enderror text-sm">@error($up_nameService) {{ $message }} @enderror
                                <span>Select -</span>
                                <select wire:click="selectIdService" wire:model="slup_service" class="outline-none">
                                    <option>ID</option>
                                    @foreach ($services as $itm_slService)
                                        <option value="{{ $itm_slService->id.'-'.$itm_slService->name }}">{{ $itm_slService->id }}</option>
                                    @endforeach
                                </select>
                            </p>
                            <input wire:model="up_nameService" class="my-2 px-3 w-full outline-none" type="text">
                        </div>
                        <button type="submit" class="w-full bg-green-500 text-white font-medium pb-1 rounded-md">Update</button>
                    </form>
                </div>
                <div class="table w-full shadow-md border border-green-500 rounded-lg p-2 mx-1 mt-2 md:w-fit">
                    <div class="table-header-group bg-green-500">
                        <div class="table-row font-medium">
                            <div class="table-cell text-left w-1/4 py-2 align-middle px-6 text-left text-white">ID</div>
                            <div class="table-cell text-left w-1/4 py-2 align-middle px-6 text-left text-white">Name</div>
                            <div class="table-cell text-left w-1/4 py-2 align-middle px-6 text-center text-white"> </div>
                        </div>
                    </div>
                    <div class="table-row-group bg-white">
                        @foreach ($services as $item_service)
                            <div class="table-row hover:bg-gray-100/50">
                                <div class="table-cell w-1/4 py-1 align-middle px-6 border-b border-gray-200 truncate text-green-600 font-medium capitalize">{{ $item_service->id }}</div>
                                <div class="table-cell w-1/4 py-1 align-middle px-6 border-b border-gray-200 truncate">{{ $item_service->name }}</div>
                                <div class="table-cell w-1/4 py-1 align-middle px-6 border-b border-gray-200 truncate">
                                    <button type="button" wire:click="destroyService({{$item_service->id}})">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 stroke-red-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>                                          
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>