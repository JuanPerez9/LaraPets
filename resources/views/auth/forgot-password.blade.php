
@extends('layouts.app')
@section('title', 'Larapets: Forgot your password')
@section('content')
    <section class="bg-[#0009]
                    w-96
                    flex
                    flex-col
                    justify-center
                    text-white
                    items-center
                    p-4
                    rounded-sm">
        <h1 class="text-3xl
                  flex
                  gap-2
                  border-b-2
                  pb-2
                  mb-4">

            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#c4c4c4" viewBox="0 0 256 256"><path d="M216.57,39.43A80,80,0,0,0,83.91,120.78L28.69,176A15.86,15.86,0,0,0,24,187.31V216a16,16,0,0,0,16,16H72a8,8,0,0,0,8-8V208H96a8,8,0,0,0,8-8V184h16a8,8,0,0,0,5.66-2.34l9.56-9.57A79.73,79.73,0,0,0,160,176h.1A80,80,0,0,0,216.57,39.43ZM224,98.1c-1.09,34.09-29.75,61.86-63.89,61.9H160a63.7,63.7,0,0,1-23.65-4.51,8,8,0,0,0-8.84,1.68L116.69,168H96a8,8,0,0,0-8,8v16H72a8,8,0,0,0-8,8v16H40V187.31l58.83-58.82a8,8,0,0,0,1.68-8.84A63.72,63.72,0,0,1,96,95.92c0-34.14,27.81-62.8,61.9-63.89A64,64,0,0,1,224,98.1ZM192,76a12,12,0,1,1-12-12A12,12,0,0,1,192,76Z"></path></svg>
            Forgot your password?
        </h1>
        <p>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
        <form method="post" action="{{ route('password.email') }}">
            @csrf
            @if (session('status'))
                <span class="badge badge-success w-full my-8">{{session('status') }}</span>
            @endsession
            <label class="label text-white">Email</label>
            <input class="input bg-[#0009] outline-1 focus:border-white w-full"
            type="text"
            name="email"
            value="{{old ('email') }}"
            placeholder="username@mail.com">
        @error('email')
            <small class="badge badge-error w-full">{{ $message }}</small>
            @enderror
        <button class="btn btn-outline">Email Password Reser Link</button>
        </form>
    </section>

@endsection
