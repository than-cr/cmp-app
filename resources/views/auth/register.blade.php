<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('Nombre')"/>
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div class="mt-4">
            <x-input-label for="lastName" :value="__('Primer Apellido')"/>
            <x-text-input id="lastName" class="block mt-1 w-full" type="text" name="lastName" :value="old('lastName')" required autofocus />
            <x-input-error :messages="$errors->get('lastName')" class="mt-2" />
        </div>

        <!-- Mother Last Name -->
        <div class="mt-4">
            <x-input-label for="motherLastName" :value="__('Segundo Apellido')"/>
            <x-text-input id="motherLastName" class="block mt-1 w-full" type="text" name="motherLastName" :value="old('motherLastName')" required autofocus />
            <x-input-error :messages="$errors->get('motherLastName')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Correo Electrónico')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Birth date -->
        <div class="mt-4">
            <x-input-label for="phoneNumber" :value="__('Teléfono')" />
            <x-text-input id="phoneNumber" class="block mt-1 w-full" type="tel" name="phoneNumber" :value="old('phoneNumber')" required placeholder="88888888" pattern="[0-9]{4}[0-9]{4}" />
            <x-input-error :messages="$errors->get('phoneNumber')" class="mt-2" />
        </div>

        <!-- Birth date -->
        <div class="mt-4">
            <x-input-label for="birthDate" :value="__('Fecha de nacimiento')" />
            <x-text-input id="birthDate" class="block mt-1 w-full" type="date" name="birthDate" :value="old('birthDate')" required />
            <x-input-error :messages="$errors->get('birthDate')" class="mt-2" />
        </div>

        <!-- Province -->
        <div class="mt-4">
            <x-input-label for="province" :value="__('Provincia')" />
            <select id="province" name="province" required class="block mt-1 w-full">
                <option value="">--Seleccionar--</option>
                @foreach($provinces as $province )
                    <option value="{{$province->id}}">{{$province->name}}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('province')" class="mt-2" />
        </div>

        <!-- Canton -->
        <div class="mt-4">
            <x-input-label for="canton" :value="__('Cantón')" />
            <select id="canton" name="canton" required class="block mt-1 w-full">
                <option value="">--Seleccionar--</option>
            </select>
            <x-input-error :messages="$errors->get('canton')" class="mt-2" />
        </div>

        <!-- District -->
        <div class="mt-4">
            <x-input-label for="district" :value="__('Distrito')" />
            <select id="district" name="district" required class="block mt-1 w-full">
                <option value="">--Seleccionar--</option>
            </select>
            <x-input-error :messages="$errors->get('district')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Ya tiene una cuenta?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Registrarse') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
