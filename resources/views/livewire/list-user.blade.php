{{-- <div wire:loading>
    <div class="z-40 fixed top-5 left-5">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 stroke-green-600 animate-spin duration-1000">
            <path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-2.25-1.313M21 7.5v2.25m0-2.25-2.25 1.313M3 7.5l2.25-1.313M3 7.5l2.25 1.313M3 7.5v2.25m9 3 2.25-1.313M12 12.75l-2.25-1.313M12 12.75V15m0 6.75 2.25-1.313M12 21.75V19.5m0 2.25-2.25-1.313m0-16.875L12 2.25l2.25 1.313M21 14.25v2.25l-2.25 1.313m-13.5 0L3 16.5v-2.25" />
        </svg>          
    </div>
</div> --}}
<form action="">
    @include('admin.block.alert')
    {{-- Search --}}
    <div class="overflow-hidden mx-4 mb-5 md:mx-10 flex flex-wrap">
        <div class="flex items-center border border-green-600 rounded my-1 ms-1 me-4 py-1 bg-white">
            <label for="search" class="border-r-2 border-green-600 px-2">
                <select wire:model='elements' class="outline-none text-green-600">
                    <option value="name">Name</option>
                    <option value="email">Email</option>
                    <option value="phone">Phone</option>
                </select>
            </label>
            <input wire:model="search" class="outline-none px-2" type="text" placeholder="Search" id="search">
        </div>
        <label class="flex border border-green-600 rounded-l my-1 px-4 py-1 cursor-pointer @if($roles == '') bg-green-600 text-white font-medium @endif hover:text-white hover:bg-green-600">
            <input wire:model='roles' class="outline-none accent-green-500 outline-none px-2 hidden" type="radio" value="" id="ra_all">
            <p class="px-2">All</p>
        </label>
        <label class="flex border border-green-600 my-1 px-4 py-1 cursor-pointer @if($roles == 'admin') bg-green-600 text-white font-medium @endif hover:text-white hover:bg-green-600">
            <input wire:model='roles' class="outline-none accent-green-500 outline-none px-2 hidden" type="radio" value="admin" id="rd_admin">
            <p class="px-2">Admin</p>
        </label>
        <label class="flex border border-green-600 my-1 px-4 py-1 cursor-pointer @if($roles == 'manager') bg-green-600 text-white font-medium @endif hover:text-white hover:bg-green-600">
            <input wire:model='roles' class="outline-none accent-green-500 outline-none px-2 hidden" type="radio" value="manager" id="ra_manager">
            <p class="px-2">Manager</p>
        </label>
        <label class="flex border border-green-600 my-1 px-4 py-1 cursor-pointer @if($roles == 'Staff') bg-green-600 text-white font-medium @endif hover:text-white hover:bg-green-600">
            <input wire:model='roles' class="outline-none accent-green-500 outline-none px-2 hidden" type="radio" value="Staff" id="ra_Staff">
            <p class="px-2">Staff</p>
        </label>
        <label class="flex border border-green-600 rounded-r my-1 px-4 py-1 cursor-pointer @if($roles == 'customer') bg-green-600 text-white font-medium @endif hover:text-white hover:bg-green-600">
            <input wire:model='roles' class="outline-none accent-green-500 outline-none px-2 hidden" type="radio" value="customer" id="ra_user">
            <p class="px-2">Customer</p>
        </label>
        
        <div class="w-fit flex items-center border border-green-600 bg-white rounded my-1 ms-4 me-1 py-1">
            <label for="limits" class="border-r-2 border-green-600 text-green-600 px-2">
                Result                                         
            </label>
            <input wire:model="limits" class="outline-none px-2" type="number" id="limits" value="10" max="100" min="1" step="10">
        </div>
    </div>
    <div class="table shadow-lg border border-green-500 rounded-lg p-2 mx-4 md:mx-10">
        <div class="table-header-group bg-green-500">
          <div class="table-row">
            <div class="table-cell text-left w-4 py-2 align-middle px-6 text-center text-white">STT</div>
            <div class="table-cell text-left w-1/4 py-2 align-middle px-6 text-left text-white">Name</div>
            <div class="table-cell text-left w-1/4 py-2 align-middle px-6 text-left text-white">Email</div>
            <div class="table-cell text-left w-1/4 py-2 align-middle px-6 text-left text-white">Phone</div>
            <div class="table-cell text-left w-1/4 py-2 align-middle px-6 text-center text-white">Roles</div>
            <div class="table-cell text-left w-1/4 py-2 align-middle px-6 text-left text-white"> </div>
          </div>
        </div>
        <div class="table-row-group bg-white">
            @foreach ($users as $key => $item)
                <div class="table-row hover:bg-gray-100/50" wire:key="item_{{$item->id}}">
                    <div class="table-cell w-4 py-1 align-middle px-6 border-b border-gray-200 truncate text-center">{{ $key+1 }}</div>
                    <div class="table-cell w-1/4 py-1 align-middle px-6 border-b border-gray-200 truncate capitalize">{{ $item->name }}</div>
                    <div class="table-cell w-1/4 py-1 align-middle px-6 border-b border-gray-200 truncate">{{ $item->email }}</div>
                    <div class="table-cell w-1/4 py-1 align-middle px-6 border-b border-gray-200 truncate">{{ $item->phone }}</div>
                    <div class="table-cell w-1/4 py-1 align-middle px-6 border-b border-gray-200 truncate text-center">
                        @if ($item->roles == 'admin')
                            <span class="bg-gray-900 shadow shadow-gray-900/50 text-white py-1 px-3 rounded-full text-xs capitalize font-medium">{{ $item->roles }}</span>
                        @elseif ($item->roles == 'manager')
                            <span class="bg-gray-500 shadow shadow-gray-500/50 text-white py-1 px-3 rounded-full text-xs capitalize font-medium">{{ $item->roles }}</span>
                        @elseif ($item->roles == 'staff')
                            <span class="bg-slate-200 shadow shadow-slate-200/50 text-black py-1 px-3 rounded-full text-xs capitalize font-medium">{{ $item->roles }}</span>
                        @else
                            <span class="bg-green-500 shadow shadow-green-500/50 text-white py-1 px-3 rounded-full text-xs capitalize font-medium">{{ $item->roles }}</span>
                        @endif
                    </div>
                    <div class="table-cell w-1/4 py-1 align-middle px-6 border-b border-gray-200 truncate" x-data="{ dropdown: false }">
                        <button class="p-1 m-1 outline-none" type="button" @click="dropdown = true">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 fill-green-600 hover:fill-green-400 hover:animate-spin duration-1000">
                                <path d="M17.004 10.407c.138.435-.216.842-.672.842h-3.465a.75.75 0 0 1-.65-.375l-1.732-3c-.229-.396-.053-.907.393-1.004a5.252 5.252 0 0 1 6.126 3.537ZM8.12 8.464c.307-.338.838-.235 1.066.16l1.732 3a.75.75 0 0 1 0 .75l-1.732 3c-.229.397-.76.5-1.067.161A5.23 5.23 0 0 1 6.75 12a5.23 5.23 0 0 1 1.37-3.536ZM10.878 17.13c-.447-.098-.623-.608-.394-1.004l1.733-3.002a.75.75 0 0 1 .65-.375h3.465c.457 0 .81.407.672.842a5.252 5.252 0 0 1-6.126 3.539Z" />
                                <path fill-rule="evenodd" d="M21 12.75a.75.75 0 1 0 0-1.5h-.783a8.22 8.22 0 0 0-.237-1.357l.734-.267a.75.75 0 1 0-.513-1.41l-.735.268a8.24 8.24 0 0 0-.689-1.192l.6-.503a.75.75 0 1 0-.964-1.149l-.6.504a8.3 8.3 0 0 0-1.054-.885l.391-.678a.75.75 0 1 0-1.299-.75l-.39.676a8.188 8.188 0 0 0-1.295-.47l.136-.77a.75.75 0 0 0-1.477-.26l-.136.77a8.36 8.36 0 0 0-1.377 0l-.136-.77a.75.75 0 1 0-1.477.26l.136.77c-.448.121-.88.28-1.294.47l-.39-.676a.75.75 0 0 0-1.3.75l.392.678a8.29 8.29 0 0 0-1.054.885l-.6-.504a.75.75 0 1 0-.965 1.149l.6.503a8.243 8.243 0 0 0-.689 1.192L3.8 8.216a.75.75 0 1 0-.513 1.41l.735.267a8.222 8.222 0 0 0-.238 1.356h-.783a.75.75 0 0 0 0 1.5h.783c.042.464.122.917.238 1.356l-.735.268a.75.75 0 0 0 .513 1.41l.735-.268c.197.417.428.816.69 1.191l-.6.504a.75.75 0 0 0 .963 1.15l.601-.505c.326.323.679.62 1.054.885l-.392.68a.75.75 0 0 0 1.3.75l.39-.679c.414.192.847.35 1.294.471l-.136.77a.75.75 0 0 0 1.477.261l.137-.772a8.332 8.332 0 0 0 1.376 0l.136.772a.75.75 0 1 0 1.477-.26l-.136-.771a8.19 8.19 0 0 0 1.294-.47l.391.677a.75.75 0 0 0 1.3-.75l-.393-.679a8.29 8.29 0 0 0 1.054-.885l.601.504a.75.75 0 0 0 .964-1.15l-.6-.503c.261-.375.492-.774.69-1.191l.735.267a.75.75 0 1 0 .512-1.41l-.734-.267c.115-.439.195-.892.237-1.356h.784Zm-2.657-3.06a6.744 6.744 0 0 0-1.19-2.053 6.784 6.784 0 0 0-1.82-1.51A6.705 6.705 0 0 0 12 5.25a6.8 6.8 0 0 0-1.225.11 6.7 6.7 0 0 0-2.15.793 6.784 6.784 0 0 0-2.952 3.489.76.76 0 0 1-.036.098A6.74 6.74 0 0 0 5.251 12a6.74 6.74 0 0 0 3.366 5.842l.009.005a6.704 6.704 0 0 0 2.18.798l.022.003a6.792 6.792 0 0 0 2.368-.004 6.704 6.704 0 0 0 2.205-.811 6.785 6.785 0 0 0 1.762-1.484l.009-.01.009-.01a6.743 6.743 0 0 0 1.18-2.066c.253-.707.39-1.469.39-2.263a6.74 6.74 0 0 0-.408-2.309Z" clip-rule="evenodd" />
                            </svg>                                                               
                        </button>
                        <div class="absolute z-10 flex flex-col border border-green-500 rounded-md bg-green-500" x-show="dropdown" @click.outside="dropdown = false">
                            <p wire:click="showModalMore({{ $item->id }})" class="cursor-pointer py-1 px-3 rounded-t-md text-white text-xs font-medium border-b hover:bg-white hover:text-green-500 hover:duration-200">More</p>
                            <p wire:click='showModalDestroy({{$item->id}})' class="cursor-pointer py-1 px-3 rounded-b-md text-white text-xs font-medium hover:bg-white hover:text-green-500 hover:duration-200">Delete</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="mx-4 mt-5 md:mx-10">
        {{ $users->links() }}
    </div>
    @foreach ($users as $userMd)
        <div wire:key='user{{ $userMd->id }}' class="@if($modal_more == 'modalMore'.$userMd->id)  fixed w-full h-full top-0 left-0 z-20 flex justify-center items-center bg-gray-500/50 @else hidden @endif">
            <div class="flex flex-col w-fit h-fit p-5 rounded-lg shadow bg-white">
                <div class="flex">
                    <div>
                        <img class="w-6 rounded-full" src="{{ asset('img/icon_wyndham.png') }}">
                    </div>

                    <div class="mx-3">
                        <h2 class="font-semibold capitalize text-gray-800 mb-2">
                            user ID - {{ $userMd->id }}
                        </h2>
                        <hr>
                        <div class="flex flex-warp justify-around">
                            <div class="mr-5 mb-5 capitalize">
                                <div class="my-5 border border-green-600 rounded bg-white font-medium">
                                    <p class="label__input text-green-600 text-sm">Name</p>
                                    <input wire:model='up_name' class="my-2 px-3 outline-none" type="text">
                                    <select wire:model='up_gender' class="my-2 mx-3 text-green-600 outline-none">
                                        <option selected>Gender</option>
                                        <option value="1">Male</option>
                                        <option value="0">Female</option>
                                    </select>
                                </div>
                                <div class="my-5 border border-green-600 rounded bg-white font-medium">
                                    <p class="label__input text-green-600 text-sm">Email</p>
                                    <input wire:model='up_email' class="my-2 px-3 w-full outline-none" type="text">
                                </div>
                                <div class="my-5 border border-green-600 rounded bg-white font-medium">
                                    <p class="label__input text-green-600 text-sm">Phone</p>
                                    <input wire:model='up_phone' class="my-2 px-3 w-full outline-none" type="number">
                                </div>
                                <div class="my-5 pr-3 border border-green-600 rounded bg-white font-medium">
                                    <p class="label__input text-green-600 text-sm">Roles</p>
                                    <select wire:model='up_roles' class="my-2 px-3 w-full outline-none">
                                        <option selected>- Select -</option>
                                        <option value="admin">Admin</option>
                                        <option value="manager">Manager</option>
                                        <option value="staff">Staff</option>
                                        <option value="customer">Customer</option>
                                    </select>
                                </div>
                                <div class="my-5 border border-green-600 rounded bg-white font-medium">
                                    <p class="label__input text-green-600 text-sm">Address</p>
                                    <input wire:model='up_address' class="my-2 px-3 w-full outline-none" type="text">
                                </div>
                                <button wire:click="resetInputModal()" type="button" class="w-full my-2 px-4 py-2 bg-cyan-700 hover:bg-cyan-700/90 text-white text-sm font-medium rounded-md">
                                    Reset Field
                                </button>
                            </div>
                            <div class="flex justify-between my-5 md:ml-5">
                                <div class="mr-3 capitalize">
                                    <p class="mb-2">Name: </p>
                                    <p class="mb-2">Gender: </p>
                                    <p class="mb-2">Email: </p>
                                    <p class="mb-2">Phone: </p>
                                    <p class="mb-2">Roles: </p>
                                    <p class="mb-2">Address: </p>
                                </div>
                                <div class="text-green-600 font-medium">
                                    <p class="mb-2 capitalize">{{ $userMd->name }} &nbsp;</p>
                                    <p class="mb-2 capitalize">@if($userMd->gender == 1) Male @elseif($userMd->gender == 0) Female @else &nbsp; @endif</p>
                                    <p class="mb-2">{{ $userMd->email }} &nbsp;</p>
                                    <p class="mb-2">{{ $userMd->phone }} &nbsp;</p>
                                    @if ($userMd->roles == 'admin')
                                        <p class="mb-2 w-fit text-center bg-gray-900 shadow shadow-gray-900/50 text-white py-1 px-3 rounded-full text-xs capitalize">{{ $userMd->roles }} &nbsp;</p>
                                    @elseif ($userMd->roles == 'manager')
                                        <p class="mb-2 w-fit text-center bg-gray-500 shadow shadow-gray-500/50 text-white py-1 px-3 rounded-full text-xs capitalize">{{ $userMd->roles }} &nbsp;</p>
                                    @elseif ($userMd->roles == 'staff')
                                        <p class="mb-2 w-fit text-center bg-slate-200 shadow shadow-slate-200/50 text-black py-1 px-3 rounded-full text-xs capitalize">{{ $userMd->roles }} &nbsp;</p>
                                    @else
                                        <p class="mb-2 w-fit text-center bg-green-500 shadow shadow-green-500/50 text-white py-1 px-3 rounded-full text-xs capitalize">{{ $userMd->roles }} &nbsp;</p>
                                    @endif
                                    <p class="mb-2 capitalize">{{ $userMd->address }} &nbsp;</p>
                                </div>
                            </div>
                        </div>
                        {{-- <p class="mt-2 text-sm text-gray-600 leading-relaxed">Etiam finibus velit vel lacus cursusdimentum quam viverra in.</p> --}}
                    </div>
                </div>

                <div class="flex justify-end items-center mt-3">
                    <button wire:click="showModalMore(false)" type="button" class="mx-1 px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm font-medium rounded-md">
                        Cancel
                    </button>
                    <button wire:click="updateUser({{ $userMd->id }})" type="button" class="mx-1 px-4 py-2 bg-green-500 hover:bg-green-600 text-white text-sm font-medium rounded-md">
                        Update
                    </button>
                </div>
            </div>
        </div>
        <div class="@if($modal_destroy == 'modalDestroy'.$userMd->id)  fixed w-full h-full top-0 left-0 z-20 flex justify-center items-center bg-gray-500/50 @else hidden @endif" wire:click="showModalDestroy(false)">
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
                            Delete @if($userMd->gender == 1)Mr.@else Ms.@endif{{ $userMd->name }} from list !
                        </p>
                        {{-- <p class="mt-2 text-sm text-gray-600 leading-relaxed">Etiam finibus velit vel lacus cursusdimentum quam viverra in.</p> --}}
                    </div>
                </div>

                <div class="flex justify-end items-center mt-3">
                    <button wire:click="showModalDestroy(false)" type="button" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm font-medium rounded-md">
                        Cancel
                    </button>

                    <button wire:click='destroyUser({{ $userMd->id }})' type="button" class="px-4 py-2 ml-2 bg-red-500 hover:bg-red-600 text-white text-sm font-medium rounded-md">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    @endforeach
</form>