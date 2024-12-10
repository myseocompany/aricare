<x-app-layout>
    <table class="bg-white border border-gray-200 rounded-lg w-full">
        <thead>
            <tr>
                <th class="px-6 py-3 text-left border-b">#</th>
                <th class="px-6 py-3 text-left border-b">Nombre</th>
                <th class="px-6 py-3 text-left border-b">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teams as $team)
            <tr>
                <td class="px-6 py-3 border-b">{{ $team->id }}</td>
                <td class="px-6 py-3 border-b">{{ $team->name }}</td>
                <td class="px-6 py-3 border-b">
                    <a href="{{ route('teams.show', $team->id) }}" class="text-blue-500 hover:text-blue-700">Ver</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>