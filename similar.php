
            	<script type="text/javascript">
            		window.alert("SIMILAR QUERY ALREADY EXISTS IN SAME DEPARTMENT");
            	</script>
            	
<?php

	session_start();
	$db = mysqli_connect('localhost','root','','rti');
	echo "The Similar Query is:";
	?><br><?php
	echo$_SESSION['highest'];

?>