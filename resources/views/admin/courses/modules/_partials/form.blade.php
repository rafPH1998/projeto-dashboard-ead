@csrf
<div class="">
    <label class="block text-sm text-gray-600" for="name">Nome *</label>
    <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" name="name" type="text" placeholder="Nome" aria-label="Name" name="name" value="{{ $module->name ?? old('name') }}">
</div>
<div class="mt-6">
    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Enviar</button>
    <a href="{{route('courses.index')}}" class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="button">Voltar</a>
</div>