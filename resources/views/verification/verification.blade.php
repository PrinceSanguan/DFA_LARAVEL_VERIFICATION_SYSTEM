<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="{{asset('assets/images/DFA.png')}}">
    <title>DFA Verification System</title>
    <link rel="stylesheet" href="{{asset('assets/css/verification.css')}}" />
  </head>

<body>
  <div class="banner">
    <img class="image-banner" src="{{asset('assets/images/banner.png')}}" alt="broken-image">
  </div>
  <!-- Display the user role as a floating element -->
  <div class="floating-element">
    <p>Welcome, {{$name}}</p>
  </div>
  
  <div class="container">

    @if(session('success'))
    <div id="success-alert" class="alert alert-success" style="font-size: 18px; padding: 20px;">
        {{ session('success') }}
        <audio id="success-audio" src="{{ asset('assets/audio/success.mp3') }}" preload="auto"></audio>
    </div>
    <script>
        // When the document is ready
        document.addEventListener("DOMContentLoaded", function() {
            // Play the audio immediately
            document.getElementById('success-audio').play();
            
            // Hide the success message after 2 seconds
            setTimeout(function() {
                document.getElementById('success-alert').style.display = 'none';
            }, 2000);
        });
    </script>
@endif


@if(session('error'))
    <div id="error-alert" class="alert alert-danger" style="font-size: 18px; padding: 20px;">
        {{ session('error') }}
        <audio id="error-audio" src="{{ asset('assets/audio/error.mp3') }}" preload="auto"></audio>
    </div>
    <script>
      // When the document is ready
      document.addEventListener("DOMContentLoaded", function() {
          // Play the audio immediately
          document.getElementById('error-audio').play();
          
          // Hide the success message after 2 seconds
          setTimeout(function() {
              document.getElementById('error-alert').style.display = 'none';
          }, 2000);
      });
  </script>
@endif


    <img src="{{asset('assets/images/DFA2.png')}}" alt="broken-image" style="max-width: 100%; height: auto;">

    <form action="{{ route('verify.post') }}" method="post">
      @csrf
     <input type="text" name="appointmentCode" autofocus required><br>
      <label>Application Number</label>
      <button type="submit">Submit</button>
    </form>
  </div>

  <script>

    // JavaScript to change the text color every 2 seconds
const appNumber = document.getElementById("appNumbers"); // Updated variable name
const colors = ["red", "blue", "orange", "green", "yellow"];
let colorIndex = 0;

function changeColor() {
  appNumber.style.color = colors[colorIndex]; // Updated variable name
  colorIndex = (colorIndex + 1) % colors.length;
}

setInterval(changeColor, 2000); // Change color every 2 seconds

  </script>

<footer class="main-footer" style="position: fixed; bottom: 0; width: 100%; background-color: #f5f5f5; color: #666; padding: 15px; text-align: center;">
  <p>© 2023-2024 PES | Version 1.1</p>
</footer>

  
</body>

</html>