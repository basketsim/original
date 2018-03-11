<?php
  // Only attempt to end the session if there 
  // is a $PHPSESSID set by the request.
  if(isset($PHPSESSID)) {
    $message = "<p>End of session ($PHPSESSID).";
    session_start(  );
    session_destroy(  );
  } else {
    $message = "<p>There was no session to destroy!";
  }
?>
<!DOCTYPE HTML PUBLIC 
   "-//W3C//DTD HTML 4.0 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd" >
<html>
  <head><title>Sessions</title></head>
  <body>
    <?=$message?>
  </body>
</html>
