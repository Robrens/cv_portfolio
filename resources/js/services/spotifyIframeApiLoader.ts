import type { SpotifyIframeApi } from '../types/spotify';

const SPOTIFY_IFRAME_API_URL = 'https://open.spotify.com/embed/iframe-api/v1';

let spotifyApiPromise: Promise<SpotifyIframeApi> | null = null;

export const loadSpotifyIframeApi = (): Promise<SpotifyIframeApi> => {
  if (window.SpotifyIframeApi) {
    return Promise.resolve(window.SpotifyIframeApi);
  }

  if (spotifyApiPromise !== null) {
    return spotifyApiPromise;
  }

  spotifyApiPromise = new Promise((resolve, reject) => {
    window.onSpotifyIframeApiReady = (api: SpotifyIframeApi) => {
      window.SpotifyIframeApi = api;
      resolve(api);
    };

    const existingScript = document.querySelector<HTMLScriptElement>(
      `script[src="${SPOTIFY_IFRAME_API_URL}"]`,
    );

    if (existingScript) {
      return;
    }

    const script = document.createElement('script');
    script.src = SPOTIFY_IFRAME_API_URL;
    script.async = true;
    script.onerror = () => {
      reject(new Error('Spotify iframe API loading failed.'));
    };

    document.body.appendChild(script);
  });

  return spotifyApiPromise;
};
