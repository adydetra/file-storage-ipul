<x-app-layout>
    <section class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <ul>
                    @foreach ($files as $file)
                    <li>
                        {{ $file->name }}
                        <x-nav-link href="{{ route('file.preview', $file->id) }}" target="_blank">Preview</x-nav-link>
                        <form action="{{ route('file.delete', $file->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <x-danger-button type="submit">Delete</x-danger-button>
                        </form>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
</x-app-layout>