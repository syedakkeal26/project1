<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
</head>
<body>
    <div class="container4 ">
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
                <form action="" method="get">
                    <h2>CONTACT US</h2>
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" name="firstname" placeholder="Your name..">
                    <br>
                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="lastname" placeholder="Your last name..">
                    <br>
                    <label for="country">Country</label>
                    <select id="country" name="country">
                        <option value="india">India</option>
                        <option value="canada">Canada</option>
                        <option value="usa">USA</option>
                    </select>
                    <br>
                    <label for="subject">Subject</label>
                    <textarea id="subject" name="subject" placeholder="Write something.."></textarea>
                   <br>
                    <input type="submit" value="Submit">
                    </form>

              </td>
            </th>
            </table>

            <table style="width: 750px;"
            align="center">
            <tr style="height: 50px;"
            style="position: fixed;">
            <td>
                <table style="width: 730;"
                align="center" >
                    <tr
                    style="height: 35;">
                        <td><table class="footer">
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
