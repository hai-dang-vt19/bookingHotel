<form x-data="{ showInsertUser: true }">
    @include('admin.block.alert')
    <button @click="showInsertUser = !showInsertUser" type="button"
        class="w-full py-1 px-5 outline-none rounded border font-bold bg-green-600 text-white text-lg hover:bg-green-500"
    > Add new user</button>
    <div x-show="showInsertUser" x-transition.opacity.duration.500ms>
        <div class="flex my-5 border border-green-600 rounded bg-white font-medium @error('insert_name') border-red-500 @enderror">
            <div>
                <p class="label__input text-green-600 text-sm @error('insert_name') text-red-500 @enderror ">@error('insert_name') {{ $message }} @enderror Name</p>
                <input wire:model='insert_name' class="my-2 px-3 outline-none" type="text">
            </div>
            <select wire:model='insert_gender' class="my-2 mx-3 text-green-600 outline-none">
                <option value="1">Gender</option>
                <option value="1">Male</option>
                <option value="0">Female</option>
            </select>
        </div>
        <div class="my-5 border border-green-600 rounded bg-white font-medium">
            <p class="label__input text-green-600 text-sm"> Email</p>
            <input wire:model='insert_email' class="my-2 px-3 w-full outline-none" type="text">
        </div>
        <div class="my-5 border border-green-600 rounded bg-white font-medium">
            <p class="label__input text-green-600 text-sm">Phone</p>
            <input wire:model='insert_phone' class="my-2 px-3 w-full outline-none" type="number">
        </div>
        <div class="my-5 pr-3 border border-green-600 rounded bg-white font-medium @error('insert_roles') border-red-500 @enderror">
            <p class="label__input text-green-600 text-sm @error('insert_roles') text-red-500 @enderror">@error('insert_roles') {{ $message }} @enderror Roles</p>
            <select wire:model='insert_roles' class="my-2 px-3 w-full outline-none">
                <option value="customer">- Select -</option>
                <option value="admin">Admin</option>
                <option value="manager">Manager</option>
                <option value="staff">Staff</option>
                <option value="customer">Customer</option>
            </select>
        </div>
        <div class="my-5 border border-green-600 rounded bg-white font-medium">
            <p class="label__input text-green-600 text-sm">Address</p>
            <input wire:model='insert_address' class="my-2 px-3 w-full outline-none" type="text">
        </div>
        <div class="flex flex-warp mb-3">
            <button wire:click="resetInputAddUser()" type="button" class="m-1 w-full px-4 py-2 bg-cyan-700 hover:bg-cyan-700/90 text-white text-sm font-medium rounded-md">
                Reset Field
            </button>
            <button wire:click.prevent='addUser()' type="button" class="m-1 w-full px-4 py-2 bg-green-600 hover:bg-green-600/90 text-white text-sm font-medium rounded-md">
                Submit
            </button>
        </div>
    </div>
</form>