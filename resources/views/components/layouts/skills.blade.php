@props([ 'profile', 'skillCategories', ]) @if ($skillCategories->isNotEmpty())
<section
  id="skills"
  class="section skills"
  x-data="{ activeTab: @js($skillCategories->first()->slug) }"
>
  <div class="site-container rounded-card bg-brand-primary">
    @if ($profile->skills_eyebrow || $profile->skills_title)
    <div>
      @if ($profile->skills_eyebrow)
      <h2 class="subtitle font-semibold uppercase text-brand-accent">
        {{ $profile->skills_eyebrow }}
      </h2>
      @endif @if ($profile->skills_title)
      <h1 class="section-title mt-4 text-white">{{ $profile->skills_title }}</h1>
      @endif
    </div>
    @endif

    <nav
      class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4"
      aria-label="Catégories de compétences"
    >
      @foreach ($skillCategories as $category)
      <x-ui.tab-button :key="$category->slug" :label="$category->name" :icon="$category->icon" />
      @endforeach
    </nav>

    <div class="mt-6 rounded-card border border-white/10 bg-white/3 p-6 md:p-8">
      @foreach ($skillCategories as $category)
      <div
        x-show="activeTab === @js($category->slug)"
        x-transition.opacity.duration.150ms
        x-cloak
        class="grid gap-6 lg:grid-cols-[0.8fr_2fr]"
      >
        <div class="rounded-card bg-white/3 p-6">
          @if ($category->icon)
          <x-icons.icon :name="$category->icon" class="h-10 w-10 text-brand-accent" />
          @endif

          <h3 class="mt-5 text-lg font-bold text-white">{{ $category->name }}</h3>

          @if ($category->description)
          <p class="mt-3 text-sm leading-6 text-slate-300">{{ $category->description }}</p>
          @endif
        </div>

        @if ($category->skills->isNotEmpty())
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
          @foreach ($category->skills as $skill)
          <x-ui.tech-card :name="$skill->name" :icon="$skill->icon" />
          @endforeach
        </div>
        @else
        <p class="text-sm text-slate-400">Aucune compétence renseignée dans cette catégorie.</p>
        @endif
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif
