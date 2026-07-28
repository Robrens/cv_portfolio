@props([ 'profile', 'experiences', ]) @if ($experiences->isNotEmpty())
<section class="section career" id="career">
  <div class="site-container">
    @if ($profile->career_eyebrow || $profile->career_title)
    <div>
      @if ($profile->career_eyebrow)
      <h2 class="text-content-third uppercase subtitle font-semibold">
        {{ $profile->career_eyebrow }}
      </h2>
      @endif @if ($profile->career_title)
      <h1 class="section-title mt-4 text-heading">{{ $profile->career_title }}</h1>
      @endif
    </div>
    @endif

    <div class="career-timeline mt-12">
      @foreach ($experiences as $experience)
      <x-ui.timeline
        :period="$experience->period_label"
        :meta="$experience->employment_type"
        :title="$experience->title_label"
        :description="$experience->summary"
        :tags="$experience->technologies ?? []"
        :modal-id="$experience->has_details
                ? 'experience-' . $experience->id
                : null"
      />
      @endforeach
    </div>

    @foreach ($experiences->filter->has_details as $experience)
    <x-ui.experience-modal :experience="$experience" />
    @endforeach
  </div>
</section>
@endif
