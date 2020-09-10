@extends('statamic::layout')
@section('title', 'Tracking Code Manager')
@section('content')
    <div>
        <publish-form
                title="Tracking Code Manager Scripts"
                action="{{ cp_route('simonridley.tracking-code-manager.update') }}"
                :blueprint='@json($blueprint)'
                :meta='@json($meta)'
                :values='@json($values)'
        />
    </div>
@stop