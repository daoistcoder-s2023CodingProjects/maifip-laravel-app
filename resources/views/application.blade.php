@extends('layouts.app')

@section('title', 'MAIFIP Application')

@section('content')
<link rel="stylesheet" href="/css/landing.css">
@include('application.header', [
    'hospitals' => $hospitals,
    'categories' => $categories,
    'relations' => $relations,
    'maritalStatuses' => $maritalStatuses,
    'livingStatus' => $livingStatus,
    'educations' => $educations,
    'mswdMainClass' => $mswdMainClass,
    'mswdSubClass' => $mswdSubClass,
    'marginalizedSector' => $marginalizedSector,
    'mssClass' => $mssClass,
    'timeSelections' => $timeSelections
])
@endsection
