
# 🎬 Votre séance vous attend !

Votre réservation est prête ! Préparez le popcorn 🍿

<x-mail::message>
reservation details:

**Film :** {{ $reservation->film->titre }}  
**Date et Heure :** {{ $reservation->seance->debut_seance }}
**Places réservées :** {{ $reservation->nombre_places }}
</x-mail::message>

À très vite dans notre cinéma !


