@extends('layouts.app')

@section('content')
    <div class="container my-3">
        <div class="card p-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>{{ $categories->category_name }}</h2>
                <h3 class="text-dark">Question <span class="text-success"><span id="index"></span>/{{ $categories->nb_question }}</span></h3>
                <span class="timer_span d-flex justify-content-center align-items-center"><i class="fa-regular fa-clock fa-bounce"></i>&nbsp; <div class="fs-4" id="timer" data-time-limit="{{ $categories->timer }}"></div>&nbsp;seconds</span>
            </div>
            <hr class="m-0">
            <div class="card-body mt-3">
                <form action="{{ route('result.store') }}" method="POST" class="test-form">
                    @csrf
                    {{-- <input type="hidden" name="page" value="{{ $questions->currentPage() }}"> --}}
                    @foreach ($questions as $question)
                    @if ($question->category->category_name == $categories->category_name)
                        <div class="form-section">
                            <h2 class="text-center text-dark fw-bold">{{ $question->question_name }}</h2>
                            {{-- <input type="hidden" name="start_time" value="{{ time() }}"> --}}
                            @foreach ($question->options as $option)
                                <input type="hidden" value="{{ $question->id }}" name="questionId[{{ $question->id }}]" id="">
                
                                <div class="row d-flex justify-content-center align-items-center mt-3">
                                    <div class="form-check inpOption col-lg-5 p-3 rounded m-3 fs-5">
                                        <input type="{{ $option->option_type == 'multipleOptions' ? 'checkbox' : 'radio' }}" class="form-check-input mx-1 radioOrCheckbox" name="[]" value="{{ $option->option_1 }}" id="option-{{ $option->id }}">
                                        <label for="{{ $option->option_type == 'singleOptions' ? 'answers' : '' }}" class="px-2">{{ $option->option_1 }}</label>
                                    </div>
                                    <div class="form-check inpOption col-lg-5 p-3 rounded m-3 fs-5">
                                        <input type="{{ $option->option_type == 'multipleOptions' ? 'checkbox' : 'radio' }}" class="form-check-input mx-1 radioOrCheckbox" name="[]" value="{{ $option->option_2 }}" id="option-{{ $option->id }}">
                                        <label for="{{ $option->option_type == 'singleOptions' ? 'answers' : '' }}" class="px-2">{{ $option->option_2 }}</label>
                                    </div>
                                    @if ($option->option_3 != "" || $option->option_4 != "")
                                        <div class="form-check inpOption col-lg-5 p-3 rounded m-3 fs-5">
                                            <input type="{{ $option->option_type == 'multipleOptions' ? 'checkbox' : 'radio' }}" class="form-check-input mx-1 radioOrCheckbox" name="[]" value="{{ $option->option_3 }}" id="option-{{ $option->id }}">
                                            <label for="" class="px-2">{{ $option->option_3 }}</label>
                                        </div>
                                        <div class="form-check inpOption col-lg-5 p-3 rounded m-3 fs-5">
                                            <input type="{{ $option->option_type == 'multipleOptions' ? 'checkbox' : 'radio' }}" class="form-check-input mx-1 radioOrCheckbox" name="[]" value="{{ $option->option_4 }}" id="option-{{ $option->id }}">
                                            <label for="" class="px-2">{{ $option->option_4 }}</label>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endforeach
                <div class="form-navigation mt-5 d-flex justify-content-between align-items-center" >
                    <button type="button" class="next btn btn-info text-light" id="next_question">Next &nbsp;<i class="fa-solid fa-chevron-right"></i></button>
                    <button type="submit" class="submit btn btn-success" id="submit_btn"><i class="fa-solid fa-check-to-slot"></i>&nbsp; Submit</button>
                    <a href="#" class="exit btn btn-danger text-light" id="exit_test">Exit Test &nbsp;<i class="fa-solid fa-close"></i></a>
                   
            </div>
                </form>
            </div>
        </div>
    </div>

@endsection
