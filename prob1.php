<!DOCTYPE html>
<html  xmlns="http://www.w3.org/1999/xhtml">

<!--
  
    can run from the URL:
    http://nrs-projects.humboldt.edu/~awc27/328hw12/prob1.php

    by: Andy Chan
    last modified: 5/6/2018
-->

<head>
    <title> Problem 1 </title>
    <meta charset="utf-8" />

    <link href="http://users.humboldt.edu/smtuttle/styles/normalize.css"
          type="text/css" rel="stylesheet" />

    <script type="text/javascript">

        // when button w/ id = "load" is clicked,
        //     hope to synchronously fill a textarea

        window.onload =
            function()
            {
                var loadButton = 
                    document.getElementById("load");

                loadButton.onclick = loadClick;
            };

   
        function loadClick()
        {
            var ajax = new XMLHttpRequest();

            // set up readystatechange handler

			var myChoiceRadios = 
			document.getElementsByName("gender");

			var userChoice;

			for (var i=0; i < myChoiceRadios.length; i++)
			{
				if (myChoiceRadios[i].checked)
				{
					userChoice = myChoiceRadios[i].value;
				}
			}
			
			
            ajax.onreadystatechange =
                function()
                {
                    if (ajax.readyState == 4)
                    {
                        // when I reach here, request HAS completed
 
                       // IF the request succeed, show the
                       //    response in the textarea --
                       // otherwise, let's show error code
                       //    and error message there

    	               var outputTextArea = 
                           document.getElementById("output");

                       // status data field of 200 means success!

                       if (ajax.status == 200)
                       { 
                           outputTextArea.value = ajax.responseText + " " + userChoice;
                       }

                       // any other status means an error!

                       else
                       {
                           outputTextArea.value =
                              "Error fetching \n"
                              + ajax.status + " - " + ajax.statusText;
                       }
                   }
               };

            ajax.open("GET", "prob1.txt", true);
            ajax.send(null);
        }
    </script>

</head>

<body>

   <p> <strong> [warning: this page will not behave as it should if
       JavaScript is disabled] </strong>
   </p>

    <form method="get" action="">
		<input type="radio" name="gender" value="male"> Male<br>
		<input type="radio" name="gender" value="female"> Female<br>
		<input type="radio" name="gender" value="other"> Other
	</form>

	<p>
		<input type="text" id="output" > <br>
	</p>
    <p>
    <button id="load"> Load </button>
    </p>

<?php
    require_once("328footer.html");
?>

</body>
</html>
   