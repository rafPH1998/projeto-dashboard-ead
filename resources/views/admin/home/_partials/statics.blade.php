<div class="col-span-12 sm:col-span-6 xl:col-span-3">
    <div
        class="md:rounded dark:bg-gray-900/70 block bg-white border border-gray-100 dark:border-gray-900 mx-6 md:mx-0 rounded">
        <!---->
        <div class="p-6">
            <div class="justify-between items-center flex">
                <div class="flex shrink-1 grow-9 items-center justify-center">
                    <div>
                        <h3 class="text-lg leading-tight text-gray-500 dark:text-gray-400">
                            {{ $text }}</h3>
                        <h1 class="text-3xl leading-tight font-semibold">
                            <div>{{ $total }}</div>
                        </h1>
                    </div>
                </div>
                <div class="flex shrink-1 grow-9 items-center justify-center"><span
                        class="inline-flex justify-center items-center h-16 text-emerald-500">
                        <a href="{{$url}}">
                            <i class="{{ $icon }} mr-3"></i>
                        </a>
                    </span></div>
            </div>
        </div>
        <!---->
    </div>
</div>