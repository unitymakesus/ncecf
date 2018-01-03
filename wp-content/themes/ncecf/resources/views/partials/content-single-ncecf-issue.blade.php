<!-- Issues Page (I need to reroute, I think - with the menu appearance in Admin) -->

<!-- NOTE TODO I think we will need an if/else type think with blade for individual issue view template VS. the aggregate issue page (showing here)-->

<div class="container">
  <div class="left">
    <h1>Issues</h1>
    <p>this is a short paragraph wasd advaer asaer fbaef asdwe aaerg daergv daregadv <br>
      asdfarg agre dverg sdvwew nrasd regerbbd arwerg njtyjy sdfwe awet awgre aw<br>
      afrwerg wetrg wewe asg</p>
  </div>
  <div class="right">
    <h6>How to partner<br> with us</h6><br>
    <button type="button">Join Us</button>
    <!-- NOTE: Find WP tool / Contact Form Plugin -->
  </div>
  <div class="list-issues-section">
    <h3>Health and Development</h3>
      <li><a href="{{ home_url('/ncecf-issue/healthy-birthweight/') }}">Healthy Birthweight</li>
      <li><a href="{{ home_url('/ncecf-issue/social-emotional-health/') }}">Social-Emotional Health</a></li>
      <li><a href="{{ home_url('/ncecf-issue/oral-health/') }}">Oral Health</a></li>
      <li><a href="{{ home_url('/ncecf-issue/physical-health/') }}">Physical Health</a></li>
      <li><a href="{{ home_url('/ncecf-issue/early-intervention/') }}">Early Intervention</a></li>
    <h3>Families and Communities</h3>
      <li><a href="{{ home_url('/ncecf-issue/knowledgeable-parents/') }}">Knowledgeable Parents</a></li>
      <li><a href="{{ home_url('/ncecf-issue/parentchild-interactions/') }}">Parent/Child Interactions</a></li>
      <li><a href="{{ home_url('/ncecf-issue/reading-with-children/') }}">Reading with Children</a></li>
      <li><a href="{{ home_url('/ncecf-issue/supports-for-family/') }}">Supports for Family</a></li>
      <li><a href="{{ home_url('/ncecf-issue/safe-at-home/') }}">Safe at Home</a></li>
    <h3>Education</h3>
      <li><a href="{{ home_url('/ncecf-issue/regular-school-attendance/') }}">Regular School Attendance</a></li>
      <li><a href="{{ home_url('/ncecf-issue/high-quality-early-care-education/') }}">High-Quality Early Care & Education</a></li>
      <li><a href="{{ home_url('/ncecf-issue/school-climate/') }}">School Climate</a></li>
      <li><a href="{{ home_url('/ncecf-issue/grade-promotion/') }}">Grade Promotion</a></li>
      <li><a href="{{ home_url('/ncecf-issue/summer-learning/') }}">Summer Learning</a></li>
    <h3>Policy</h3>
      <li><a href="{{ home_url('/ncecf-issue/federal/') }}">Federal</a></li>
      <li><a href="{{ home_url('/ncecf-issue/local/') }}">Local</a></li>
      <li><a href="{{ home_url('/ncecf-issue/state/') }}">State</a></li>
  </div>
</div>
