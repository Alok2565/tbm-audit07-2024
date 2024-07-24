@extends('nic.layouts.admin')
@section('title', 'List of Applications for Export')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h3 class="page-title text-dark"><strong>List of Applications for Export</strong></h3>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane show active" id="basic-datatable-preview">
                            <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100 table table-bordered data-table">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Application Number</th>
                                        <th>IEC Number</th>
                                        <th>Purpose</th>
                                        <th>Date of Submission</th>
                                       
                                    </tr>
                                </thead>
                                @php
                                $i = 1;
                                @endphp
                                <tbody>
                                    @foreach ($dataExporters as $key => $dataExport)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $dataExport->application_number }}</td>
                                        <td>{{ $dataExport->sending_iec_number }}</td>
                                        <td>{{ $dataExport->specify_purpose_end_use }}</td>
                                        <td>{{ $dataExport->updated_at }}</td>
                                        
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<script type="text/javascript" src="{{ asset('back/assets/js/mode.view.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#select_commettee_member').click(function() {
            //alert('Hi');
            $('#committee_member_table_id').show();
            $('.commiittee_member_checkbox').prop('checked', false);
        });
        $('.model_close').click(function() {
            //alert('Hi');
            $('#committee_member_table_id').hide();
            $('.commiittee_member_checkbox').prop('checked', false);
        });


    });

</script>
<script>
    const chBoxes =
        document.querySelectorAll('.dropdown-menu input[type="checkbox"]');
    const dpBtn =
        document.getElementById('multiSelectDropdown');
    let mySelectedListItems = [];

    function handleCB() {
        mySelectedListItems = [];
        let mySelectedListItemsText = '';

        chBoxes.forEach((checkbox) => {
            if (checkbox.checked) {
                mySelectedListItems.push(checkbox.value);
                mySelectedListItemsText += checkbox.value + ', ';
            }
        });

        dpBtn.innerText =
            mySelectedListItems.length > 0 ?
            mySelectedListItemsText.slice(0, -2) : 'Select Commette';
    }

    chBoxes.forEach((checkbox) => {
        checkbox.addEventListener('change', handleCB);
    });

</script>

<script>
    $(document).ready(function() {
        $(".mem_cls").click(function() {
            //alert('Hi');
            var member_id = $(this).attr("id_value");
            var hidden_val = $("#test_id").val();
            if (hidden_val == '') {
                var memberId_value = member_id;
            } else {
                var memberId_value = hidden_val + ',' + member_id;
            }

            $('#test_id').val(memberId_value);
            var hidden_val1 = $("#test_id").val();
            //alert(hidden_val1);
            let selectedMembers = [];
            $(".mem_cls").each(function() {
                if ($(this).is(":checked")) {
                    selectedMembers.push($(this).val());
                }
            });
            console.log("Selected members:", selectedMembers);
        });
    });

</script>
@endsection
