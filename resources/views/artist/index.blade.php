@extends('layouts.app')

@section('title', 'liste des artistes')

@section('content')
    <h1>liste des {{$ressource}}</h1>
    <table>
        <thead>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($artists as $artist)
                <tr>
                    <td>{{ $artist->firstname }}</td>
                    <td>
                        <a href="{{route('artist.show', $artist->id)}}">{{ $artist->lastname }}</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
