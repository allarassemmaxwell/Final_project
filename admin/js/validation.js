
$(document).ready(function() {

	$("#year").text( (new Date).getFullYear() );


	$('.nav-trigger').click(function() {
		$('.side-nav').toggleClass('visible');
	});



	// EXPENSE ADD VALIDATION
	$(".add-expense-validation").validate({
		rules: {
            user: 'required',
			category: 'required',
			product_or_service: 'required',
			price: {
				required: true,
				number: true
			}
		}
	});


	
	// SOURCE ADD VALIDATION
	$(".add-source-validation").validate({
		rules: {
            user: 'required',
			name: 'required'
		}
	});



	// INCOME ADD VALIDATION
	$(".add-income-validation").validate({
		rules: {
            user: 'required',
			source: 'required',
			amount: {
				required: true,
				number: true
			}
		}
	});



	// CATEGORY ADD VALIDATION
	$(".add-category-validation").validate({
		rules: {
            user: 'required',
			name: 'required'
		}
	});



	// INCOME ADD VALIDATION
	$(".product-service-validation").validate({
		rules: {
            user: 'required',
			category: 'required',
			name: 'required'
		}
    });
    



    // USER ADD VALIDATION
	$(".user-add-validation").validate({
		rules: {
			first_name: 'required',
			last_name: 'required',
			email: { 
				required: true,
				email: true
            },
            is_admin: 'required',
            password: 'required'
		}
	});




	// PROFILE EDIT VALIDATION
	$(".profile-edit-form").validate({
		rules: {
			first_name: 'required',
			last_name: 'required',
			email: { 
				required: true,
				email: true
			},
			family_number: { 
				number: true
			}
		}
	});




	// CHANGE PASSWORD VALIDATION
	$(".change-password-validation").validate({
		rules: {
			old_password: 'required',
			new_password: { 
				required: true,
				minlength: 6
			},
			c_password: { 
				required: true,
				equalTo : "#new_password"
			}
		}
	});



	$('#submit').click(function(){
		$(this).addClass('button_loader').attr("value","");
		window.setTimeout(function(){
		  $('#submit').removeClass('button_loader').attr("value","\u2713");
		  $('#submit').prop('disabled', true);
		}, 3000);
	  });

	 






	//   START OF MODAL 	START OF MODAL 		START OF MODAL 		START OF MODAL
	// Get the modal
	var modal = document.getElementById("myModal"); 

	// Get the button that opens the modal
	var btn = document.getElementById("myBtn");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks the button, open the modal 
	btn.onclick = function() {
		modal.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
		modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}

	// END OF MODAL 		END OF MODAL 		END OF MODAL 		END OF MODAL
	  


	
});









