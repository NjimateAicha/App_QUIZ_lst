@extends('admin.dashboard')

@section('dashboard')
    <div class="container mt-3" style="width: 930px">

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>Success :</strong> {{$message}}
            </div>
        @endif
        <div class="row">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="nn1 ">Edit Question Page</h2>
                    <a href="{{ route('questions.index') }}" class="btn btn-danger"><i class="fa-solid fa-arrow-left"></i>&nbsp; Back</a>
                </div>
                <hr>
                <div class="card-body m-auto w-50">
                    <form action="{{ route('questions.update', $questions->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="fs-4" for="question_name">Question Name <span class="text-danger">*</span></label>
                            <input type="text" value="{{ $questions->question_name }}" class="form-control @error('question_name') border-danger @enderror" name="question_name" id="question_name">
                            @error('question_name')
                                <small class="fs-5 mt-1 text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
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
                        <button type="submit" class="btn btn-primary mt-2 w-100"><i class="fa-solid fa-refresh"></i>&nbsp; Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
