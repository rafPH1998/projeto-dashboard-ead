<div class="">
    @if (isset($admin->image))
        <div class="flex-shrink-0 w-40 h-40">
            <img class="w-full h-full rounded-full" src="{{ url("storage/{$admin->image}") }}">
        </div>
    @endif
    <label class="block text-sm text-gray-600 mt-4" for="message">Adicionar Foto</label>
    <input class="w-full px-5  py-2 text-gray-700 bg-gray-200 rounded" type="file" name="image">  
    
</div>
<div class="">
    <label class="block text-sm text-gray-600" for="name">Nome</label>
    <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" placeholder="Nome" aria-label="Name" value="{{ $admin->name ?? old('name') }}">
</div>
<div class="mt-2">
    <label class="block text-sm text-gray-600" for="email">Email</label>
    <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="email" placeholder="E-mail" aria-label="Email" readonly value="{{ $admin->email ?? old('email') }}">
</div>
<div class="mt-2">
    <label class=" block text-sm text-gray-600" for="password">Senha</label>
    <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="password" name="password" type="password" placeholder="Senha" aria-label="password">
</div>
<div class="mt-2">
    <label class="block text-sm text-gray-600" for="password_confirm">Confirmar Senha</label>
    <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="password_confirm" name="password_confirm" type="password" placeholder="Confirmar Senha" aria-label="password">
</div>
<div class="mt-6">
    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Enviar</button>
    <a href="{{route('admin.index')}}" type="button" class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded">Voltar</a>
</div>
