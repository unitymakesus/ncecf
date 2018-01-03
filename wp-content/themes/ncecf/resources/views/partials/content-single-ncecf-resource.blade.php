<!-- Resources Page (I need to reroute, I think - with the menu appearance in Admin) -->
<div class="container">
  <section>
    <div class="left">
      <h1>Search Resources</h1>
      <p>Search using keyword, initiative name, data, etc...</p>
      {!! get_search_form(false) !!}
    </div>
    <div class="right">
      <h6>Can't find what<br> you need?</h6><br>
      <button type="button">Contact Us</button>
      <!-- NOTE: Find WP tool / Contact Form Plugin -->
    </div>
    <div class="filter-section">
      <h4>Filter Results</h4>
      <button type="button">Apply Filters</button>
      <button type="button">Clear Filters</button>
    </div>
    <!-- TODO Interpolate list number of results and print -->
  </section>
  <section>
    @if (!have_posts())
      <div class="alert alert-warning">
        <h5>No Resources Found</h5>
      </div>
    @endif

    @foreach ($resources as $resource)
      <div class="resource">
        {{ isset($resource->title) ? $resource->title : 'No Title' }}
        {{ isset($author) ? $author : 'No Author' }}
      </div>
    @endforeach
  </section>
</div>
