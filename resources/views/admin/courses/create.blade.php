@extends('admin.layouts.app')

@section('title', 'Cadastrar curso')

@section('content')
    <h1 class="text-3xl text-black pb-6">
        Adicionar novo curso
    </h1>
    <div class="flex flex-wrap">
        <div class="w-full my-6 pr-0 lg:pr-2">
            <div class="leading-loose mt-2">
                <form class="p-10 bg-white rounded shadow-xl" action="{{route('courses.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('admin.includes.alerts')
                    @include('admin.courses._partials.form')
                </form>
            </div>
        </div>
    </div>
@endsection

