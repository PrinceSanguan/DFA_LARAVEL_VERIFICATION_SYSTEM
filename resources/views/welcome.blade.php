<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="{{asset('assets/images/DFA.png')}}">
    <title>DFA Verification System</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
    

  </head>
  <body>
    <section>
      <div class="box">
        <div class="form">
          <img src="{{asset('assets/images/DFA.png')}}" class="user" alt="broken-image" />
          <h2>MABUHAY!</h2>

          <form action="{{ route('login.post') }}" method="post">
            @csrf
           
          <!-- Log in Page -->
            <div class="inputBx">
              <input type="text" name="username" placeholder="Username" id="username" oninput="validation()" required autofocus autocomplete="off"/>
              <img src="{{asset('assets/images/user.png')}}" alt="broken-image" />
            </div>

            <div class="inputBx">
              <input type="password" name="password" id="password" placeholder="Password" oninput="validation()" required />
              <img src="{{asset('assets/images/lock.png')}}" alt="broken-image" />
            </div>


            <div class="inputBx">
              <input type="submit" name="submit" value="Login" id="submit" disabled />
            </div>

          </form>

        </div>
      </div>
    </section>

    <script>
      function validation() {
        let username = document.getElementById("username").value;
        let pass = document.getElementById("password").value;
        if (username != "" && pass != "") {
          document.getElementById("submit").disabled = false;
        } else {
          document.getElementById("submit").disabled = true;
        }
      }
    </script>

  </body>
</html>