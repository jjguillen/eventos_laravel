@extends('admin.layout')

@section('main')

    <div class="container px-4 pt-24 mx-auto md:pt-32 lg:px-0 dark:bg-gray-900">

        <div class="mb-4">
            <x-migas texto="Eventos" />
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Eventos</h1>
        </div>

        <x-form ruta="{{ route('eventos.store') }}" nombre="Nuevo Evento">
            <x-form.input tipo="text" nombre="nombre" label="Nombre" />
            <x-form.input tipo="text" nombre="descripcion" label="Descripción" />
            <x-form.input tipo="text" nombre="ciudad" label="Ciudad" />
            <x-form.input tipo="text" nombre="direccion" label="Dirección" />
            <x-form.input tipo="date" nombre="fecha" label="Fecha" />
            <x-form.input tipo="time" nombre="hora" label="Hora" />
            <x-form.input tipo="file" nombre="url_imagen" label="Imagen" />
            <x-form.input tipo="number" nombre="aforo_maximo" label="Aforo máximo" />
            <x-form.button />
        </x-form>

    </div>
@endsection
