<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/user') }}">Home</a>
                <div>
                    <div>
                        <div>
                            <a class="nav-link" href="{{ route('signout') }}">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <nav style="background-color: #e3f2fd;">
            <div class=" btn-group-sm">
                <span class="navbar-toggler-icon"></span>
            </div>
        </nav>
        <div class="table-responsive">
            <table class="table table-hover progress-table text-center" >
                <td>
                    <h1>Hello,  {{ Auth::guard('admin')->user()->name}}</h1>
                    <h4>User Profile</h4>
                    <p>Name: {{ Auth::guard('admin')->user()->name }}</p>
                    <p>Email: {{ Auth::guard('admin')->user()->email }}</p>

                       <!-- Display progress -->
                       <p><strong>Task Progress:</strong> {{ $progress }}%</p>

                    <!-- Display formatted currency -->
                    <p><strong>Total Amount:</strong> {{ $formattedAmount }}</p>
                </td>
            </table>

            <div class="container">
                <h3>THE COLATINES WHO MAKE IT HAPPEN</h3>
            <p>We devote ourselves to digitizing our client's businesses
                for the rising tide of technological needs. From the founder
                 to the new recruit, passion drives everybody to excel at Colan
                 Infotech. Rising customer satisfaction is one of our key performance indicators.
                Our team of experienced developers and project managers
                work closely with you to understand your goals and deliver
                high-quality, reliable solutions on time and within budget.
                 Whether you need a custom software application, website,
                 or mobile app, we have the expertise to bring your project to life.</p>

            </div>
        </div>
        <table style="width: 730;" align="center" >
            <tr style="height: 35;">
              <td><table class="footer">
                <h6>Colan Infotech - Revolutionizing IT since 2008 Copyright © 2008 - 2023 | Terms & Conditions | Privacy Policy | Disclaime </h6>
              </table></td>
            </tr>
        </table>
    </div>
</body>
</html>

