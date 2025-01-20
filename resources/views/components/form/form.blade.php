<div class="w-full max-w-xl p-6 space-y-8 sm:p-8 bg-white rounded-lg shadow dark:bg-gray-800">
    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
        {{ $nombre }}
    </h2>
    @if ($errors->any())
        <div class="alert alert-danger text-red-500"">
            <h4>Errores:</h4>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="mt-8 space-y-6" action="{{ $ruta }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ $slot }}
    </form>
</div>
