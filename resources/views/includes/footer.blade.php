<script src="https://www.gstatic.com/firebasejs/5.8.4/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyBfSX_L0LgSt8apo6WtOqFIL3_PAve27HI",
    authDomain: "qurannlife-5698f.firebaseapp.com",
    databaseURL: "https://qurannlife-5698f.firebaseio.com",
    projectId: "qurannlife-5698f",
    storageBucket: "",
    messagingSenderId: "1007456883148"
  };
  firebase.initializeApp(config);
</script>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1014092718778022',
      cookie     : true,
      xfbml      : true,
      version    : '3.2'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Bootstrap core JavaScript -->
<script src="{{ url('/public/vendor') }}/jquery/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="{{ url('/public/vendor') }}/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="{{ url('/public/vendor') }}/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for this template -->
<script src="{{ url('/public/js') }}/resume.min.js"></script>
<!-- html2canvas -->
<script src="{{ url('/public/js') }}/html2canvas.min.js"></script>