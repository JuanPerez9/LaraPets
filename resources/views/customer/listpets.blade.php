@extends('layouts.app')

@section('title', 'Larapets: List Pets')

@section('content')
    @include('partials.navbar')
    <h1 class="mt-6 text-4xl text-white flex gap-2 items-center justify-center pb-4 border-b-2 border-neutral-50 mb-10">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-12" fill="currentColor" viewBox="0 0 256 256">
            <path d="M230.33,141.06a24.34,24.34,0,0,0-18.61-4.77C230.5,117.33,240,98.48,240,80c0-26.47-21.29-48-47.46-48A47.58,47.58,0,0,0,156,48.75,47.58,47.58,0,0,0,119.46,32C93.29,32,72,53.53,72,80c0,11,3.24,21.69,10.06,33a31.87,31.87,0,0,0-14.75,8.4L44.69,144H16A16,16,0,0,0,0,160v40a16,16,0,0,0,16,16H120a7.93,7.93,0,0,0,1.94-.24l64-16a6.94,6.94,0,0,0,1.19-.4L226,182.82l.44-.2a24.6,24.6,0,0,0,3.93-41.56ZM119.46,48A31.15,31.15,0,0,1,148.6,67a8,8,0,0,0,14.8,0,31.15,31.15,0,0,1,29.14-19C209.59,48,224,62.65,224,80c0,19.51-15.79,41.58-45.66,63.9l-11.09,2.55A28,28,0,0,0,140,112H100.68C92.05,100.36,88,90.12,88,80,88,62.65,102.41,48,119.46,48ZM16,160H40v40H16Zm203.43,8.21-38,16.18L119,200H56V155.31l22.63-22.62A15.86,15.86,0,0,1,89.94,128H140a12,12,0,0,1,0,24H112a8,8,0,0,0,0,16h32a8.32,8.32,0,0,0,1.79-.2l67-15.41.31-.08a8.6,8.6,0,0,1,6.3,15.9Z"></path>
        </svg>
        List Pets
    </h1>

    {{-- Options --}}
    <div class="flex flex-col gap-4 justify-center items-center">
        {{-- Search --}}
        <label class="input text-white bg-[#0009] w-58 md:w-112 outline outline-white mb-10">
            <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.3-4.3"></path>
                </g>
            </svg>
            <input type="search" placeholder="Search..." name="qsearch" id="qsearch" />
        </label>
    </div>

    <div class="overflow-x-auto rounded-box border border-base-content/5 bg-black/50">
        <table class="table text-white">
            <thead class="text-white bg-black/60">
                <tr>
                    <th>ID</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th class="hidden md:table-cell">Kind</th>
                    <th class="hidden md:table-cell">Breed</th>
                    <th class="hidden md:table-cell">Age</th>
                    <th class="hidden md:table-cell">Location</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="datalist">
                @foreach ($pets as $pet)
                    <tr class="even:bg-black/60">
                        <td>{{ $pet->id }}</td>
                        <td>
                            <div class="avatar">
                                <div class="mask mask-squircle w-24">
                                    <img src="{{ asset('images/' . $pet->image) }}" />
                                </div>
                            </div>
                        </td>
                        <td>{{ $pet->name }}</td>
                        <td class="hidden md:table-cell">
                            @if ($pet->kind == 'Dog')
                                <span class="badge badge-outline badge-warning">Dog</span>
                            @elseif ($pet->kind == 'Cat')
                                <span class="badge badge-outline badge-info">Cat</span>
                            @elseif ($pet->kind == 'Pig')
                                <span class="badge badge-outline badge-error">Pig</span>
                            @else
                                <span class="badge badge-outline badge-success">Bird</span>
                            @endif
                        </td>
                        <td class="hidden md:table-cell">{{ $pet->breed }}</td>
                        <td class="hidden md:table-cell">{{ $pet->age }} yrs</td>
                        <td class="hidden md:table-cell">{{ $pet->location }}</td>
                        <td class="flex gap-1 justify-center items-center h-20">
                            <a href="{{ url('showpet/'. $pet->id) }}" class="btn btn-outline btn-xs btn-default">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 256 256">
                                    <path d="M230.33,141.06a24.34,24.34,0,0,0-18.61-4.77C230.5,117.33,240,98.48,240,80c0-26.47-21.29-48-47.46-48A47.58,47.58,0,0,0,156,48.75,47.58,47.58,0,0,0,119.46,32C93.29,32,72,53.53,72,80c0,11,3.24,21.69,10.06,33a31.87,31.87,0,0,0-14.75,8.4L44.69,144H16A16,16,0,0,0,0,160v40a16,16,0,0,0,16,16H120a7.93,7.93,0,0,0,1.94-.24l64-16a6.94,6.94,0,0,0,1.19-.4L226,182.82l.44-.2a24.6,24.6,0,0,0,3.93-41.56ZM119.46,48A31.15,31.15,0,0,1,148.6,67a8,8,0,0,0,14.8,0,31.15,31.15,0,0,1,29.14-19C209.59,48,224,62.65,224,80c0,19.51-15.79,41.58-45.66,63.9l-11.09,2.55A28,28,0,0,0,140,112H100.68C92.05,100.36,88,90.12,88,80,88,62.65,102.41,48,119.46,48ZM16,160H40v40H16Zm203.43,8.21-38,16.18L119,200H56V155.31l22.63-22.62A15.86,15.86,0,0,1,89.94,128H140a12,12,0,0,1,0,24H112a8,8,0,0,0,0,16h32a8.32,8.32,0,0,0,1.79-.2l67-15.41.31-.08a8.6,8.6,0,0,1,6.3,15.9Z"></path>
                                </svg>
                            </a>
                            <form class="hidden" method="POST" action="{{ url('pets/' . $pet->id) }}">
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="8">{{ $pets->links('partials.pagination') }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection

@section('js')
<script>
    // IMPORT FILE
    $('.btn-import').click(function(e){
        $('#file-pets').click()
    })
    $('#file-pets').change(function(e){
        $(this).parent().submit()
    })
    // MESSAGES
    // @if (session('message'))
    //     Swal.fire({
    //         position: "top-end",
    //         icon: "success",
    //         title: "{{ session('message') }}",
    //         showConfirmButton: false,
    //         timer: 3500
    //     });
    // @endif

    // SEARCH
    function debounce(func, wait) {
        let timeout
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout)
                func(...args)
            };
            clearTimeout(timeout)
            timeout = setTimeout(later, wait)
        }
    }
    const search = debounce(function(query) {
        $token = $('input[name=_token]').val()
        $.post("search/adoptionpets", {'q': query, '_token': $token},
            function (data) {
                $('.datalist').html(data).hide().fadeIn(1000)
            }
        )
    }, 500)
    $('body').on('input', '#qsearch', function(event) {
        event.preventDefault()
        const query = $(this).val()
        $('.datalist').html(`<tr>
                                <td colspan="8" class="text-center py-18">
                                    <span class="loading loading-spinner loading-xl"></span>
                                </td>
                            </tr>`)
        if(query != '') {
            search(query)
        } else {
            setTimeout(() => {
                window.location.replace('listpets')
            }, 500)
        }
    })
</script>
@endsection
