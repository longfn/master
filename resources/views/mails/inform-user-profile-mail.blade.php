<!doctype html>
<html lang="vi-VN">
  <head>
    <title> {{ env('APP_NAME') }} </title>
  </head>
  <body>
    @if(!empty($user))
      <h3> Hi, {{ $user['name'] }}</h3>
      <p> This email send from system. </p>
      <p> Please check your information. Is it correct? </p>
      <div>
        <hr>
        <span>
          <strong style="display: inline-block; width: 48%;"> Name </strong>
          <emphasis style="display: inline-block; width: 48%; text-align: right;"> {{ $user['name'] }} </emphasis>
        </span>
        <hr>
        <span>
          <strong style="display: inline-block; width: 48%;"> Email </strong>
          <emphasis style="display: inline-block; width: 48%; text-align: right;"> {{ $user['email'] }} </emphasis>
        </span>
        <hr>
        <span>
          <strong style="display: inline-block; width: 48%;"> Phone </strong>
          <emphasis style="display: inline-block; width: 48%; text-align: right;"> 0123456789 </emphasis>
        </span>
        <hr>
        <span>
          <strong style="display: inline-block; width: 48%;"> Address </strong>
          <emphasis style="display: inline-block; width: 48%; text-align: right;"> Hanoi </emphasis>
        </span>
        <hr>
      </div>
      <div>
        <p style="text-align: center;"> <a href="{{ route('admin.user.index') }}" style="text-decoration: none; border: 1px solid blue; background: blue; color: white; padding: 10px;"> User Profile </a> </p>
      </div>
    @endif
  </body>
</html>
