@extends('layouts.app')

@section('title', 'MAIFIP Application')

@section('content')
<link rel="stylesheet" href="/css/landing.css">
@include('application.header', ['hospitals' => $hospitals, 'categories' => $categories, 'relations' => $relations])
@endsection
