

@extends('admin.dashboard')

@section('dashboard') 
    <h1>Score Email</h1>
    <p>Hello  {{ $userName }},</p>
    <p>votre score: {{ $score }}</p>
    <p> votre status : {{ $status }}</p>

    <p>Cordialement 

    
        Swez-maroc</p>


    <!-- ... autres éléments de votre formulaire ... -->
@endsection