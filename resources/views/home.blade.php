<x-app-layout>
    <strong>Home</strong>
    <nav>
        <a href="{{ route('about')}}">About</a>
        |
        <a href="{{ route('contact')}}">Contact</a>
    </nav>
    <section>
        <a href="{{ route('activities.index')}}">Actividades</a>
        |
        <a href="{{ route('rooms.index')}}">Rooms</a>
    </section>
</x-app-layout>