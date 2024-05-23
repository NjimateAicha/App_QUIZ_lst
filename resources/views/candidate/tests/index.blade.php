@extends('admin.dashboard')

@section('dashboard')
    <div class="container m-4" style="width: 930px">

       
        @if($message = Session::get('failed'))
            <div class="alert alert-danger fade show" role="alert">
                <div class="d-flex justify-content-between align-items-center">
                    <span><strong>Failed:</strong> You Don't have access for this page!</span>
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <div class="row">
            @forelse ($categories as $category)
                {{-- @if (Auth::user()->is_validated == true) --}}
                <a href="{{ route('tests.ready', $category->id) }}" class="col-md-3">
                    <div  class="box card     ">
                        <h1 class="category_name text-center ">{{ $category->category_name }}</h1>
                        <div class="desc mx-4 ">
                            {{ $category->description }}
                        </div>
                    </div>
                </a>
                {{-- @else
                    <span class="bg-danger p-2 mt-3 text-light">
                        You are not approved yet !
                    </span>
                @endif --}}
            @empty
                <span class="text-danger fs-2 bg-danger text-white p-2">No Category Available !</span>
            @endforelse
        </div>
    </div>
@endsection
