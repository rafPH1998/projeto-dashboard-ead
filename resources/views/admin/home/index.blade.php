@extends('admin.layouts.app')

@section('title', 'Home')

@section('content')
    <h1 class="w-full text-3xl text-black pb-6">Dashboard</h1>

    <div class="grid grid-cols-12 gap-6 mb-6">
        @include('admin.home._partials.statics', [
            'total' => $totalUsers,
            'text' => 'Total de Usuários',
            'icon' => 'fas fa-users',
            'url' => '/admin/users'
        ])
         @include('admin.home._partials.statics', [
            'total' => $totalAdmins,
            'text' => 'Total de Admins',
            'icon' => 'fas fa-robot',
            'url' => '/admin'
        ])
         @include('admin.home._partials.statics', [
            'total' => $totalCourses,
            'text' => 'Total de Cursos',
            'icon' => 'fas fa-video',
            'url' => '/admin/courses'
        ])
         @include('admin.home._partials.statics', [
            'total' => $totalSupports,
            'text' => 'Dúvidas Pendentes',
            'icon' => 'fas fa-headset',
            'url' => '/admin/supports'
        ])
    </div>
    
@endsection

