<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
      <title>Careers</title>
<style>

</style>
</head>
<body>
<div class="container3">
  <table style=" margin-top: 200px;width: 750px;"align="center">
  <tr style="height: 400px;"
  style="position: fixed;">
    <th style="width: 200px;">
        <table style="width: 150;"align="center">
            <tr style="height: 70;">
              <td><a href="{{ url('company') }}">Home</a></td>
            </tr>
            <tr style="height: 70;">
                <td><a href="{{ url('contact') }}">Contact</a></td>
            </tr>
            <tr style="height: 70;">
                <td><a href="{{ url('about') }}">About</a></td>
            </tr>
            <tr style="height: 70;">
                <td><a href="{{ url('service') }}">Services</a></td>
            </tr>
            <tr style="height: 70;">
                <td><a href="{{ url('career') }}">Careers</a></td>
            </tr>
          </table>
        </th>
        <td>
            <h4>BUILD YOUR FUTURE AT COLAN</h4>
            <p>
              Are you looking for a new beginning? Join us for a rewarding career. You will have a cool team, an awesome work environment, competitive pay & benefits to excel in your career.
              Post your resume so that our recruiters can contact you first—as soon as there is a job opening. You will receive emails on jobs matching your criteria directly to your inbox.

            </p>
            <h4>ARE YOU READY TO PUSH THE LIMITS? JOIN OUR PRO TEAM!</h4>


        </td>
  </tr>
  </table>
<br>
  <table style=" width: 750px;"
  align="center">
  <tr style="height: 50px;"
  style="position: fixed;">
    <td>
        <table style="width: 730;"
        align="center" >
            <tr
            style="height: 35;">
              <td><table class="footer">{{ $name }}
                <h6>Colan Infotech - Revolutionizing IT since 2008
                  Copyright © 2008 - 2023 | Terms & Conditions | Privacy Policy | Disclaimer

                  </h6>
              </table></td>
            </tr>
          </table>
    </td>
  </tr>
  </table>
</div>

</body>
</html>
