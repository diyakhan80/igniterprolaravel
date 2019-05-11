@extends('layouts.app')
@section('content')
@includeIf('includes.header')

@includeIf($view)
@includeIf('includes.footer')
@endsection