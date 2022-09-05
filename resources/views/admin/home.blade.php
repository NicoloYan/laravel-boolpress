@extends('layouts.dashboard')

@section('content')
    <div>Benvenuto {{ $user->name }}</div>
    <h1>Ciao sono la dash privata</h1>
@endsection