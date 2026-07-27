import '../scss/app.scss';
import spotifyEmbed from './components/spotifyEmbed';
import experienceModal from './components/experienceModal';

import Alpine from 'alpinejs';

Alpine.data('experienceModal', experienceModal);
Alpine.data('spotifyEmbed', spotifyEmbed);

window.Alpine = Alpine;

Alpine.start();
