@if($selectedNavigation->{'help_'.$selectedNavigation->mode.'_title'})
<div class="alert alert-info" role="alert">
  <h4 class="alert-heading">{{ $selectedNavigation->{'help_'.$selectedNavigation->mode.'_title'} }}</h4>
  <p>
    {!! $selectedNavigation->{'help_'.$selectedNavigation->mode.'_content'} !!}
  </p>
  <hr>
</div>
@endif
