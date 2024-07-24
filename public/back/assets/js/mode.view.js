$(document).ready(function() {
   $('.data-table').on('click', '#show-imp-data', function() {
	   
        var userURL = $(this).data('url');
        $.get(userURL, function(data) {
            $('.userShowModal').modal('show');
            $('#nameId').val(data.id);
            $('#iec_number').text(data.iec_number);
            $('#name_of_applicant').text(data.name_of_applicant);
            $('#application_number').text(data.application_number);
            $('#hs_code').text(data.address_company);

        })
    });


	$('.data-table').on('click', '#show-imp-data1', function() {
        var userURL = $(this).data('url');
        $.get(userURL, function(data) {
            $('#bs-example-modal-lg').modal('show');
            $('#nameId1').val(data.import_data.id);
            $('#iec_number1').text(data.import_data.iec_number);
            $('#name_of_applicant1').text(data.import_data.name_of_applicant);
            $('#application_number1').text(data.import_data.application_number);
            $('#address1').text(data.import_data.address_company);
			$('#comment_id').html(data.comment);
            $('#iec_number12').val(data.import_data.sending_iec_number);

        })
    });

	$('.data-table').on('click', '#show-exp-data2', function() {
        var userURL = $(this).data('url');
        $.get(userURL, function(data) {
            $('#multiple-one1').modal('show');
            $('#nameId1').val(data.import_data.id);

            $('#iec_number1').text(data.import_data.sending_iec_number);
            $('#name_of_applicant1').text(data.import_data.sending_applicant_name);
            $('#application_number1').text(data.import_data.application_number);
            //$('#address1').text(data.import_data.end_user_address);
            $('#address1').text(data.import_data.sending_add_company_institute);
			$('#comment_id').html(data.comment);
            $('#app_number').val(data.application_number);
            $('#iec_number12').val(data.import_data.sending_iec_number);

        })
    });


    // Exporter

    $('.data-table').on('click', '#show-exp-data', function() {
        //alert('hi');   
        var userURL = $(this).data('url');
        $.get(userURL, function(data) {
            $('.userShowModal').modal('show');
            $('#expID').val(data.id);
            $('#impexpID').val(data.id);
            $('#application_number').text(data.application_number);
            $('#sending_iec_number').text(data.sending_iec_number);
            $('#sending_applicant_name').text(data.sending_applicant_name);
            $('#add_comp_inst').text(data.sending_add_company_institute);
            $('#app_number').val(data.application_number);
            $('#iec_number').val(data.sending_iec_number);


        })
    });

});
$(document).ready(function(){

});

