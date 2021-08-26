@extends('layouts.error')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('type', 'warning')
@section('message', __('Too Many Requests'))
