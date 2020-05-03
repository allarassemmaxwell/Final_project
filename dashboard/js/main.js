$(document).ready(function() {

	$("#year").text( (new Date).getFullYear() );


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
	});


	
	// SOURCE ADD VALIDATION
	$(".add-source-form").validate({
		rules: {
			name: 'required'
		}
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
	});



	// CATEGORY ADD VALIDATION
	$(".add-category-form").validate({
		rules: {
			name: 'required'
		}
	});



	// INCOME ADD VALIDATION
	$(".product-service-form").validate({
		rules: {
			category: 'required',
			name: 'required'
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
				required: true,
				number: true
			}
		}
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
	});





});