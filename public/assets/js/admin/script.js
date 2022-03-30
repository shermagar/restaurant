var n_div = '#notificationDiv';

jQuery( function() {

    jQuery("#select-form").change(function () {
        url=$(this).attr('data-url');
        data={form:$(this).val()};
        loadTableData(url,data);
    });
    jQuery("#question-select").change(function () {
        url=$(this).attr('data-url');
        data={questionset:$(this).val()};
        loadListData(url,data);
    });


} );
function loadTableData(url,data) {
    jQuery("#result-table").load(url,data,function(response,status,xhr){
        console.log(status);
    });
}
function loadListData(url,data) {
    jQuery("#question-list").load(url,data,function(response,status,xhr){
        console.log(status);
    });
}
function cudData(url,data,callback) {
    $.ajax({
        data: data,
        type: 'POST',
        url: url,
        success:function (response,status,xhr) {
            callback(response);

        }
    });
}



function show_message(msg) {
    $(n_div).html(msg).show();
}
function hide_message(msg) {
    $(n_div).html(msg).fadeOut(5000);
}



/*********************************************************************************************
 ****Modal Call can be used everywhere just use the class name as "js-modal-call"****
 *********************************************************************************************/
$(document).on('click', '.js-modal-call', function (e) {
    e.preventDefault();
    var url = $(this).attr("href");
    var data = {};

    var myModal = $('#js-modal').modal('show');
    loadModalContent(url, data, $(this), myModal);

});
$(document).on('click', '.js-modal-call-lg', function (e) {
    e.preventDefault();
    var url = $(this).attr("href");
    var data = {};

    var myModal = $('#js-modal-lg').modal('show');
    loadModalContent(url, data, $(this), myModal);

});
function loadModalContent(url, data, element, myModal) {
    $.ajax({
        type: 'get',
        url: url,
        data: data,
        dataType: 'html',
        beforeSend: function () {
            myModal.find(".js-modal-content").html('<div class="loader"> <i class="fa fa-spin fa-spinner"></i> </div>');
        },
        success: function (data) {
            var newHtml = myModal.find(".js-modal-content").html(data);
        },
        error: function () {
            myModal.find(".js-modal-content").html('<div class="loader"> Error </div>');
        }
    })
    return false;
}



// $(document).on('click', 'js-send-email-all', function () {
//     var data = $('#form_send_email_to_all').serialize();    
// });

function addLabel() {
    //displayLoader();
    if ($("#form_add_label").valid()) {
        param = $("#form_add_label").serialize();        
        url = base_url + "admin/label/create";        
        $.ajax({
            type: "POST",
            cache: false,
            data: param,
            url: url,
            dataType: "json",
            start: parent.show_message('Saving..') ,
            success: function(response) {
                console.log(response);
                if (response.status == 'success') {
                    $('#js-modal').modal('hide');
                    show_message(response.msg);
                    hide_message(response.msg);
                    window.location.href = base_url + 'admin/label';
                } else {
                    show_message(response.msg);
                    hide_message(response.msg);
                }
            }
        });
    }
}

function editLabel() {
    //displayLoader();
    if ($("#form_add_label").valid()) {
        param = $("#form_add_label").serialize();       
        id =$('#form_add_label input[name="id"]').val();
        url = base_url + "admin/label/edit/" + id;        
        $.ajax({
            type: "POST",
            cache: false,
            data: param,
            url: url,
            dataType: "json",
            start: parent.show_message('Saving..') ,
            success: function(response) {
                console.log(response);
                if (response.status == 'success') {
                    $('#js-modal').modal('hide');
                    show_message(response.msg);
                    hide_message(response.msg);
                    window.location.href = base_url + 'admin/label';
                } else {
                    show_message(response.msg);
                    hide_message(response.msg);
                }

            }
        });
    }
}