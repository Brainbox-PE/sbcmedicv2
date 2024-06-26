@extends('layouts.app')
@section('content')
    @component('components.form')
        @slot('title','Sedes')
        @slot('content')
            <form method="POST" action="{{ route('landing.l-locals.update', $model) }}">
                @csrf
                @method('PUT')
                @include('landing.locals.partials.fields',[
                   'back'=> route('landing.l-locals.index')
               ])
            </form>
        @endslot
    @endcomponent
@endsection

