@csrf
<div class="mt-2">
    <label class=" block text-sm text-gray-600" for="message">Foto do curso</label>
    <input class="w-full px-5  py-2 text-gray-700 bg-gray-200 rounded" type="file" name="image">
</div>
<div class="py-2">
    <label class="block text-sm text-gray-600" for="available">
        <input name="available" type="checkbox" aria-label="available" name="available" value="1" @checked($course->available ?? false)>
        Disponível
    </label>
</div>
<div class="">
    <label class="block text-sm text-gray-600" for="name">Nome *</label>
    <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" placeholder="Nome" aria-label="Name" name="name" value="{{ $course->name ?? old('name') }}">
</div>
<div class="mt-2">
    <label class=" block text-sm text-gray-600" for="message">Descrição</label>
    <textarea class="w-full px-5  py-2 text-gray-700 bg-gray-200 rounded" name="description" cols="30" rows="4" placeholder="Descrição">{{ $course->description ?? old('description') }}</textarea>
</div>
<div class="mt-6">
    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Enviar</button>
    <a href="{{route('courses.index')}}" class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="button">Voltar</a>
</div>