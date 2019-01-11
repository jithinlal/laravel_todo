$(document).ready(function() {
	$('.deleteAjax').on('click', function() {
		let id = $(this).data('id');
		let token = $('#token').val();

		$.ajax({
			url: '/task/' + id,
			type: 'POST',
			data: {
				"_token": token,
			},
			success: function(res) {
				if (res.success) {
					alert(res.msg);
					location.reload();
				}
			},
			error: function(err) {
				console.log(err);
			}
		});

	});
});
