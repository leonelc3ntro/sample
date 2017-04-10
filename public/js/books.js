var page = 1;
var current_page = 1;
var total_page = 0;
var is_ajax_fire = 0;

manageData();

/* manage data list */
function manageData() {
    $.ajax({
        dataType: 'json',
        url: url,
        data: {page:page}
    }).done(function(data){

    	total_page = data.last_page;
    	current_page = data.current_page;
        

        if ( total_page > 0 ) {

            $('#pagination').twbsPagination({
                totalPages: total_page,
                visiblePages: current_page,
                onPageClick: function (event, pageL) {
                    page = pageL;
                    if(is_ajax_fire != 0){
                      getPageData();
                    }
                }
            });

            manageRow(data.data);
            is_ajax_fire = 1;

        }
    });
}

$.ajaxSetup({
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});

/* Get Page Data*/
function getPageData() {
	$.ajax({
    	dataType: 'json',
    	url: url,
    	data: {page:page}
	}).done(function(data){
		manageRow(data.data);
	});
}

/* Add new Book table row */
function manageRow(data) {
	var	rows = '';
	$.each( data, function( key, value ) {
	  	rows = rows + '<tr>';
	  	rows = rows + '<td>'+value.name+'</td>';
	  	rows = rows + '<td>'+value.description+'</td>';
	  	rows = rows + '<td data-id="'+value.id+'">';
                rows = rows + '<button data-toggle="modal" data-target="#edit-book" class="btn btn-primary edit-book">Edit</button> ';
                rows = rows + '<button class="btn btn-danger remove-book">Delete</button>';
                rows = rows + '</td>';
	  	rows = rows + '</tr>';
	});

	$("tbody").html(rows);
}

/* Create new Book */
$(".crud-submit").click(function(e){
    e.preventDefault();
    var form_action = $("#create-book").find("form").attr("action");
    var name = $("#create-book").find("input[name='name']").val();
    var description = $("#create-book").find("textarea[name='description']").val();

    $.ajax({
        dataType: 'json',
        type:'POST',
        url: form_action,
        data:{name:name, description:description}
    }).done(function(data){
        getPageData();
        $(".modal").modal('hide');
        toastr.success('Book Created Successfully.', 'Success Alert', {timeOut: 5000});
    });

});

/* Remove Book */
$("body").on("click",".remove-book",function(){
    var id = $(this).parent("td").data('id');
    var c_obj = $(this).parents("tr");
    $.ajax({
        dataType: 'json',
        type:'delete',
        url: url + '/' + id,
    }).done(function(data){
        c_obj.remove();
        toastr.success('Book Deleted Successfully.', 'Success Alert', {timeOut: 5000});
        getPageData();
    });
});

/* Edit Book */
$("body").on("click",".edit-book",function(){
    var id = $(this).parent("td").data('id');
    var name = $(this).parent("td").prev("td").prev("td").text();
    var description = $(this).parent("td").prev("td").text();
    $("#edit-book").find("input[name='name']").val(name);
    $("#edit-book").find("textarea[name='description']").val(description);
    $("#edit-book").find("form").attr("action",url + '/' + id);
});

/* Updated new Book */
$(".crud-submit-edit").click(function(e){
    e.preventDefault();
    var form_action = $("#edit-book").find("form").attr("action");
    var name = $("#edit-book").find("input[name='name']").val();
    var description = $("#edit-book").find("textarea[name='description']").val();

    $.ajax({
        dataType: 'json',
        type:'PUT',
        url: form_action,
        data:{name:name, description:description}
    }).done(function(data){
        getPageData();
        $(".modal").modal('hide');
        toastr.success('Book Updated Successfully.', 'Success Alert', {timeOut: 5000});
    });
});