<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
    
    <div class="container">
         <div class="row">
            <div class="col-md-6 col-md-offset-3">
            </div class="">
                   <h4 style="">Dashboard</h4> 
                   <h6 class="float_end" ><a href="{{ route('auth.logout') }}">Logout</a></h6>
         </div>
                   <table class="table table-hover">
                      
                      <tbody>
                         <tr>
                            <td class="fs-3 fw-bolder"><span> welcome </span>{{ $LoggedUserInfo['name'] }}</td>
                            
                            
                         </tr>
                      </tbody>
                   </table>

                   <ul>
                       <li><a href="/admin/dashboard">Dashboard</a></li>
                       <li><a href="/companies">Companies</a></li>
                       <li><a href="/contacts">contacts</a></li>
                       <li><a href="/users">Users</a></li>
                   </ul>
            </div>
         </div>
    </div>
</body>
</html>