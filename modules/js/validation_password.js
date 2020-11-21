$(document).ready(function () {
    $("#Password2").keyup(function () {
        if ($("#Password1").val() !== $("#Password2").val()) {
          $("#error-confirmpassword").removeClass("hide");
         
        } else {
          $("#error-confirmpassword").addClass("hide");
        }
      });
    
	$("#Password1").keyup(function() {
        var password = $(this).val();
        
		//validate the length
        if (password.length > 7) {
            $(".eight-character").addClass("text-success");
            $(".eight-character i").removeClass("fa-ban text-danger").addClass("fa-check text-success");
          
          } else {
            $(".eight-character").removeClass("text-success");
            $(".eight-character i").addClass("fa-ban text-danger").removeClass("fa-check text-succees");
        }
        
        //validate upper case
		if (password.match(/[A-Z]/)) {
            
            $(".upper-case").addClass("text-success");
            $(".upper-case i").removeClass("fa-ban text-danger").addClass("fa-check text-success");
            
          } else {
            $(".upper-case").removeClass("text-success");
            $(".upper-case i").addClass("fa-ban text-danger").removeClass("fa-check text-succees");
          
          }
          
          //validate letter adn capital letter
          if (password.match(/[a-z]/)) {
              $(".lower-case").addClass("text-success");
              $(".lower-case i").removeClass("fa-ban text-danger").addClass("fa-check text-success");
              
            } else {
              $(".lower-case").removeClass("text-success");
              $(".lower-case i").addClass("fa-ban text-danger").removeClass("fa-check text-succees");
            
          }
        
          //If it has numbers and characters
          if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) {
            $(".one-number").addClass("text-success");
            $(".one-number i").removeClass("fa-ban text-danger").addClass("fa-check text-success");
          } else {
            $(".one-number").removeClass("text-success");
            $(".one-number i").addClass("fa-ban text-danger").removeClass("fa-check text-succees");
          }
    })
    .focus(function() {
		$('#passwordRules').show();
	}).blur(function() {
		$('#passwordRules').hide();
	});
	
});