import type {
  SpotifyEmbedController,
  SpotifyEmbedOptions,
  SpotifyEmbedState,
  SpotifyEmbedThis,
} from '../types/spotify';

import { loadSpotifyIframeApi } from '../services/spotifyIframeApiLoader';

export default function spotifyEmbed(options: SpotifyEmbedOptions): SpotifyEmbedState {
  return {
    url: options.url,
    externalUrl: options.externalUrl,
    height: options.height ?? 352,

    consentGiven: false,
    ready: false,
    loading: false,
    error: '',
    controller: null,

    async load(this: SpotifyEmbedThis): Promise<void> {
      if (this.ready || this.loading) {
        return;
      }

      this.loading = true;
      this.error = '';
      this.consentGiven = true;

      try {
        await this.$nextTick();

        const api = await loadSpotifyIframeApi();
        const element = this.$refs.embed;

        if (!element) {
          throw new Error('Spotify embed container not found.');
        }

        api.createController(
          element,
          {
            url: this.url,
            width: '100%',
            height: this.height,
          },
          (controller: SpotifyEmbedController) => {
            this.controller = controller;
            this.ready = true;
            this.loading = false;
          },
        );
      } catch (error) {
        console.error('Spotify embed loading failed:', error);
        this.error = 'La playlist Spotify n’a pas pu être chargée.';
        this.loading = false;
      }
    },
  };
}