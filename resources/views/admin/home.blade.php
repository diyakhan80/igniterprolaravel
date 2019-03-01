@extends('admin.layouts.app_main')
@section('content')
@includeIf('admin.includes.header')
<div class="clearfix">
</div>
<div class="page-container">
		@includeIf('admin.includes.sidebar')
		@includeIf($view)
</div>
@includeIf('admin.includes.footer')
@endsection

