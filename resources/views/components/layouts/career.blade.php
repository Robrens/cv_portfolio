@php
$experiences = [
[
'period' => 'Avr. 2026 – Juin 2026',
'meta' => '(Stage)',
'title' => 'Technicien systèmes et réseaux • Hospitalité Saint-Thomas de Villeneuve',
'description' => 'Déploiement, administration et supervision d’infrastructures systèmes et réseaux. Gestion de parc,
virtualisation, déploiement PXE/FOG et services Windows.',
'tags' => ['Windows Server', 'ADDS', 'DHCP', 'PXE', 'GLPI'],
'href' => '#',
],
[
'period' => 'Avr. 2023 – Juin 2026',
'meta' => null,
'title' => 'Développeur Web • Yes We Dev',
'description' => 'Développement d’applications Laravel, intégration frontend, plugins WordPress avancés, API et
automatisations. Mise en place de pipelines CI/CD.',
'tags' => ['Laravel', 'PHP', 'WordPress', 'GitLab CI', 'API REST'],
'href' => '#',
],
[
'period' => 'Juin 2021 – Juil. 2022',
'meta' => null,
'title' => 'Développeur Web JS • MobaWeb',
'description' => 'Applications web avec Next.js/Node.js, intégration de CMS headless et développement de fonctionnalités
métiers.',
'tags' => ['Next.js', 'Node.js', 'Express', 'Payload CMS', 'Strapi'],
'href' => '#',
],
[
'period' => '2014 – 2020',
'meta' => 'Divers postes',
'title' => 'Expériences professionnelles antérieures',
'description' => 'Viticulture, cave, ouvrier itinérant. Des expériences qui m’ont appris rigueur, adaptabilité et sens
du travail.',
'tags' => [],
'href' => '#',
],
];
@endphp

<section class="section career" id="career">
  <div class="site-container">
    <div>
      <h2 class="text-content-third uppercase subtitle font-semibold">
        Parcours professionnel
      </h2>

      <h1 class="section-title mt-4 text-heading">
        Mon expérience en action
      </h1>
    </div>

    <div class="career-timeline mt-12">
      @foreach($experiences as $experience)
      <x-ui.timeline :period="$experience['period']" :meta="$experience['meta']" :title="$experience['title']"
        :description="$experience['description']" :tags="$experience['tags']" :href="$experience['href']" />
      @endforeach
    </div>

    <div class="mt-10 flex justify-center">
      <a href="#parcours-complet" class="btn-secondary">
        Voir tout le parcours
      </a>
    </div>
  </div>
</section>
