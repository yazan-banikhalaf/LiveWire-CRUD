<div>

    <div class="grid gap-3 grid-cols-4">
        <div class="mb-4">
            <label class="block  text-sm font-bold mb-2" for="customer">Customer</label>
            <x-text-input  wire:model.live="customer" id="customer" class="block mt-1 w-full" type="text" name="customer"  placeholder="Name Customer..." />
            @error('customer') <span class="text-red-500 text-xs">{{$message}}</span> @enderror



        @if($this->customers->isNotEmpty())
                <div class="list-decimal list-inside">
                    @foreach($this->customers as $customer)
                        @if($customer->name == $this->customer)
                            <div wire:click="selectCustomer('{{ $customer->name }}')" class="cursor-pointer bg-amber-500 p-2 border-b border-gray-200 hover:bg-gray-500 dark:border-gray-700">
                                {{ $customer->name }}
                            </div>
                        @else
                            <div wire:click.live="selectCustomer('{{ $customer->name }}')" class="cursor-pointer p-2 border-b border-gray-200 hover:bg-gray-500 dark:border-gray-700">
                                {{ $customer->name }}
                            </div>
                        @endif

                    @endforeach
                </div>
            @elseif($this->customers->isEmpty())
                <div class="text-center p-4">
                    <p class="text-gray-600 dark:text-gray-400">No customers found.</p>
                    <a wire:click="creatCustomer" class="text-blue-600 dark:text-blue-400 hover:underline">Create new customer</a>
                </div>
            @endif
        </div>

        <div class="mb-4">
            <label class="block  text-sm font-bold mb-2" for="barber">Barbe</label>
            <select id="barber" wire:model.live="barber" class="block capitalize mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                @foreach($barbers as $barber)
                    <option value="{{$barber->id}}">{{$barber->name}}</option>
                @endforeach
            </select>
            @error('name') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
        </div>

        <div class="mb-4 flex flex-row w-full gap-3" >
            <div class="wrapper w-full">
                <label class="block  text-sm font-bold mb-2" for="price">Price</label>
                <x-text-input wire:model="price" id="price" class="block mt-1 " type="number" name="price"  placeholder="Price..." />
                @error('price') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
            </div>

            <div class="wrapper w-full">
                <label class="block  text-sm font-bold mb-2" for="barber">Type</label>
                <select id="barber" wire:model.live="type" class="block capitalize mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    @foreach(['cash' , 'qlik'] as $type)
                        <option value="{{$type}}">{{$type}}</option>
                    @endforeach
                </select>
                @error('name') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
            </div>
        </div>

        <div class="block mt-8">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" wire:change.live="toggleDetails" wire:model.live="check" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400"> more </span>
            </label>
        </div>
    </div>

    @if($show_details)
        <div class="mt-8 mb-4">
            <div class="grid gap-3 grid-cols-3">
                <div class="mb-4">
                    <label class="block  text-sm font-bold mb-2" for="name">Product Name</label>
                    <x-text-input wire:model.live="customer" id="name" class="block mt-1 w-full" type="text" name="name"  placeholder="Name Customer..." />
                    @error('name') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block  text-sm font-bold mb-2" for="name">Note</label>
                    <x-text-input wire:model.live="customer" id="name" class="block mt-1 w-full" type="text" name="name"  placeholder="Name Customer..." />
                    @error('name') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                </div>


                <div class="mb-4">
                    <label class="block  text-sm font-bold mb-2" for="name">Product Price</label>
                    <x-text-input wire:model.live="customer" id="name" class="block mt-1 w-full" type="text" name="name"  placeholder="Name Customer..." />
                    @error('name') <span class="text-red-500 text-xs">{{$message}}</span> @enderror
                </div>
            </div>
        </div>
    @endif



    <div class="flex flex-col w-full">
        <button wire:click="submit" class="uppercase border-2 hover:bg-orange-500 transition text-white font-bold py-2 px-4 rounded">
            Add
        </button>
    </div>




</div>
