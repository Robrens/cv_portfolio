<section id="skills" class="section skills rounded-card bg-brand-primary" x-data="{ activeTab: 'development' }">
  <div class="site-container">
    <div>
      <h2 class="subtitle font-semibold uppercase text-brand-accent">
        Compétences techniques
      </h2>

      <h1 class="section-title mt-4 text-white">
        Ce que je maîtrise
      </h1>
    </div>

    <nav class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4" aria-label="Catégories de compétences">
      <x-ui.tab-button key="development" label="Développement" icon="heroicon-o-code-bracket" />

      <x-ui.tab-button key="systems" label="Systèmes & Réseaux" icon="heroicon-o-server-stack" />

      <x-ui.tab-button key="devops" label="DevOps & Automatisation" icon="heroicon-o-cog-6-tooth" />

      <x-ui.tab-button key="methods" label="Outils & Méthodes" icon="heroicon-o-wrench-screwdriver" />
    </nav>

    <div class="mt-6 rounded-card border border-white/10 bg-white/3 p-6 md:p-8">
      <div x-show="activeTab === 'development'" x-transition.opacity.duration.150ms
        class="grid gap-6 lg:grid-cols-[0.8fr_2fr]">
        <div class="rounded-card bg-white/3 p-6">
          <x-heroicon-o-code-bracket class="h-10 w-10 text-brand-accent" />

          <h3 class="mt-5 text-lg font-bold text-white">
            Développement
          </h3>

          <p class="mt-3 text-sm leading-6 text-slate-300">
            Conception et développement d’applications web modernes,
            API robustes et intégrations sur mesure.
          </p>
        </div>

        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
          <x-ui.tech-card name="PHP" icon="heroicon-o-command-line" />
          <x-ui.tech-card name="Laravel" icon="heroicon-o-cube" />
          <x-ui.tech-card name="JavaScript" icon="heroicon-o-code-bracket-square" />
          <x-ui.tech-card name="TypeScript" icon="heroicon-o-code-bracket-square" />
          <x-ui.tech-card name="Node.js" icon="heroicon-o-server" />
          <x-ui.tech-card name="Express" icon="heroicon-o-bolt" />
          <x-ui.tech-card name="NestJS" icon="heroicon-o-fire" />
          <x-ui.tech-card name="REST API" icon="heroicon-o-globe-alt" />
          <x-ui.tech-card name="MySQL" icon="heroicon-o-circle-stack" />
          <x-ui.tech-card name="PostgreSQL" icon="heroicon-o-circle-stack" />
          <x-ui.tech-card name="Blade" icon="heroicon-o-document-text" />
          <x-ui.tech-card name="Alpine.js" icon="heroicon-o-sparkles" />
          <x-ui.tech-card name="TailwindCSS" icon="heroicon-o-swatch" />
          <x-ui.tech-card name="SCSS" icon="heroicon-o-paint-brush" />
          <x-ui.tech-card name="Git" icon="heroicon-o-code-bracket" />
        </div>
      </div>

      <div x-show="activeTab === 'systems'" x-transition.opacity.duration.150ms
        class="grid gap-6 lg:grid-cols-[0.8fr_2fr]" x-cloak>
        <div class="rounded-card bg-white/3 p-6">
          <x-heroicon-o-server-stack class="h-10 w-10 text-brand-accent" />

          <h3 class="mt-5 text-lg font-bold text-white">
            Systèmes & Réseaux
          </h3>

          <p class="mt-3 text-sm leading-6 text-slate-300">
            Administration Windows/Linux, services réseau,
            virtualisation et exploitation d’environnements techniques.
          </p>
        </div>

        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
          <x-ui.tech-card name="Linux / Debian" />
          <x-ui.tech-card name="Windows Server" />
          <x-ui.tech-card name="ADDS" />
          <x-ui.tech-card name="DNS" />
          <x-ui.tech-card name="DHCP" />
          <x-ui.tech-card name="RDS" />
          <x-ui.tech-card name="Hyper-V" />
          <x-ui.tech-card name="VMware" />
          <x-ui.tech-card name="TCP/IP" />
          <x-ui.tech-card name="VLAN" />
          <x-ui.tech-card name="GLPI" />
          <x-ui.tech-card name="Veeam" />
        </div>
      </div>

      <div x-show="activeTab === 'devops'" x-transition.opacity.duration.150ms
        class="grid gap-6 lg:grid-cols-[0.8fr_2fr]" x-cloak>
        <div class="rounded-card bg-white/3 p-6">
          <x-heroicon-o-cog-6-tooth class="h-10 w-10 text-brand-accent" />

          <h3 class="mt-5 text-lg font-bold text-white">
            DevOps & Automatisation
          </h3>

          <p class="mt-3 text-sm leading-6 text-slate-300">
            Automatisation, scripts, CI/CD et environnements
            reproductibles.
          </p>
        </div>

        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
          <x-ui.tech-card name="GitHub Actions" />
          <x-ui.tech-card name="GitLab CI" />
          <x-ui.tech-card name="Docker" />
          <x-ui.tech-card name="Bash" />
          <x-ui.tech-card name="PowerShell" />
          <x-ui.tech-card name="Cron" />
          <x-ui.tech-card name="Artisan Commands" />
          <x-ui.tech-card name="Déploiement VPS" />
        </div>
      </div>

      <div x-show="activeTab === 'methods'" x-transition.opacity.duration.150ms
        class="grid gap-6 lg:grid-cols-[0.8fr_2fr]" x-cloak>
        <div class="rounded-card bg-white/3 p-6">
          <x-heroicon-o-wrench-screwdriver class="h-10 w-10 text-brand-accent" />

          <h3 class="mt-5 text-lg font-bold text-white">
            Outils & Méthodes
          </h3>

          <p class="mt-3 text-sm leading-6 text-slate-300">
            Méthodes de conception, documentation, versioning et
            qualité de code.
          </p>
        </div>

        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
          <x-ui.tech-card name="SOLID" />
          <x-ui.tech-card name="Documentation" />
          <x-ui.tech-card name="Tests" />
          <x-ui.tech-card name="CI/CD" />
          <x-ui.tech-card name="API REST" />
          <x-ui.tech-card name="Modélisation" />
        </div>
      </div>
    </div>

    <div class="mt-6 text-center">
      <button
        class="btn btn-tertiary">
        Voir toutes les compétences
      </button>
    </div>
  </div>
</section>
