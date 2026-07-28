<div class="legal-page">
  <header class="legal-page__header">
    <div class="site-container">
      <p class="subtitle text-brand-accent uppercase font-semibold">Vie privée</p>

      <h1 class="section-title mt-4 text-heading">Politique de confidentialité</h1>

      <p class="legal-page__intro">
        Cette page explique quelles données peuvent être traitées lors de votre navigation et
        comment elles sont protégées.
      </p>
    </div>
  </header>

  <div class="site-container">
    <div class="legal-page__content">
      <section class="legal-page__section" aria-labelledby="privacy-principles">
        <h2 id="privacy-principles">Principes appliqués</h2>

        <p>
          Ce site est conçu pour limiter la collecte de données personnelles au strict nécessaire.
        </p>

        <p>
          Il ne réalise aucun profilage publicitaire et ne vend ni ne loue aucune donnée
          personnelle.
        </p>
      </section>

      <section class="legal-page__section" aria-labelledby="privacy-controller">
        <h2 id="privacy-controller">Responsable du traitement</h2>

        <p>Le responsable des traitements réalisés directement par ce site est :</p>

        <dl class="legal-page__details">
          <div>
            <dt>Nom</dt>
            <dd>{{ config('legal.publisher.name') }}</dd>
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
      </section>

      <section class="legal-page__section" aria-labelledby="privacy-navigation">
        <h2 id="privacy-navigation">Consultation du site</h2>

        <p>
          Le site ne demande pas la création d’un compte et ne possède pas de formulaire de collecte
          de données personnelles.
        </p>

        <p>
          Lors de votre navigation, le serveur et l’hébergeur peuvent néanmoins traiter des
          informations techniques nécessaires à la fourniture et à la sécurisation du site,
          notamment :
        </p>

        <ul>
          <li>l’adresse IP utilisée pour accéder au site ;</li>
          <li>la date et l’heure de la requête ;</li>
          <li>la ressource demandée ;</li>
          <li>le type de navigateur ou d’appareil utilisé ;</li>
          <li>les éventuelles erreurs techniques rencontrées.</li>
        </ul>

        <p>
          Ces informations peuvent être enregistrées dans les journaux techniques du serveur. Elles
          sont utilisées uniquement pour assurer le fonctionnement, la sécurité et le diagnostic du
          site.
        </p>

        <p>
          La base juridique de ce traitement est l’intérêt légitime de l’éditeur à maintenir un site
          fonctionnel et sécurisé.
        </p>

        @if (config('legal.server_log_retention_days'))
        <p>
          Les journaux techniques sont conservés pendant une durée maximale de {{
          config('legal.server_log_retention_days') }} jours, sauf nécessité particulière liée à un
          incident de sécurité.
        </p>
        @else
        <p>
          La durée de conservation des journaux techniques sera précisée après le choix et la
          configuration définitive de l’hébergement.
        </p>
        @endif
      </section>

      <section class="legal-page__section" aria-labelledby="privacy-contact">
        <h2 id="privacy-contact">Contact par courrier électronique</h2>

        <p>
          Lorsque vous contactez directement l’éditeur par courrier électronique, les informations
          que vous transmettez sont utilisées uniquement pour lire votre demande et y répondre.
        </p>

        <p>
          Ces informations peuvent notamment comprendre votre adresse électronique, votre identité,
          le contenu de votre message et les éventuelles pièces jointes que vous choisissez
          d’envoyer.
        </p>

        <p>
          Selon la nature de la demande, le traitement repose sur l’intérêt légitime à répondre aux
          messages reçus ou sur les démarches précontractuelles réalisées à votre demande.
        </p>

        @if (config('legal.contact_retention_months'))
        <p>
          Les échanges sont conservés pendant la durée nécessaire à leur traitement, puis pendant
          une durée maximale de {{ config('legal.contact_retention_months') }} mois, sauf obligation
          légale ou nécessité de conservation particulière.
        </p>
        @else
        <p>
          Les échanges sont conservés uniquement pendant la durée nécessaire au traitement de la
          demande et de ses éventuelles suites.
        </p>
        @endif
      </section>

      <section class="legal-page__section" aria-labelledby="privacy-audience">
        <h2 id="privacy-audience">Mesure d’audience</h2>

        <p>
          Aucun outil de mesure d’audience ni dispositif publicitaire n’est actuellement intégré à
          l’application.
        </p>

        <p>
          Une mesure statistique respectueuse de la vie privée pourra être mise en place
          ultérieurement au niveau de l’hébergement. Cette politique sera alors actualisée pour
          préciser les données utilisées, leur durée de conservation et les éventuels traceurs
          employés.
        </p>
      </section>

      <section class="legal-page__section" aria-labelledby="privacy-spotify">
        <h2 id="privacy-spotify">Contenu Spotify</h2>

        <p>
          Une partie du site permet d’afficher un lecteur fourni par Spotify. Ce contenu externe
          n’est pas chargé automatiquement.
        </p>

        <p>
          Tant que vous n’avez pas demandé son affichage, aucune connexion nécessaire au chargement
          du lecteur n’est initiée par le site vers Spotify.
        </p>

        <p>
          Lorsque vous choisissez de charger le lecteur, votre navigateur communique directement
          avec Spotify. Spotify peut alors traiter des informations techniques et déposer ou lire
          des traceurs conformément à ses propres règles de confidentialité.
        </p>

        <p>
          Ce chargement repose sur votre consentement. Vous pouvez refuser de charger le lecteur
          sans que cela empêche l’accès aux autres contenus du site.
        </p>

        <p>
          Pour en savoir plus, consultez la
          <a
            href="https://www.spotify.com/fr/legal/privacy-policy/"
            target="_blank"
            rel="noopener noreferrer"
          >
            politique de confidentialité de Spotify </a
          >.
        </p>
      </section>

      <section class="legal-page__section" aria-labelledby="privacy-recipients">
        <h2 id="privacy-recipients">Destinataires des données</h2>

        <p>
          Les données traitées directement par le site sont accessibles uniquement à l’éditeur et,
          dans la limite nécessaire à la fourniture de leurs services, aux prestataires techniques
          concernés, notamment l’hébergeur.
        </p>

        <p>
          Aucune donnée n’est vendue, louée ou transmise à des tiers à des fins commerciales ou
          publicitaires.
        </p>
      </section>

      <section class="legal-page__section" aria-labelledby="privacy-rights">
        <h2 id="privacy-rights">Vos droits</h2>

        <p>
          Dans les conditions prévues par la réglementation, vous pouvez demander l’accès aux
          données vous concernant, leur rectification, leur effacement ou la limitation de leur
          traitement.
        </p>

        <p>
          Vous pouvez également vous opposer à un traitement fondé sur l’intérêt légitime ou retirer
          votre consentement lorsqu’un traitement repose sur celui-ci.
        </p>

        <p>Pour exercer vos droits, vous pouvez écrire à :</p>

        <p>
          <a href="mailto:{{ config('legal.publisher.email') }}">
            {{ config('legal.publisher.email') }}
          </a>
        </p>

        <p>
          En cas de difficulté non résolue, vous pouvez déposer une réclamation auprès de la
          <a href="https://www.cnil.fr/fr/plaintes" target="_blank" rel="noopener noreferrer">
            Commission nationale de l’informatique et des libertés </a
          >.
        </p>
      </section>

      <section class="legal-page__section" aria-labelledby="privacy-updates">
        <h2 id="privacy-updates">Modification de cette politique</h2>

        <p>
          Cette politique pourra être mise à jour en cas d’évolution du site, de son hébergement ou
          des services tiers utilisés. La date de la dernière modification sera indiquée ci-dessous.
        </p>
      </section>

      <p class="legal-page__updated-at">
        Dernière mise à jour :
        <time datetime="2026-07-27">27 juillet 2026</time>
      </p>
    </div>
  </div>
</div>
