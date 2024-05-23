@extends('admin.dashboard')

@section('dashboard')
    <div class="container mt-3" style="width: 930px">
       
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
                    <h2 class="nn1 ">Add Options Page</h2>
                    <a href="{{ route('options.index') }}" class="btn btn-danger"><i class="fa-solid fa-arrow-left"></i>&nbsp; Back</a>
                </div>
                <hr>
                <div class="card-body">
                    <form action="{{ route('options.store') }}" method="POST">
                        @csrf
                        <div class="row">

                            <div class="form-group mb-2 col-lg-6">
                                <label class="fs-4" for="question_id">options Question <span class="text-danger">*</span></label>
                                <select class="form-select @error('question_id') border-danger @enderror" name="question_id" id="question_id">
                                    <option selected>Choose a Question</option>
                                    @foreach ($questions as $question)
                                        <option value="{{ $question->id }}">{{ $question->question_name }}</option>
                                    @endforeach
                                </select>
                                @error('question_id')
                                    <small class="fs-5 text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group mb-2 col-lg-6">
                                <label class="fs-4" for="option_type">options Type <span class="text-danger">*</span></label>
                                <select class="form-select @error('option_type') border-danger @enderror" name="option_type" id="option_type">
                                    <option selected>Choose a type</option>
                                    <option value="multipleOptions">Multiple Options</option>
                                    <option value="singleOption">Single Option</option>
                                </select>
                                @error('option_type')
                                    <small class="fs-5 text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group mb-2 col-lg-6">
                                <label class="fs-4" for="option_1">option 1 <span class="text-danger">*</span></label>
                                <input type="text" value="{{ old('option_1') }}" class="form-control @error('option_1') border-danger @enderror" name="option_1" id="option_1" placeholder="enter option 1">
                                @error('option_1')
                                    <small class="fs-5 mt-1 text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-2 col-lg-6">
                                <label class="fs-4" for="option_2">option 2 <span class="text-danger">*</span></label>
                                <input type="text" value="{{ old('option_2') }}" class="form-control @error('option_2') border-danger @enderror" name="option_2" id="option_2" placeholder="enter option 2">
                                @error('option_3')
                                    <small class="fs-5 mt-1 text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-2 col-lg-6">
                                <label class="fs-4" for="option_3">option 3</label>
                                <input type="text" value="{{ old('option_3') }}" class="form-control @error('option_3') border-danger @enderror" name="option_3" id="option_3" placeholder="enter option 3">
                                @error('option_3')
                                    <small class="fs-5 mt-1 text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-2 col-lg-6">
                                <label class="fs-4" for="option_4">option 4</label>
                                <input type="text" value="{{ old('option_4') }}" class="form-control @error('option_4') border-danger @enderror" name="option_4" id="option_4" placeholder="enter option 4">
                                @error('option_4')
                                    <small class="fs-5 mt-1 text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                       </div>

                       {{-- <div class="form-group mb-2 col-lg-12">
                            <label class="fs-4" for="correct_answer">Correct Answer <span class="text-danger">*</span></label>
                            <select class="form-select @error('correct_answer') border-danger @enderror" name="correct_answer" id="correct_answer">
                                <option selected>Choose a the correct answer</option>
                                <option value="{{ $option_1 }}">{{ $option_1 }}</option>
                                <option value="{{ $option_2 }}">{{ $option_2 }}</option>
                                <option value="{{ $option_3 }}">{{ $option_3 }}</option>
                                <option value="{{ $option_4 }}">{{ $option_4 }}</option>
                            </select>
                            @error('correct_answer')
                                <small class="fs-5 text-danger">{{ $message }}</small>
                            @enderror
                        </div> --}}

                        <div class="form-group mb-2 col-lg-12">
                            <label class="fs-4" for="correct_answer">Correct Answer<span class="text-danger">*</span></label>
                            <input type="text" value="{{ old('correct_answer') }}" class="form-control @error('correct_answer') border-danger @enderror" name="correct_answer" id="correct_answer" placeholder="enter the correct answer">
                            @error('correct_answer')
                                <small class="fs-5 mt-1 text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success mt-2 w-100"><i class="fa-solid fa-plus"></i>&nbsp; Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
