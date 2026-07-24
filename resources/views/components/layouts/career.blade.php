@props([
'experiences',
])

@if ($experiences->isNotEmpty())
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
      @foreach ($experiences as $experience)
        <x-ui.timeline :period="$experience->period_label" :meta="$experience->employment_type"
          :title="$experience->title_label" :description="$experience->summary" :tags="$experience->technologies ?? []" :href="$experience->has_details
              ? '#experience-' . $experience->id
              : null" />
      @endforeach
    </div>
  </div>
</section>
@endif
