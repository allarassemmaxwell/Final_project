
$(document).ready(function() {

	// HIDE AND SHOW REPORT ListeningStateChangedEvent(DAILY REPORT ETC)
	$('.report').hide();
	$('.report-list').click(function() {
		$('.report').toggle("slow");
	});


	// SHOW AND HIDE REPORT BY DAY, WEEK, MONTH AND YEAR
	$('.filter').hide(); 
	$('.report-filter').click(function() {
		$('.filter').toggle("slow");
	});


	// FILTER VALIDATION BY DAY, WEEK, MONTH AND ANNUAL
	$(".filter-by-form").validate({
		rules: {
			projected_date: 'required'
		}
	});

	// EXPENSE ADD VALIDATION
	$(".add-expense-form").validate({
		rules: {
			income: 'required',
			product_or_service: 'required',
			price: {
				required: true,
				number: true
			}
		}
	});

	// ADD PROJECTED EXPENSE
	$(".add-projected-expense-form").validate({
		rules: {
			projected_date: 'required',
			product_service_id: 'required',
			projected_amount: {
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


	// PRODUCT OR SERVICE VALIDATION
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


	// DELETE ACCOUNT VALIDATION
	$(".delete-account-form").validate({
		rules: {
			c_password: 'required'
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
	var modal  = document.getElementById("myModal");

	var btn = document.getElementById("myBtn");

	var span = document.getElementsByClassName("close")[0];

	btn.onclick = function() {
		modal.style.display = "block";
	}

	span.onclick = function() {
		modal.style.display = "none";
	}

	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
	// END OF MODAL 		END OF MODAL 		END OF MODAL 		END OF MODAL




    // GO UP USING JAVASCRIPT AND JQUERY
	var mybutton = document.getElementById("goUpBtn");
	window.onscroll = function() {scrollFunction()};
	function scrollFunction() {
		if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			mybutton.style.display = "block";
		} else {
			mybutton.style.display = "none";
		}
	}
	$("#goUpBtn").click(function(){
		$("html, body").animate({ scrollTop: 0 }, "slow");
     return false;
	});
 	// END OF GOING UP USING JAVASCRIPT AND JQUERY



	// SHOW YEAR IN THE FOOTER
	$("#year").text( (new Date).getFullYear() );

	
	
});









