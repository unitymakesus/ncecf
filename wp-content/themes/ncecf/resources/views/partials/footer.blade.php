<footer class="content-info">
  <div class="container">
    <div class="left">
      Fat Footer Like You Had Before, Social Meida Inforation, Etc...
    </div>
    <div class="right">
      <h4>Contact Us</h4>
      <form name="contactform" method="post" action="../../send_form_email.php">
        <!-- NOTE: or functions.php -->
        <table width="450px">
          <tr>
            <td valign="top">
              <label for="first_name">Name *</label>
            </td>
            <td valign="top">
              <input  type="text" name="first_name" maxlength="50" size="30">
            </td>
          </tr>
          <tr>
            <td valign="top">
              <label for="email">Email Address *</label>
            </td>
            <td valign="top">
              <input  type="text" name="email" maxlength="80" size="30">
            </td>
          </tr>
          <tr>
            <td valign="top">
              <label for="telephone">Telephone Number</label>
            </td>
            <td valign="top">
              <input  type="text" name="telephone" maxlength="30" size="30">
            </td>
          </tr>
          <tr>
            <td colspan="2" style="text-align:center">
              <input type="submit" value="Submit">
            </td>
          </tr>
        </table>
      </form>
    </div>
    @php(dynamic_sidebar('sidebar-footer'))
  </div>
</footer>
