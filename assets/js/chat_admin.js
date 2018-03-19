$(document).ready(function() {

	var last_message_id = 0;

	get_chat_messages();
	// setInterval(function() {
	// 	get_chat_messages();
	// }, 5000);

	$('input#chat_message').keypress(function(e) {
		if (e.which==13) {
			$('a#btn_submit_chat').click();
			return false;
		}
	})

	// $('a#btn_submit_chat').click(function() {
	// 	var chat_message_content = $('input#chat_message').val();

	// 	if (chat_message_content=="") {
	// 		return false;
	// 	}
	// 	$.post(base_url+"admin/message/add_message",
	// 		{ chat_message_content : chat_message_content,
	// 		chat_id : chat_id,
	// 		user_id: user_id},
	// 		function (data) {
	// 			if (data.status=="ok") {
	// 				var current_content = $('ul#panel_chat').val();
	// 				$('#panel_chat').html(current_content + data.content);
	// 			}else{

	// 			}
	// 		},
	// 		"json"
	// 	);
	// 	$('input#chat_message').val("");
	// 	return false;
	// });

	$('a#btn_submit_chat').click(function(e){
		e.preventDefault();
		if( $('input#chat_message').val() != "" ) {
			$.post(base_url+"admin/message/add_message",
				{
					chat_message_content : $('#chat_message').val(),
					chat_id : $('#kepada_username').val()
				},
				function (data) {
					if (data.success) {
						var html = "";
						last_message_id = data.last_insert_id;
						if( data.rows.status == "dari" ) {
							kelas = "bg-aqua";
							keterangan = "Dikirim Oleh : ";
						}
						else {
							kelas = "bg-orange";
							keterangan = "Ditanggapi Oleh : ";
						}
						html += '<li class="list-group-item '+kelas+' ">'
						+'<span><small><i class="fa fa-clock-o"></i>'
						+data.rows.create_date + '<br/>' + keterangan + data.rows.dari_fullname
						+'</small></span><br/>'
						+'<p class="text-info">'
						+data.rows.chat_message_content
						+'</p>'
						+'</li>'
						$('#panel_chat').append(html);
						$('#chat_message').val('');
					}
				},
				"json"
			);
		}
	});

	function get_chat_messages() {
		$.post(base_url+'admin/message/get_chat_message',
			{chat_id:$('#kepada_username').val()},
			function (data) {
				if (data.success) {
					var html = "";
					if( data.msg.length ) {
						var kelas = "";
						var keterangan = "";
						for (var i = 0; i < data.msg.length; i++) {
							if( data.msg[i].status == "dari" ) {
								kelas = "bg-aqua";
								keterangan = "Dikirim Oleh : ";
							}
							else {
								kelas = "bg-orange";
								keterangan = "Ditanggapi Oleh : ";
							}
							html += '<li class="list-group-item '+kelas+' ">'
							+'<span><small><i class="fa fa-clock-o"></i>'
							+data.msg[i].create_date + '<br/>' + keterangan + data.msg[i].dari_fullname
							+'</small></span><br/>'
							+'<p class="text-info">'
							+data.msg[i].chat_message_content
							+'</p>'
							+'</li>'

							if( data.msg.length - 1 == i ) last_message_id = data.msg[i].chat_message_id;
						}

						setInterval(function() {
							get_last_message();
						}, 5000);
					}
					$('#panel_chat').html(html);
				}
			},"json");
	}

	function get_last_message() {
		//console.log(["LAST MESSAGE ID : ",last_message_id]);
		$.ajax({
            url: base_url+"admin/message/get_last_message",
            dataType: 'json',
            type: 'POST',
            data : { dari_username : $('#kepada_username').val() },
            success: function(data, textStatus, XMLHttpRequest) {
                if( data.success ) {
                	if( parseInt(data.last_insert_id) > parseInt(last_message_id) ) {
      					var html = "";

						last_message_id = data.last_insert_id;

						if( data.rows.status == "dari" ) {
							kelas = "bg-aqua";
							keterangan = "Dikirim Oleh : ";
						}
						else {
							kelas = "bg-orange";
							keterangan = "Ditanggapi Oleh : ";
						}

						html += '<li class="list-group-item '+kelas+' ">'
						+'<span><small><i class="fa fa-clock-o"></i>'
						+data.rows.create_date + '<br/>' + keterangan + data.rows.dari_fullname
						+'</small></span><br/>'
						+'<p class="text-info">'
						+data.rows.chat_message_content
						+'</p>'
						+'</li>'

						$('#panel_chat').append(html);

                	}

                }
            }
        });
	}


});