<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex justify-between">
                            <div class="form-group">
                                <label for="file">Upload File:</label>
                                <input type="file" name="file" class="form-control" required>
                            </div>
                            <x-primary-button type="submit" class="btn btn-primary">Upload</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>