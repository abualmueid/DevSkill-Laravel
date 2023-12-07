@extends('layouts.app');

@section('title')
    Learning Layout Component in Laravel
@endsection

@section('content')
    <h1>This is my body content</h1>

    @include('components.custom.button');
@endsection
