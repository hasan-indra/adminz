@extends('layouts.error')

@section('title', __('Server Error'))
@section('code', '500')
@section('type', 'danger')
@section('message', __('Internal Server Error'))
