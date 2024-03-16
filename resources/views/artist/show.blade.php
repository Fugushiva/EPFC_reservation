@extends('layouts.app')

@section('title', 'Fiche d\'un artiste')

@section('content')
    <h1>{{ $artist->firstname }} - {{ $artist->lastname }}</h1>
    <div><a href="{{ route('artist.edit', $artist->id) }}">Modifier</a></div>
    <nav><a href="{{ route('artist.index') }}"> retour à l'index</a></nav>
@endsection
