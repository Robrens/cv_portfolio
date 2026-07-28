<div class="legal-page">
  <header class="legal-page__header">
    <div class="site-container">
      <p class="subtitle text-brand-accent uppercase font-semibold">Informations légales</p>

      <h1 class="section-title mt-4 text-heading">Mentions légales</h1>

      <p class="legal-page__intro">
        Informations relatives à l’édition et à l’hébergement de ce site.
      </p>
    </div>
  </header>

  <div class="site-container">
    <div class="legal-page__content">
      <section class="legal-page__section" aria-labelledby="legal-publisher">
        <h2 id="legal-publisher">Éditeur du site</h2>

        <dl class="legal-page__details">
          <div>
            <dt>Éditeur</dt>
            <dd>{{ config('legal.publisher.name') }}</dd>
          </div>

          <div>
            <dt>Statut</dt>
            <dd>Personne physique – éditeur non professionnel</dd>
          </div>

          <div>
            <dt>Adresse électronique</dt>
            <dd>
              <a href="mailto:{{ config('legal.publisher.email') }}">
                {{ config('legal.publisher.email') }}
              </a>
            </dd>
          </div>
        </dl>

        <p>
          Ce site est un portfolio personnel destiné à présenter le parcours, les compétences et les
          réalisations professionnelles de son éditeur.
        </p>
      </section>

      <section class="legal-page__section" aria-labelledby="legal-publication">
        <h2 id="legal-publication">Direction de la publication</h2>

        <p>Le directeur de la publication est {{ config('legal.publisher.name') }}.</p>
      </section>

      <section class="legal-page__section" aria-labelledby="legal-host">
        <h2 id="legal-host">Hébergement</h2>

        @if (config('legal.host.name'))
        <p>Ce site est hébergé par :</p>

        <address class="legal-page__address">
          <strong>{{ config('legal.host.name') }}</strong>

          @if (config('legal.host.address'))
          <br />
          {{ config('legal.host.address') }} @endif @if (config('legal.host.phone'))
          <br />
          Téléphone :
          <a href="tel:{{ config('legal.host.phone') }}"> {{ config('legal.host.phone') }} </a>
          @endif @if (config('legal.host.website'))
          <br />
          Site internet :
          <a href="{{ config('legal.host.website') }}" target="_blank" rel="noopener noreferrer">
            {{ config('legal.host.website') }}
          </a>
          @endif
        </address>
        @else
        <p>
          Les coordonnées de l’hébergeur seront renseignées avant la mise en production du site.
        </p>
        @endif
      </section>

      <section class="legal-page__section" aria-labelledby="legal-intellectual-property">
        <h2 id="legal-intellectual-property">Propriété intellectuelle</h2>

        <p>
          Sauf indication contraire, les textes, développements, éléments graphiques et autres
          contenus originaux présents sur ce site sont la propriété de {{
          config('legal.publisher.name') }}.
        </p>

        <p>
          Toute reproduction, représentation, adaptation ou réutilisation totale ou partielle de ces
          contenus sans autorisation préalable est interdite, en dehors des utilisations autorisées
          par la loi.
        </p>

        <p>
          Les marques, logos, noms de produits, technologies et services mentionnés sur ce site
          restent la propriété de leurs titulaires respectifs.
        </p>
      </section>

      <section class="legal-page__section" aria-labelledby="legal-links">
        <h2 id="legal-links">Liens externes</h2>

        <p>
          Ce site peut contenir des liens vers des sites ou services externes. L’éditeur ne contrôle
          pas leur contenu, leur disponibilité ni leurs pratiques en matière de protection des
          données.
        </p>
      </section>

      <section class="legal-page__section" aria-labelledby="legal-liability">
        <h2 id="legal-liability">Responsabilité</h2>

        <p>
          Les informations présentes sur ce site sont fournies à titre informatif. L’éditeur
          s’efforce de les maintenir exactes et à jour, sans pouvoir garantir en permanence leur
          exhaustivité.
        </p>

        <p>
          L’utilisateur reste responsable de l’usage qu’il fait des informations et des liens
          proposés sur le site.
        </p>
      </section>

      <section class="legal-page__section" aria-labelledby="legal-data">
        <h2 id="legal-data">Données personnelles</h2>

        <p>
          Les traitements susceptibles d’être réalisés lors de la consultation du site sont décrits
          dans la
          <a href="{{ route('legal.privacy') }}"> politique de confidentialité </a>.
        </p>
      </section>

      <section class="legal-page__section" aria-labelledby="legal-contact">
        <h2 id="legal-contact">Contact</h2>

        <p>
          Pour toute question concernant le site ou son contenu, vous pouvez contacter l’éditeur à
          l’adresse suivante :
        </p>

        <p>
          <a href="mailto:{{ config('legal.publisher.email') }}">
            {{ config('legal.publisher.email') }}
          </a>
        </p>
      </section>

      <p class="legal-page__updated-at">
        Dernière mise à jour :
        <time datetime="2026-07-27">27 juillet 2026</time>
      </p>
    </div>
  </div>
</div>
