{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>


</head>
<body>

    <section class="gradient-form h-full bg-neutral-200 dark:bg-neutral-700">
        <div class="container h-8/12 p-10">
          <div
            class="g-6 flex  flex-wrap items-center justify-center text-neutral-800 dark:text-neutral-200">
            <div class="w-11/12 justify-center h-50">
              <div
                class="block rounded-lg bg-white shadow-lg dark:bg-neutral-800">
                <div class="g-0 lg:flex lg:flex-wrap">
                  <!-- Left column container-->
                  <div class="px-4 md:px-0 lg:w-6/12 h-8/12">
                    <div class="md:mx-6 md:p-12">
                      <!--Logo-->
                      <div class="text-center">
                        <img
                          class="mx-auto w-48"
                          src="https://tecdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                          alt="logo" />
                        <h4 class="mb-12 mt-1 pb-1 text-xl text-danger">
                          ridwnanullah and sidiq
                        </h4>
                      </div>
      
                      <form method="POST" action="{{ route('register') }}">
                        @csrf
                           <!--Username input-->
                           <div class="relative mb-4" data-te-input-wrapper-init>
                            <label for="">Username</label>
                          <input
                          type="text" name="name" autofocus
                            class="peer block min-h-[auto] w-full border-1 border-primary px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            id="exampleFormControlInput1"
                            placeholder="email" />
                            @error('name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                         
                        </div>
                        <!--Username input-->
                        <div class="relative mb-4" data-te-input-wrapper-init>
                            <label for="">Email</label>
                          <input
                          type="email" name="email" :value="old('email')" autofocus
                            class="peer block min-h-[auto] w-full rounded border-1 border-primary ent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            id="exampleFormControlInput1"
                            placeholder="email" />
                            @error('email')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                         
                        </div>
      
                        <!--Password input-->
                        <div class="relative mb-4" data-te-input-wrapper-init>
                            <label for="">Password</label>
                          <input
                         
                            type="password"
                            name="password"
                             autocomplete="current-password"
                            class="peer block min-h-[auto] w-full rounded border-1 border-primary px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            id="password"
                            placeholder="Password" />
                            @error('password')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                         
                        </div>
                           <!--Password input-->
                           <div class="relative mb-4" data-te-input-wrapper-init>
                            <label for="">Password Confirmation</label>
                          <input
                         
                            type="password"
                            name="password_confirmation"
                             autocomplete="current-password"
                            class="peer block min-h-[auto] w-full rounded border-1 border-primary px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            id="password"
                            placeholder="Password" />
                            @error('password_confirmation')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                         
                        </div>
                      
      
                        <!--Submit button-->
                        <div class="mb-12 pb-1 pt-1 text-center">
                          <button
                            class="mb-3 inline-block w-full rounded px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_rgba(0,0,0,0.2)] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)]"
                            type="submit"
                            data-te-ripple-init
                            data-te-ripple-color="light"
                            style="
                              background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
                            ">
                            Create Account
                          </button>
      
                      
                        </div>
      
                        <!--Register button-->
                        <div class="flex items-center justify-between pb-6">
                          <p class="mb-0 mr-2">{{ __('Already registered?') }}</p>
                          <a
                             href="{{route("login")}}" 
                            class="inline-block rounded border-2 border-danger px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-danger transition duration-150 ease-in-out hover:border-danger-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-danger-600 focus:border-danger-600 focus:text-danger-600 focus:outline-none focus:ring-0 active:border-danger-700 active:text-danger-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                            data-te-ripple-init
                            data-te-ripple-color="light">
                            Login
                          </a>
                        </div>
                      </form>
                    </div>
                  </div>
      
                  <!-- Right column container with background and description-->
                  <div
                    class="flex items-center rounded-b-lg lg:w-6/12 lg:rounded-r-lg lg:rounded-bl-none"
                    style="background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593)">
                    <div class="px-4 py-6 text-white md:mx-6 md:p-12">
                      <h4 class="mb-6 text-xl font-semibold">
                        We are more than just a company
                      </h4>
                      <p class="text-sm">
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis
                        nostrud exercitation ullamco laboris nisi ut aliquip ex
                        ea commodo consequat.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    
</body>
</html>
