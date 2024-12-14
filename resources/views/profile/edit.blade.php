@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Profile') }}
                    </h2>
                </div>

                <div class="card-body">
                    <!-- Update Profile Information Form -->
                    <div class="mb-4">
                        @include('profile.partials.update-profile-information-form')
                    </div>

                    <!-- Update Password Form -->
                    <div class="mb-4">
                        @include('profile.partials.update-password-form')
                    </div>

                    <!-- Delete User Form -->
                    <div>
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
