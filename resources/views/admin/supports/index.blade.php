@extends('admin.layouts.app')

@section('title', 'Listagem dos suportes')

@section('content')
    <h1 class="text-3xl text-black pb-6">
        Listagem dos suportes
    </h1>

    @include('admin.includes.alerts')

    <div class="w-full mt-12">
        
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> Table Example
        </p>
        <div class="bg-white overflow-auto">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Aluno
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Aula
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($supports as $support)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-10 h-10">
                                        @if (isset($support->user['image']))
                                            <img class="w-full h-full rounded-full" src="{{ url("storage/{$support->user['image']}") }}">
                                        @else
                                            <img class="w-full h-full rounded-full" src="{{ url('/images/user.png') }}">
                                        @endif
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{$support->user['name']}}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{$support->lesson['name']}}
                                </p>
                            </td>
                            
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <a href="">
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                        <span class="relative">Editar</span>
                                    </span>
                                </a>
                            </td>

                        </tr>
                    @empty 
                        <tr>
                           <td colspan="1000">Sem nenhum suporte!</td> 
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>  
@endsection
