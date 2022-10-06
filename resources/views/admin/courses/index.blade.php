@extends('admin.layouts.app')

@section('title', 'Cursos')

@section('content')
    <h1 class="text-3xl text-black pb-6">
        Cursos
        <a href="{{route('courses.create')}}" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
            <i class="fas fa-plus"></i>
        </a>
    </h1>

    @include('admin.includes.alerts')

    <div class="w-full mt-12">
        
        @include('admin.includes.form-search', ['routerName' => 'courses.index'])

        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> Table Example
        </p>
        <div class="bg-white overflow-auto">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Nome
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Data de criação do curso
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Disponível
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses->items() as $course)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-10 h-10">
                                        <img class="w-full h-full rounded-full" src="{{ $course->image ? : url('images/user.png') }}">
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{$course->name}}
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{$course->created_at}}
                                </p>
                            </td>

                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{$course->available ? 'Publicado' : 'Não Publicado'}}
                                </p>
                            </td>

                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <a href="{{route('courses.edit', $course->id)}}">
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                        <span class="relative">Editar</span>
                                    </span>
                                </a>

                                <a href="{{route('modules.index', $course->id)}}">
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-blue-900 leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 bg-blue-200 opacity-50 rounded-full"></span>
                                        <span class="relative">Modulos</span>
                                    </span>
                                </a>

                                <form  action="{{ route('courses.destroy', $course->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="mt-2">
                                        <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                            <span aria-hidden class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                            <span class="relative">Deletar curso</span>
                                        </span>
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @empty
                        <tr>
                           <td colspan="1000">Sem nenhum curso!</td> 
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>  

    
    <nav aria-label="Page navigation py-12">
        <ul class="inline-flex -space-x-px mt-10">
            @if ($courses->currentPage() > 1)
                <li>
                    <a href="?page={{ $courses->currentPage() - 1 }}" 
                        class="py-2 px-3 ml-0 leading-tight text-gray-500 bg-white 
                            rounded-l-lg border border-gray-300 hover:bg-gray-100 
                            hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 
                            dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        Anterior
                    </a>
                </li>
            @endif
            <li>
                <a href="#" aria-current="page" 
                    class="py-2 px-3 text-blue-600 bg-blue-50 border 
                    border-gray-300 hover:bg-blue-100 hover:text-blue-700 
                    dark:border-gray-700 dark:bg-gray-700 dark:text-white">
                    {{ $courses->currentPage() }}
                </a>
            </li>
            @if ($courses->currentPage() < $courses->lastPage())
                <li>
                    <a href="?page={{ $courses->currentPage() + 1 }}" 
                        class="py-2 px-3 leading-tight text-gray-500 bg-white
                        rounded-r-lg border border-gray-300 hover:bg-gray-100 
                        hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 
                        dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        Próxima
                    </a>
                </li>
            @endif
        </ul>
    </nav>
@endsection
