@extends('admin.dashboard')

@section('dashboard')
    <div class="container mt-3" style="width: 930px">
        {{-- <h1 class="text-dark">Dashboard</h1>
        <p class="text-secondary">
            <span class="my-2">
                <i class="fa-solid fa-house"></i> / Dashboard / <span class="text-primary">Create</span>
            </span>
        </p> --}}
        @if ($message = Session::get('success'))
            <div class="alert alert-success fade show" role="alert">
                <div class="d-flex justify-content-between align-items-center">
                    <span><strong>Success :</strong> {{ $message }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="nn1 ">Add Category Page</h2>
                    <a href="{{ route('categories.index') }}" class="btn btn-danger"><i class="fa-solid fa-arrow-left"></i>&nbsp; Back</a>
                </div>
                <hr>
                <div class="card-body m-auto w-100">
                    <form action="{{ route('categories.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="fs-4" for="category_name">Category Name <span class="text-danger">*</span></label>
                            <input type="text" value="{{ old('category_name') }}" class="form-control @error('category_name') border-danger @enderror" name="category_name" id="category_name" placeholder="enter category name">
                            @error('category_name')
                                <small class="fs-5 mt-1 text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12 mt-2">
                            <label class="fs-4" for="description">Category Description <span class="text-danger">*</span></label>
                            <textarea name="description"id="description" class="form-control @error('description') border-danger @enderror" cols="15" rows="3">
                                {{ old('description') }}
                            </textarea>
                            @error('description')
                                <small class="fs-5 text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="form-group col-6 mt-2">
                                <label class="fs-4" for="nb_question">number of question show<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nb_question') border-danger @enderror" name="nb_question" id="nb_question" placeholder="enter number of question">
                                @error('nb_question')
                                    <small class="fs-5 mt-1 text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-6 mt-2">
                                <label class="fs-4" for="timer">Time Counter for each category<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('timer') border-danger @enderror" name="timer" id="timer" placeholder="enter the time coounter">
                                @error('timer')
                                    <small class="fs-5 mt-1 text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-3 w-100"><i class="fa-solid fa-plus"></i>&nbsp; Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
