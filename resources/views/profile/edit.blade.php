{{-- <x-app-layout>
   
</x-app-layout> --}}


@extends('Backend.Dashboard.Layout.master',['page'=>"profile"])
@section('content')
    <div class="main-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <x-slot name="">
                        <h2 class="">
                            {{ __('Profile') }}
                        </h2>
                    </x-slot>
                
                    <div class="">
                        <div class="">
                            <div class="">
                                <div class="my-2">
                                    @include('profile.partials.update-profile-information-form')
                                </div>
                            </div>
                
                            <div class="">
                                <div class="my-2">
                                    @include('profile.partials.update-password-form')
                                </div>
                            </div>
                
                            <div class="">
                                <div class="my-2">
                                    @include('profile.partials.delete-user-form')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection