@extends('layouts.app')

@section('content')
    <edit-customers :id="'{!! json_encode($id) !!}'"></edit-customers>
@endsection
