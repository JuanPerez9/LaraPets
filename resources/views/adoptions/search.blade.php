@forelse ($adopts as $adopt)
    <div class="avatar-group mt-2 -space-x-6">
        <div class="avatar">
            <div class="w-36">
                <img src="{{ asset('images/' . $adopt->user->photo) }}" />
            </div>
        </div>
        <div class="avatar">
            <div class="w-36">
                <img src="{{ asset('images/' . $adopt->pet->image) }}" />
            </div>
        </div>
    </div>
    <h4 class="text-white text-center">
        <span class="underline font-bold">{{ $adopt->pet->name }}</span>
        was adopted by
        <span class="underline font-bold">{{ $adopt->user->fullname }}</span>
        <span class="text-[#fff9] text-sm ml-1">{{ $adopt->created_at->diffForHumans() }}</span>
    </h4>
    <a href="{{ url('adoptions/' . $adopt->id) }}" class="btn btn-outline text-white hover:bg-[#fff6] hover:text-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="currentColor" viewBox="0 0 256 256">
            <path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path>
        </svg>
        Show more
    </a>
    <span class="border-b border-dashed mt-2 border-[#fff6] w-full max-w-lg"></span>
@empty
    <p class="text-white text-2xl py-20">No results found...</p>
@endforelse
