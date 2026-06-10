@extends('layouts.app')

@section('title', 'Dashboard Kasir')
@section('header', 'Dashboard Kasir - ' . $branch->name)

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <x-dashboard.welcome-card :branch="$branch" />
    <x-dashboard.branch-info-card :branch="$branch" />
</div>
@endsection