<footer class="content-info page-footer" role="contentinfo">
  <div class="container">
    <div class="row">
      <div class="col l3 m6 s12">
        @php(dynamic_sidebar('sidebar-footer-1'))
      </div>
      <div class="col l6 m6 s12 center-align">
        @php(dynamic_sidebar('sidebar-footer-2'))
      </div>
      <div class="col l3 m6 s12">
        @php(dynamic_sidebar('sidebar-footer-3'))
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
      <div class="flex flex-center space-between">
        <span class="copyright">&copy; @php(current_time('Y')) North Carolina Early Childhood Foundation</span>
        <a href="/privacy-policy/">Privacy Policy</a>
        <a href="/diversity-statement/">Diversity Statement</a>
        @include('partials.unity')
      </div>
    </div>
  </div>
</footer>
