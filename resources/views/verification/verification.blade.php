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

  <div class="floating-element" style="position: fixed; top: 70px; right: 20px; z-index: 1000;">
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="text-decoration: none; color: #faf7f7; padding: 5px 10px; border-radius: 1px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
      <i class="fas fa-sign-out-alt"></i> Sign out
    </a>
  </div>

  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>
  
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
      <button type="submit" onclick="printPage()">Submit</button>
    </form>
  </div>

  <script>

// For Printing
function printPage() {
    // Specify the URL of your PDF file
    var pdfUrl = "{{ asset('assets/pdfNumbers/Diploma.pdf') }}";
    
    // Create a hidden iframe element
    var iframe = document.createElement('iframe');
    iframe.style.display = 'none';
    
    // Set the source of the iframe to the PDF URL
    iframe.src = pdfUrl;
    
    // Append the iframe to the document body
    document.body.appendChild(iframe);
    
    // Print the content of the iframe
    iframe.onload = function() {
        // Trigger the print dialog
        iframe.contentWindow.print();
        
        // Remove the iframe after printing (adjust timeout as needed)
        setTimeout(function() {
            document.body.removeChild(iframe);
        }, 1000); // Adjust the timeout value as needed
    };
}

  </script>

<footer class="main-footer" style="position: fixed; bottom: 0; width: 100%; background-color: #f5f5f5; color: #666; padding: 15px; text-align: center;">
  <p>© 2023-2024 PES | Version 1.1</p>
</footer>

  
</body>

</html>