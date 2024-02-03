<form>
    <div class="flex flex-col justify-center p-2">
        @error('email') <span class="text-red-600">{{ $message }}</span> @enderror
        <div class="w-64 flex justify-around items-center border border-green-600 rounded mb-3 py-1 @error('email')border-red-600 text-red-600 @enderror">
            <label for="email" class="border-r-2 border-green-600 @error('email') border-red-600 text-red-600 @enderror px-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                </svg>                
            </label>
            <input class="outline-none px-2" type="text" placeholder="user@example.com" id="email" wire:model="email">
        </div>
        @error('password') <span class="text-red-600">{{ $message }}</span> @enderror
        <div class="w-64 flex justify-around items-center border border-green-600 rounded mb-3 py-1 @error('password') border-red-600 text-red-600 @enderror">
            <label for="password" class="border-r-2 border-green-600 @error('password') border-red-600 text-red-600 @enderror px-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                </svg>                                                    
            </label>
            <input class="outline-none px-2" type="password" placeholder="Password" id="password" wire:model="password">
        </div>
        <button class="w-full bg-green-600 text-white rounded py-2 font-medium hover:bg-green-700 outline-none" wire:click.prevent="login">Login</button>
    </div>
</form>