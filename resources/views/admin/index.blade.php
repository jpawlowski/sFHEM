@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Administration
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
@stop

{{-- Page content --}}
@section('content')
<section class="content-header">
                <h1>Administration</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('home') }}">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                            Administration
                        </a>
                    </li>
                </ol>
            </section>
            <section class="content"></section>    
@stop

{{-- page level scripts --}}
@section('footer_scripts')
@stop
