@extends('layouts.master')

@section('title','')




@section('name','')

@section('content')

@foreach($information->bills as $bill)


{{$bill->email}}


@endforeach


@endsection