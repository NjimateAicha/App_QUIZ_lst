

@extends('layouts.app')

@section('content')
    
    <form id="showResultForm" action="{{ route('result.showResult', ['userId' => Auth::id()]) }}" method="POST" class="test-form">
        @csrf
        <div class="score-container">
            <p class="score-description">Félicitations pour votre performance!</p>
            
            <h1 class="score-title">Score: {{ $score }}</h1>
          
        </div>
       


    </form>
    
@endsection