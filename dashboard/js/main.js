$(document).ready(function() {


	$('.nav-trigger').click(function() {
		$('.side-nav').toggleClass('visible');
	});



	// EXPENSE ADD VALIDATION
	$(".add-expense-form").validate({
		rules: {
			category: 'required',
			product_or_service: 'required',
			price: {
				required: true,
				number: true
			}
		}
		// submitHandler: function() { alert("Submitted!") }
	});


	
	// SOURCE ADD VALIDATION
	$(".add-source-form").validate({
		rules: {
			name: 'required'
		}
		// submitHandler: function() { alert("Submitted!") }
	});



	// INCOME ADD VALIDATION
	$(".add-income-form").validate({
		rules: {
			source: 'required',
			amount: {
				required: true,
				number: true
			}
		}
		// submitHandler: function() { alert("Submitted!") }
	});



	// CATEGORY ADD VALIDATION
	$(".add-category-form").validate({
		rules: {
			name: 'required'
		}
		// submitHandler: function() { alert("Submitted!") }
	});



	// INCOME ADD VALIDATION
	$(".product-service-form").validate({
		rules: {
			category: 'required',
			name: 'required'
		}
		// submitHandler: function() { alert("Submitted!") }
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
				required: true,
				number: true
			}
		}
		// submitHandler: function() { alert("Submitted!") }
	});




	// CHANGE PASSWORD VALIDATION
	$(".change-password-form").validate({
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
		// submitHandler: function() { alert("Submitted!") }
	});





});