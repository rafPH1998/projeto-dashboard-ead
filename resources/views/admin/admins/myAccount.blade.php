@extends('admin.layouts.app')

@section('title', 'Editar minha conta')

@section('content')
    <h1 class="text-3xl text-black pb-6">
        Configurações da minha conta
    </h1>
    <div class="flex flex-wrap">
        <div class="w-full my-6 pr-0 lg:pr-2">
            <div class="leading-loose mt-2">
                <form class="p-10 bg-white rounded shadow-xl" action="{{ route('admin.confiMyAccount') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    @include('admin.includes.alerts')
                    @include('admin.admins._partials.form-config')
                </form>
            </div>
        </div>
    </div>
@endsection
