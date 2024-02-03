@php
    Use Carbon\Carbon;
@endphp
<div>
    <div class="table shadow-lg border border-green-500 rounded-lg p-2 mx-5 md:mx-10">
        <div class="table-header-group bg-green-500">
          <div class="table-row font-bold">
            <div class="table-cell text-left w-1/12 py-2 align-middle px-3 text-left text-white">#</div>
            <div class="table-cell text-left w-1/12 py-2 align-middle px-3 text-left text-white">Name</div>
            <div class="table-cell text-left w-1/12 py-2 align-middle px-3 text-left text-white">Phone</div>
            <div class="table-cell text-left w-1/12 py-2 align-middle px-3 text-left text-white">Room</div>
            <div class="table-cell text-left w-1/12 py-2 align-middle px-3 text-left text-white">Price</div>
            <div class="table-cell text-left w-1/12 py-2 align-middle px-3 text-left text-white text-center">Date booking</div>
            <div class="table-cell text-left w-1/12 py-2 align-middle px-3 text-left text-white">Status</div>
            <div class="table-cell text-left w-1/12 py-2 align-middle px-3 text-left text-white"> </div>
          </div>
        </div>
        <div class="table-row-group bg-white">
            {{-- @php
                dd($bookings);
            @endphp --}}
            @foreach ($bookings as $key => $item)
                <div class="table-row hover:bg-gray-100/50 py-1">
                    <div class="table-cell w-1/12 py-1 align-middle px-3 border-b border-gray-200 truncate capitalize">{{ $key+1 }}</div>
                    <div class="table-cell w-1/12 py-1 align-middle px-3 border-b border-gray-200 truncate">{{ $item->name }}</div>
                    <div class="table-cell w-1/12 py-1 align-middle px-3 border-b border-gray-200 truncate">{{ $item->phone }}</div>
                    <div class="table-cell w-1/12 py-1 align-middle px-3 border-b border-gray-200 truncate">{{ 'P'.$item->numberRoom.' - '.$item->types.' '.$item->bed }}</div>
                    <div class="table-cell w-1/12 py-1 align-middle px-3 border-b border-gray-200 truncate">{{ number_format($item->price,0,'.','.') }} &#8363;</div>
                    <div class="table-cell w-1/12 py-1 align-middle px-3 border-b border-gray-200 truncate text-slate-500">
                        <span class="@if($item->status == 1) text-blue-500 @endif">{{ Carbon::parse($item->checkin)->format('d-m-Y H:i') }}</span>
                        <span class="text-xl text-red-500">&nbsp; &#10168; &nbsp;</span>
                        <span class="@if($item->status == 2) text-green-500 @endif">{{ Carbon::parse($item->checkout)->format('d-m-Y H:i') }}</span>
                    </div>
                    <div class="table-cell w-1/12 py-1 align-middle px-3 border-b border-gray-200 truncate text-slate-500 uppercase">
                        @if ($item->status == 0)
                            <span class="px-3 py-1 rounded-lg w-full bg-slate-300 text-xs text-slate-600 font-medium">Booking</span>
                        @elseif ($item->status == 1)                            
                            <span class="px-3 py-1 rounded-lg w-full bg-blue-500 text-xs text-white font-medium">Checkin</span>                            
                        @elseif ($item->status == 2)                            
                            <span class="px-3 py-1 rounded-lg w-full bg-green-500 text-xs text-white font-medium">Checkout</span>                            
                        @endif
                    </div>
                    <div class="table-cell w-1/12 py-1 align-middle px-3 border-b border-gray-200 truncate" x-data="{ dropdown: false }">
                        <button class="p-1 m-1 outline-none" type="button" @click="dropdown = true">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 fill-green-600 hover:fill-green-400 hover:animate-spin duration-1000">
                                <path d="M17.004 10.407c.138.435-.216.842-.672.842h-3.465a.75.75 0 0 1-.65-.375l-1.732-3c-.229-.396-.053-.907.393-1.004a5.252 5.252 0 0 1 6.126 3.537ZM8.12 8.464c.307-.338.838-.235 1.066.16l1.732 3a.75.75 0 0 1 0 .75l-1.732 3c-.229.397-.76.5-1.067.161A5.23 5.23 0 0 1 6.75 12a5.23 5.23 0 0 1 1.37-3.536ZM10.878 17.13c-.447-.098-.623-.608-.394-1.004l1.733-3.002a.75.75 0 0 1 .65-.375h3.465c.457 0 .81.407.672.842a5.252 5.252 0 0 1-6.126 3.539Z" />
                                <path fill-rule="evenodd" d="M21 12.75a.75.75 0 1 0 0-1.5h-.783a8.22 8.22 0 0 0-.237-1.357l.734-.267a.75.75 0 1 0-.513-1.41l-.735.268a8.24 8.24 0 0 0-.689-1.192l.6-.503a.75.75 0 1 0-.964-1.149l-.6.504a8.3 8.3 0 0 0-1.054-.885l.391-.678a.75.75 0 1 0-1.299-.75l-.39.676a8.188 8.188 0 0 0-1.295-.47l.136-.77a.75.75 0 0 0-1.477-.26l-.136.77a8.36 8.36 0 0 0-1.377 0l-.136-.77a.75.75 0 1 0-1.477.26l.136.77c-.448.121-.88.28-1.294.47l-.39-.676a.75.75 0 0 0-1.3.75l.392.678a8.29 8.29 0 0 0-1.054.885l-.6-.504a.75.75 0 1 0-.965 1.149l.6.503a8.243 8.243 0 0 0-.689 1.192L3.8 8.216a.75.75 0 1 0-.513 1.41l.735.267a8.222 8.222 0 0 0-.238 1.356h-.783a.75.75 0 0 0 0 1.5h.783c.042.464.122.917.238 1.356l-.735.268a.75.75 0 0 0 .513 1.41l.735-.268c.197.417.428.816.69 1.191l-.6.504a.75.75 0 0 0 .963 1.15l.601-.505c.326.323.679.62 1.054.885l-.392.68a.75.75 0 0 0 1.3.75l.39-.679c.414.192.847.35 1.294.471l-.136.77a.75.75 0 0 0 1.477.261l.137-.772a8.332 8.332 0 0 0 1.376 0l.136.772a.75.75 0 1 0 1.477-.26l-.136-.771a8.19 8.19 0 0 0 1.294-.47l.391.677a.75.75 0 0 0 1.3-.75l-.393-.679a8.29 8.29 0 0 0 1.054-.885l.601.504a.75.75 0 0 0 .964-1.15l-.6-.503c.261-.375.492-.774.69-1.191l.735.267a.75.75 0 1 0 .512-1.41l-.734-.267c.115-.439.195-.892.237-1.356h.784Zm-2.657-3.06a6.744 6.744 0 0 0-1.19-2.053 6.784 6.784 0 0 0-1.82-1.51A6.705 6.705 0 0 0 12 5.25a6.8 6.8 0 0 0-1.225.11 6.7 6.7 0 0 0-2.15.793 6.784 6.784 0 0 0-2.952 3.489.76.76 0 0 1-.036.098A6.74 6.74 0 0 0 5.251 12a6.74 6.74 0 0 0 3.366 5.842l.009.005a6.704 6.704 0 0 0 2.18.798l.022.003a6.792 6.792 0 0 0 2.368-.004 6.704 6.704 0 0 0 2.205-.811 6.785 6.785 0 0 0 1.762-1.484l.009-.01.009-.01a6.743 6.743 0 0 0 1.18-2.066c.253-.707.39-1.469.39-2.263a6.74 6.74 0 0 0-.408-2.309Z" clip-rule="evenodd" />
                            </svg>                                                               
                        </button>
                        <div class="absolute z-10 flex flex-col border border-green-500 rounded-md bg-white text-center" x-show="dropdown" @click.outside="dropdown = false">
                            <button type="button" wire:click="showModal({{$item->id}})" class="cursor-pointer py-1 px-3 rounded-t-md text-slate-500 text-xs font-medium border-b hover:text-green-500 hover:duration-200">More</button>
                            <form action="{{ route('updateCheckin', ['id'=>$item->idBooking]) }}" method="POST">
                                @csrf
                                <button type="submit" class="cursor-pointer py-1 px-3 text-slate-500 text-xs font-medium border-b hover:bg-blue-500 hover:text-white hover:duration-200">Checkin</button>
                            </form>
                            <form action="{{ route('updateCheckout', ['id'=>$item->idBooking]) }}" method="POST">
                                @csrf
                                <button type="submit" class="cursor-pointer py-1 px-3 text-slate-500 text-xs font-medium border-b hover:bg-green-500 hover:text-white hover:duration-200">Checkout</button>
                            </form>
                            <button type="button" wire:click="destroyBooking({{$item->id}})" class="cursor-pointer py-1 px-3 rounded-b-md text-slate-500 text-xs font-medium hover:bg-red-500 hover:text-white hover:duration-200">Delete</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @foreach ($bookings as $itemModal)
            {{-- <div class="fixed w-full h-full top-0 left-0 z-20 flex justify-center items-center bg-gray-500/50"> --}}
            <div class="@if($modelLstBooking == 'itmBooking'.$itemModal->id)  fixed w-full h-full top-0 left-0 z-20 flex justify-center items-center bg-gray-500/50 @else hidden @endif">
                <div class="flex flex-col w-fit h-fit p-5 rounded-lg shadow bg-white">
                    <div class="flex">
                        <div>
                            <img class="w-6 rounded-full" src="{{ asset('img/icon_wyndham.png') }}">
                        </div>
    
                        <div class="mx-3">
                            <h2 class="font-semibold capitalize text-slate-500 mb-2">
                                {{ $itemModal->idBooking }}
                            </h2>
                            <hr>
                            <div class="flex flex-warp justify-around">
                                <div class="text-green-600 py-1 px-2">
                                    <table class="table-auto w-fit">
                                        <tbody>
                                          <tr>
                                            <td class="px-2">Name</td>
                                            <td class="text-slate-500">: {{ $itemModal->name }}</td>
                                          </tr>
                                          <tr>
                                            <td class="px-2">Phone</td>
                                            <td class="text-slate-500">: {{ $itemModal->phone }}</td>
                                          </tr>
                                          <tr>
                                            <td class="px-2">Email</td>
                                            <td class="text-slate-500">: {{ $itemModal->email }}</td>
                                          </tr>
                                          <tr>
                                            <td class="px-2">Gender</td>
                                            <td class="text-slate-500">: {{ $itemModal->gender }}</td>
                                          </tr>
                                          <tr>
                                            <td class="px-2">Address</td>
                                            <td class="text-slate-500">: {{ $itemModal->address }}</td>
                                          </tr>
                                          <tr>
                                            <td class="px-2">Checkin</td>
                                            <td class="text-slate-500">: {{ Carbon::parse($itemModal->checkin)->format('d-m-Y H:i') }}</td>
                                          </tr>
                                          <tr>
                                            <td class="px-2">Checkout</td>
                                            <td class="text-slate-500">: {{ Carbon::parse($itemModal->checkout)->format('d-m-Y H:i') }}</td>
                                          </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-green-600 py-1 px-2">
                                    <table class="table-auto w-fit">
                                        <tbody>
                                          <tr>
                                            <td class="px-2">Room</td>
                                            <td class="text-slate-500">: P{{ $itemModal->numberRoom }}</td>
                                          </tr>
                                          <tr>
                                            <td class="px-2">Types</td>
                                            <td class="text-slate-500">: {{ $itemModal->types }} {{ $itemModal->bed }}</td>
                                          </tr>
                                          <tr>
                                            <td class="px-2">Discount</td>
                                            <td class="text-slate-500">: {{ $itemModal->discount }}</td>
                                          </tr>
                                          <tr>
                                            <td class="px-2">Price</td>
                                            <td class="text-slate-500">: {{ $itemModal->price }}</td>
                                          </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- <p class="mt-2 text-sm text-gray-600 leading-relaxed">Etiam finibus velit vel lacus cursusdimentum quam viverra in.</p> --}}
                        </div>
                    </div>
    
                    <div class="flex justify-end items-center mt-3">
                        <button wire:click="showModal(false)" type="button" class="mx-1 px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm font-medium rounded-md">
                            Cancel
                        </button>
                        {{-- <button type="button" class="mx-1 px-4 py-2 bg-green-500 hover:bg-green-600 text-white text-sm font-medium rounded-md">
                            Update
                        </button> --}}
                    </div>
                </div>
            </div>
    @endforeach
</div>