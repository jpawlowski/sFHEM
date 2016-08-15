@extends('layouts/default')

{{-- Page title --}}
@section('title')
sFHEM
@stop

{{-- page level styles --}}
@section('header_styles')
@stop

{{-- Page content --}}
@section('content')
<section class="content-header">
                <h1>sFHEM</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('home') }}">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                            Home
                        </a>
                    </li>
                </ol>
            </section>
            <section class="content"></section>    
@stop

{{-- page level scripts --}}
@section('footer_scripts')
@stop
