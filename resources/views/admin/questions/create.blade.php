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
                    <h2 class="nn1 ">Add Question Page</h2>
                    <a href="{{ route('questions.index') }}" class="btn btn-danger"><i class="fa-solid fa-arrow-left"></i>&nbsp; Back</a>
                </div>
                <hr>
                <div class="card-body m-auto w-100">
                    <form action="{{ route('questions.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label class="fs-4" for="question_name">Question Name <span class="text-danger">*</span></label>
                                <input type="text" value="{{ old('question_name') }}" class="form-control @error('question_name') border-danger @enderror" name="question_name" id="question_name" placeholder="enter question name">
                                @error('question_name')
                                    <small class="fs-5 mt-1 text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="fs-4" for="category_id">Question category <span class="text-danger">*</span></label>
                                <select class="form-select @error('category_id') border-danger @enderror" name="category_id" id="category_id">
                                    <option selected>Choose a Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <small class="fs-5 text-danger">{{ $message }}</small>
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
