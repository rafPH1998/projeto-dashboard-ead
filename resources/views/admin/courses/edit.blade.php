@extends('admin.layouts.app')

@section('title', "Editar Curso: {$course->name}")

@section('content')
    <h1 class="text-3xl text-black pb-6">
        Editar Curso: {{$course->name}}
    </h1>
    @include('admin.includes.alerts')
    <div class="flex flex-wrap">
        <div class="w-full my-6 pr-0 lg:pr-2">
            <div class="leading-loose mt-2">
                <form class="p-10 bg-white rounded shadow-xl" action="{{route('courses.update', $course->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    @include('admin.courses._partials.form')
                </form>
            </div>
            
        </div>
    </div>
@endsection
