@extends('theme::layouts.master')

@section('content')
    <div class="error-page">
        <h2 class="headline text-red" style="line-height: 0.6; margin-top: 0;"> 500</h2>

        <div class="error-content">
            <h3><i class="fa fa-warning text-red"></i> 500 </h3>
            <p>description</p>
        </div>
        {{-- .error-content--}}
    </div>
@stop