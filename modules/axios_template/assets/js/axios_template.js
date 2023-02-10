$(function(){

});

$(document).on('show.bs.modal', '#axios_template_modal', function(event) {
    $('#axios_form').trigger("reset");
});

$(document).on('click', '#add_template', function(event) {
	event.preventDefault();
	$('#axios_template_modal').modal('hide');
	var data = $('#axios_form').serialize();
	axios
	  .post(`${admin_url}axios_template/save`, data)
	  .then(res => setOutput(res))
	  .catch(err => console.error(err));
});
	
function setOutput({data}){
	alert_float('success' , data.message);
	$('.table-axios_template_table').DataTable().ajax.reload();
}

// DELETE TEMPLATE
function removeTemplate(id) {
  axios
    .delete(`${admin_url}axios_template/deleteTemplate/${id}`)
    .then(res => setOutput(res))
    .catch(err => console.error(err));
}

$(document).on('click', '#edit', function(event) {
	event.preventDefault();
	var id = $(this).data('id');
	axios
	    .get(`${admin_url}axios_template/getTemplate/${id}`)
	    .then(function({data}){
	    	var axiosTemplateModal = $('#axios_template_modal');
	    	axiosTemplateModal.modal('show');
	    	axiosTemplateModal.find('#id').val(data.id);
	    	axiosTemplateModal.find('#firstname').val(data.firstname);
	    	axiosTemplateModal.find('#lastname').val(data.lastname);
	    	axiosTemplateModal.find('#email').val(data.email);
	    	axiosTemplateModal.find('#password').val(data.password);
	    	axiosTemplateModal.find('#phone').val(data.phone);
	    	axiosTemplateModal.find('#city').val(data.city);
	    	axiosTemplateModal.find('#address').val(data.address);
	    })
	    .catch(err => console.error(err));
});