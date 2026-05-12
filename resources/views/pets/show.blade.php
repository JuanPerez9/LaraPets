@extends('layouts.app')

@section('title', 'Larapets: Show Pet')

@section('content')
    @include('partials.navbar')
    <h1 class="text-4xl text-white flex gap-2 items-center justify-center pb-4 border-b-2 border-neutral-50 mb-10">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-12" fill="currentColor" viewBox="0 0 256 256">
            <path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path>
        </svg>
        Show Pet
    </h1>
    {{-- Breadcrumbs --}}
    <div class="breadcrumbs text-sm text-white mb-6">
        <ul>
            <li>
                <a href="{{ url('dashboard') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 256 256">
                        <path d="M104,40H56A16,16,0,0,0,40,56v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V56A16,16,0,0,0,104,40Zm0,64H56V56h48v48Zm96-64H152a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V56A16,16,0,0,0,200,40Zm0,64H152V56h48v48Zm-96,32H56a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V152A16,16,0,0,0,104,136Zm0,64H56V152h48v48Zm96-64H152a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V152A16,16,0,0,0,200,136Zm0,64H152V152h48v48Z"></path>
                    </svg>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ url('pets') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 256 256">
                        <path d="M212,80a28,28,0,1,0,28,28A28,28,0,0,0,212,80Zm0,40a12,12,0,1,1,12-12A12,12,0,0,1,212,120ZM72,108a28,28,0,1,0-28,28A28,28,0,0,0,72,108ZM44,120a12,12,0,1,1,12-12A12,12,0,0,1,44,120ZM92,88A28,28,0,1,0,64,60,28,28,0,0,0,92,88Zm0-40A12,12,0,1,1,80,60,12,12,0,0,1,92,48Zm72,40a28,28,0,1,0-28-28A28,28,0,0,0,164,88Zm0-40a12,12,0,1,1-12,12A12,12,0,0,1,164,48Zm23.12,100.86a35.3,35.3,0,0,1-16.87-21.14,44,44,0,0,0-84.5,0A35.25,35.25,0,0,1,69,148.82,40,40,0,0,0,88,224a39.48,39.48,0,0,0,15.52-3.13,64.09,64.09,0,0,1,48.87,0,40,40,0,0,0,34.73-72ZM168,208a24,24,0,0,1-9.45-1.93,80.14,80.14,0,0,0-61.19,0,24,24,0,0,1-20.71-43.26,51.22,51.22,0,0,0,24.46-30.67,28,28,0,0,1,53.78,0,51.27,51.27,0,0,0,24.53,30.71A24,24,0,0,1,168,208Z"></path>
                    </svg>
                    Pets Module
                </a>
            </li>
            <li>
                <span class="inline-flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 256 256">
                        <path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path>
                    </svg>
                    Show Pet
                </span>
            </li>
        </ul>
    </div>

    {{-- Card --}}
    <div class="bg-[#0009] p-10 rounded-sm">
        {{-- Photo --}}
        <div class="avatar flex flex-col gap-1 items-center justify-center cursor-pointer hover:scale-105 transition ease-in">
            <div class="mask mask-squircle w-60">
                <img src="{{ asset('images/' . $pet->image) }}" />
            </div>
        </div>
        {{-- Data --}}
        <div class="flex gap-2 flex-col md:flex-row">
            <ul class="list bg-[#0006] mt-4 text-white rounded-box shadow-md w-64">
                <li class="list-row">
                    <span class="text-[#fff9] font-semibold">Name:</span>
                    <span>{{ $pet->name }}</span>
                </li>
                <li class="list-row">
                    <span class="text-[#fff9] font-semibold">Kind:</span>
                    <span>
                        @if ($pet->kind == 'Dog')
                            <div class="badge badge-outline badge-warning">Dog</div>
                        @elseif ($pet->kind == 'Cat')
                            <div class="badge badge-outline badge-info">Cat</div>
                        @elseif ($pet->kind == 'Pig')
                            <div class="badge badge-outline badge-error">Pig</div>
                        @else
                            <div class="badge badge-outline badge-success">Bird</div>
                        @endif
                    </span>
                </li>
                <li class="list-row">
                    <span class="text-[#fff9] font-semibold">Breed:</span>
                    <span>{{ $pet->breed }}</span>
                </li>
                <li class="list-row">
                    <span class="text-[#fff9] font-semibold">Age:</span>
                    <span>{{ $pet->age }} years old</span>
                </li>
            </ul>
            <ul class="list bg-[#0006] mt-4 text-white rounded-box shadow-md w-64">
                <li class="list-row">
                    <span class="text-[#fff9] font-semibold">Weight:</span>
                    <span>{{ $pet->weight }} kg</span>
                </li>
                <li class="list-row">
                    <span class="text-[#fff9] font-semibold">Location:</span>
                    <span>{{ $pet->location }}</span>
                </li>
                <li class="list-row">
                    <span class="text-[#fff9] font-semibold">Description:</span>
                    <span>{{ $pet->description }}</span>
                </li>
                <li class="list-row">
                    <span class="text-[#fff9] font-semibold">Created At:</span>
                    <span>{{ $pet->created_at->diffForHumans() }}</span>
                </li>
                <li class="list-row">
                    <span class="text-[#fff9] font-semibold">Updated At:</span>
                    <span>{{ $pet->updated_at->diffForHumans() }}</span>
                </li>
            </ul>
        </div>
    </div>
@endsection
