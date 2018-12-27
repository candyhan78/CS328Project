window.onload = 
    function()
    {
        // add a form-validation function to the 1st state's
        //     form (if we are in the 1st state!)

        var myButton = document.getElementById("confirm");

                            // set the onclick attribute to the
    	  		    //    FUNCTION, NOT to the result
    	  		    //    of CALLING the function!!
		myButton.onclick = confirmation;
		
    };
	
	function confirmation() {
    var conf=confirm("Are You Sure You Want To Proceed?");

    if(conf==true) {
        alert("Update Successful");
        return true;
    } else {
        alert("Update Canceled");
        return false;
    }   
}