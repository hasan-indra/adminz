@extends('layouts.error')

@section('title', __('Forbidden'))
@section('code', '403')
@section('type', 'warning')
@section('message', __('You can access this page'))
