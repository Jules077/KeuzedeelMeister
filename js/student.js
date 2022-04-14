$( document ).ready(function() {
    Countdown();
  
    //checks if user is logged in on opening site
    if (sessionStorage.studentenNummer) {
      console.log(sessionStorage.studentenNummer);
      StudentLoader(sessionStorage.studentenNummer);
    } else {
      console.log('studentenNummer not exist in the session storage');
      location.href = "index.php";
    }
    //##buttons click events##
  });