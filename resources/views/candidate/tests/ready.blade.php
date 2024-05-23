@extends('layouts.app')

@section('content')
    <div class="container my-5 py-5 d-flex justify-content-center align-items-center">
        <div class="pt-4">
            <h1 class="text-center text-dark">Are You Ready To Start The Test ?</h1>
            <div class="d-flex justify-content-center align-items-center mt-4">
                <a href="{{ route('tests.show', $categories->id) }}" class="btn btn-success mx-2">I'm Ready</a>
                <a href="{{ route('tests.index') }}" class="btn btn-secondary mx-2">Cancel</a>
            </div>
        </div>
    </div>
@endsection

