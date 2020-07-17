$(document).ready(function() {
	$('#api-key-btn').click(function(event) {
		//lets the use confirm that they wan to generate the key
		var confirm_key = confirm("You are about to generate a new API key");
		if (!confirm_key) {
			return;
		}
		$.ajax({
			url: "apikey.php",
			dataType: "json",
			success: function(data) {
				if (data['success'] == 1) {
					//evrything went fine
					//set your key in the text area
					$('#api-key').val(data['message']);
				} else{
					alert("Something went wrong. Please try again");
				}
			}
		});
	});
});