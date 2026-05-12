@extends('layouts.app')
@section('title', 'Larapets: Register')
@section('content')
@include('partials.navbar')
<section class="bg-[#0009]
                    w-96
                    md:w-fit
                    flex
                    flex-col
                    justify-center
                    text-white
                    items-center
                    p-4
                    rounded-sm">
    <h1 class="text-4xl
                  flex
                  gap-2
                  border-b-2
                  pb-2
                  mb-4">

        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#fcfcfc" viewBox="0 0 256 256">
            <path d="M221.35,104.11a8,8,0,0,0-6.57,9.21A88.85,88.85,0,0,1,216,128a87.62,87.62,0,0,1-22.24,58.41,79.66,79.66,0,0,0-36.06-28.75,48,48,0,1,0-59.4,0,79.66,79.66,0,0,0-36.06,28.75A88,88,0,0,1,128,40a88.76,88.76,0,0,1,14.68,1.22,8,8,0,0,0,2.64-15.78,103.92,103.92,0,1,0,85.24,85.24A8,8,0,0,0,221.35,104.11ZM96,120a32,32,0,1,1,32,32A32,32,0,0,1,96,120ZM74.08,197.5a64,64,0,0,1,107.84,0,87.83,87.83,0,0,1-107.84,0ZM237.66,45.66l-32,32a8,8,0,0,1-11.32,0l-16-16a8,8,0,0,1,11.32-11.32L200,60.69l26.34-26.35a8,8,0,0,1,11.32,11.32Z"></path>
        </svg>
        Register
    </h1>
    <form class="flex
                    flex-col
                    md:flex-row
                    gap-4"
        method="POST" action="{{route ('register')}}">
        @csrf
        <div class="w-full md:w-80">
            <label class="label text-white mt-4">Document:</label>
            <input class="input bg-[#0009]
                              outline-1
                              focus:border-white
                              w-full"
                type="text"
                name="document"
                value="{{ old('document') }}"
                placeholder="75000010">
            @error('document')
            <small class="badge badge-error w-full">{{ $message }}</small>
            @enderror


            <label class="label text-white mt-4">FullName:</label>
            <input class="input bg-[#0009]
                              outline-1
                              focus:border-white
                              w-full"
                type="text"
                name="fullname"
                value="{{ old('fullname') }}"
                placeholder="Jeremias Sparrow">
            @error('fullname')
            <small class="badge badge-error w-full">{{ $message }}</small>
            @enderror


            <label class="label text-white mt-4">Gender:</label>
            <select name="gender" class="select bg-[#0009] outline-1 focus:border-white w-full">
                <option value="">Select...</option>
                <option value="Female" @if(old('gender')=='Female' ) selected @endif>Female</option>
                <option value="Male" @if(old('gender')=='Male' ) selected @endif>Male</option>
            </select>
            @error('gender')
            <small class="badge badge-error w-full">{{ $message }}</small>
            @enderror


            <label class="label text-white mt-4">BirthDate:</label>
            <input class="input bg-[#0009]
                              outline-1
                              focus:border-white
                              w-full"
                type="text"
                name="birthdate"
                value="{{ old('birthdate') }}"
                placeholder="1990-12-25">
            @error('birthdate')
            <small class="badge badge-error w-full">{{ $message }}</small>
            @enderror
        </div>
        <div class="w-full md:w-80">
            <label class="label text-white mt-4">Phone:</label>
            <input class="input bg-[#0009]
                              outline-1
                              focus:border-white
                              w-full"
                type="text"
                name="phone"
                value="{{ old('phone') }}"
                placeholder="32076726827">
            @error('phone')
            <small class="badge badge-error w-full">{{ $message }}</small>
            @enderror

            <label class="label text-white mt-4">Email:</label>
            <input class="input bg-[#0009]
                              outline-1
                              focus:border-white
                              w-full"
                type="text"
                name="email"
                value="{{ old('email') }}"
                placeholder="example@mail.com">
            @error('email')
            <small class="badge badge-error w-full">{{ $message }}</small>
            @enderror

            <label class="label text-white mt-4">Password:</label>
            <input class="input bg-[#0009]
                              outline-1
                              focus:border-white
                              w-full"
                type="password"
                name="password"
                value="{{ old('password') }}"
                placeholder="yoursecret">
            @error('password')
            <small class="badge badge-error w-full">{{ $message }}</small>
            @enderror

            <label class="label text-white mt-4">Password Confirmation:</label>
            <input class="input bg-[#0009]
                              outline-1
                              focus:border-white
                              w-full"
                type="password"
                name="password_confirmation"
                value="{{ old('password_confirmation') }}"
                placeholder="confirm">
            <button class="btn btn-outline mt-4 w-full">
                Register
            </button>
        </div>
    </form>
</section>
@endsection
