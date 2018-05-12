$(document).ready(function() {
    $(".delete").click(function() {
        var id = $(this).attr("id");
        var url = $(this).attr("url");
        var r = confirm("Bạn có chắc muốn xoá không?");
        if (r==true) {
        	$(this).parentsUntil("tbody").fadeOut(500, function() { $(this).remove(); });
        	$.ajax({
	            url: url,
	            type: "POST",
	            cache: false,
	            dataType: "text",
	            data: {
	                id: id
	            }
	        })
        }
    });
    $(".update-stt").click(function() {
        var id = $(this).parentsUntil("tbody").find(".delete").attr("id"),
            url = $(this).attr("url"),
            a = $(this);
        $.ajax({
            url: url,
            type: "POST",
            dataType: "text",
            data: {
                id: id
            },
	        success: function(data) {
	        	if (data == false) {
	        		a.removeClass("fa-toggle-on");
	        		a.removeClass("fa-toggle-off");
	        		a.removeClass("text-danger");
	        		a.removeClass("text-success");
	        		a.addClass("text-danger");
	        		a.addClass("fa-toggle-off");
	        	} else {
	        		a.removeClass("fa-toggle-off");
	        		a.removeClass("fa-toggle-on");
	        		a.removeClass("text-danger");
	        		a.removeClass("text-success");
	        		a.addClass("text-success");
	        		a.addClass("fa-toggle-on");
	        	}
	        }
        })
    });
    $("#category_id1").change(function() {
		var id = $(this).val();
		$.ajax({
			url: 'cat2/'+id,
			type: 'GET',
			dataType: 'JSON',
			data: {id: id},
			success:function(data) {
				$('#category_id2 option').remove();
				$('#category_id2').append($('<option>', {
				  		value: 0,
				  		text: '--- Chọn thể loại cấp 2 ---'
				  	}));				
				jQuery.each(data, function(index, val) {

				  	$('#category_id2').append($('<option>', {
				  		value: val.id,
				  		text: val.name
				  	}));
				});
			}
		})
	});
    $("#category_id2").change(function() {
		var id = $(this).val();
		//alert(id);
		$.ajax({
			url: 'cat3/'+id,
			type: 'GET',
			dataType: 'JSON',
			data: {id: id},
			success:function(data) {
				$('#category_id3 option').remove();
				$('#category_id3').append($('<option>', {
				  		value: 0,
				  		text: '--- Chọn thể loại cấp 3 ---'
				  	}));				
				jQuery.each(data, function(index, val) {

				  	$('#category_id3').append($('<option>', {
				  		value: val.id,
				  		text: val.name
				  	}));
				});
			}
		})
	});
});