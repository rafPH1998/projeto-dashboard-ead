
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-2 mb-3" role="alert">
            <strong class="font-bold">Não permitido!</strong>
            <span class="block sm:inline">
                {{ $error }}
            </span>
        </div>
    @endforeach
@endif

@if(Session::has('success'))
    <div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
        <svg class="pl-4 inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <div>
            <span class="font-medium">Sucesso! </span>{{Session::get('success')}}.
        </div>
    </div>
@endif