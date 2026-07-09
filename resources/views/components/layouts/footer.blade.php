<footer class="footer">
  <div class="site-container">
    <div class="footer__inner">
      <div class="footer__brand">
        <a href="#top" class="footer__logo" aria-label="Retour en haut de page">
          JB
        </a>

        <p class="footer__name">Jean-Baptiste Baudu</p>
        <p class="footer__job">Développeur applicatif & systèmes</p>
      </div>

      <nav class="footer__block" aria-label="Navigation secondaire">
        <h2 class="footer__title">Navigation</h2>

        <ul class="footer__list">
          <li><a href="#top">Accueil</a></li>
          <li><a href="#about">À propos</a></li>
          <li><a href="#skills">Compétences</a></li>
          <li><a href="#career">Parcours</a></li>
          <li><a href="#projects">Projets</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav>

      <div class="footer__block">
        <h2 class="footer__title">Réseaux</h2>

        <ul class="footer__list">
          <li>
            <a href="https://github.com/Robrens" target="_blank" rel="noopener noreferrer">
              <x-heroicon-o-code-bracket class="footer__icon" />
              GitHub
            </a>
          </li>

          <li>
            <a href="https://www.linkedin.com/in/jb-baudu" target="_blank" rel="noopener noreferrer">
              <x-heroicon-o-link class="footer__icon" />
              LinkedIn
            </a>
          </li>

          <li>
            <a href="mailto:jbb.codi@gmail.com">
              <x-heroicon-o-envelope class="footer__icon" />
              Email
            </a>
          </li>
        </ul>
      </div>

      <address class="footer__block footer__infos">
        <h2 class="footer__title">Informations</h2>

        <ul class="footer__list">
          <li>Basé à Ploërmel, Bretagne</li>
          <li>Disponible à partir de septembre 2026</li>
          <li>Ouvert aux opportunités</li>
        </ul>
      </address>
    </div>

    <div class="footer__bottom">
      <p class="footer__copyright">
        © {{ date('Y') }} Jean-Baptiste Baudu — Tous droits réservés.
      </p>
    </div>
  </div>
</footer>
