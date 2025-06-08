<form id="playlistForm" action="/playlists" method="POST">
    @csrf
    <input name="name" type="text" placeholder="Naam" required>
    <button type="submit">Opslaan</button>
</form>

<script>
    const form = document.getElementById('playlistForm');

    form.addEventListener('submit', function (e) {
        const isLoggedIn = @json(Auth::check());
        
        if (!isLoggedIn) {
            e.preventDefault(); // Stop het echte formulier
            const name = form.querySelector('input[name="name"]').value;

            if (name) {
                sessionStorage.setItem('guest_playlist', JSON.stringify({ name }));
                alert('Je bent niet ingelogd. De playlist is tijdelijk opgeslagen.');
                window.location.href = '/login';
            }
        }
        // Als wel ingelogd? Laat gewoon doorgaan
    });
</script>
