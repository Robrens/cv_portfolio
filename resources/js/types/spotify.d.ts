export type SpotifyEmbedOptions = {
  url: string;
  externalUrl: string;
  height?: number;
};

export type SpotifyEmbedController = {
  loadEntity: (spotifyUriOrUrl: string, preferVideo?: boolean, startAt?: number) => void;
};

export type SpotifyIframeApi = {
  createController: (
    element: HTMLElement,
    options: {
      url: string;
      width?: string | number;
      height?: string | number;
    },
    callback: (controller: SpotifyEmbedController) => void,
  ) => void;
};

export type SpotifyEmbedState = {
  url: string;
  externalUrl: string;
  height: number;
  consentGiven: boolean;
  ready: boolean;
  loading: boolean;
  error: string;
  controller: SpotifyEmbedController | null;
  load(): Promise<void>;
};

export type SpotifyEmbedThis = SpotifyEmbedState & {
  $refs: {
    embed?: HTMLElement;
  };
  $nextTick: (callback?: () => void) => Promise<void>;
};

declare global {
  interface Window {
    onSpotifyIframeApiReady?: (api: SpotifyIframeApi) => void;
    SpotifyIframeApi?: SpotifyIframeApi;
  }
}
