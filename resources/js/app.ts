import '../scss/app.scss';
import spotifyEmbed from './components/spotifyEmbed';


import Alpine from 'alpinejs';

Alpine.data('spotifyEmbed', spotifyEmbed);

window.Alpine = Alpine;

Alpine.start();
