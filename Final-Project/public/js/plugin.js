toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "2000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};
function success_toastr(pesan){
    toastr.success(pesan);
}
function error_toastr(pesan){
    toastr.error(pesan);
}
function number_only(obj) {
    $('#' + obj).bind('keypress', function (event) {
        var regex = new RegExp("^[0-9]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    });
}
function npwp_format(obj){
    Inputmask({
        "mask" : "99.999.999.9-999.999"
    }).mask("#" + obj);
}
function format_ribuan(nStr) {
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}
function ribuan(obj) {
    $('#' + obj).keyup(function (event) {
        if (event.which >= 37 && event.which <= 40) return;
        // format number
        $(this).val(function (index, value) {
            return value
                .replace(/\D/g, "")
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
        var id = $(this).data("id-selector");
        var classs = $(this).data("class-selector");
        var value = $(this).val();
        var noCommas = value.replace(/,/g, "");
        $('#' + id).val(noCommas);
        $('.' + classs).val(noCommas);
    });
}
function obj_tinymce(obj){
    tinymce.init({
        selector: '#' + obj
    });
}
function obj_quill(obj){
    var quill = new Quill('#' + obj, {
        modules: {
            toolbar: [
                [{
                    header: [1, 2, false]
                }],
                ['bold', 'italic', 'underline'],
                ['image', 'code-block']
            ]
        },
        placeholder: 'Type your text here...',
        theme: 'snow' // or 'bubble'
    });
    quill.on('text-change', function(delta, oldDelta, source) {
        document.querySelector("textarea[name='content']").value = quill.root.innerHTML;
    });
}
function obj_ckeditor(obj){
    ClassicEditor
    .create(document.querySelector('#' + obj))
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });
}
function obj_autosize(obj){
    autosize($('#' + obj));
}
function obj_time(obj){
    $("#" + obj).flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
    });
}

function obj_date_time(obj){
    $("#" + obj).flatpickr({
        dateFormat: "Y-m-d H:i",
        enableTime: true,
    });
}

function obj_date(obj){
    $("#" + obj).flatpickr({
        dateFormat: "Y-m-d",
    });
}
function obj_year(obj){
    $("#" + obj).flatpickr({
        plugins: [new monthSelectPlugin({shorthand: true, dateFormat: "Y", altFormat: "Y"})]
    });
}
function obj_startdatenow(obj){
    $("#" + obj).flatpickr({
        dateFormat: "Y-m-d",
        minDate: "today"
    });
}
function obj_enddatenow(obj){
    $("#" + obj).flatpickr({
        dateFormat: "Y-m-d",
        maxDate: "today"
    });
}
function obj_jstree(obj){
    $('#' + obj).jstree({
        "core" : {
            "themes" : {
                "responsive": false
            }
        },
        "types" : {
            "default" : {
                "icon" : "fa fa-folder text-warning"
            },
            "file" : {
                "icon" : "fa fa-file  text-warning"
            }
        },
        "plugins": ["types"]
    });
    
    // handle link clicks in tree nodes(support target="_blank" as well)
    $('#' + obj).on('select_node.jstree', function(e,data) {
        var link = $('#' + data.selected).find('a');
        if (link.attr("href") != "#" && link.attr("href") != "javascript:;" && link.attr("href") != "") {
            if (link.attr("target") == "_blank") {
                link.attr("href").target = "_blank";
            }
            document.location.href = link.attr("href");
            return false;
        }
    });
}
function obj_select(obj,title){
    $('#' + obj).select2({
        placeholder: title,
        language: {
            // You can find all of the options in the language files provided in the
            // build. They all must be functions that return the string that should be
            // displayed.
            "noResults": function(){
                return "Data Tidak ditemukan";
            },
            "inputTooShort": function () {
                return "Anda harus memasukkan setidaknya 1 karakter";
            }
        },
        width:'100%',
    });
}
function obj_select_multiple(obj,title){
    $('#' + obj).select2({
        placeholder: title,
        language: {
            // You can find all of the options in the language files provided in the
            // build. They all must be functions that return the string that should be
            // displayed.
            "noResults": function(){
                return "Data Tidak ditemukan";
            },
            "inputTooShort": function () {
                return "Anda harus memasukkan setidaknya 1 karakter";
            }
        },
        width:'100%',
        tags: true,
        tokenSeparators: [',', ' ']
    });
}
function obj_select_ajax(obj,title,url){
    $('#' + obj).select2({
        placeholder: title,
        width:'90%',
        language: {
            // You can find all of the options in the language files provided in the
            // build. They all must be functions that return the string that should be
            // displayed.
            "noResults": function(){
                return "Data Tidak ditemukan";
            },
            "inputTooShort": function () {
                return "Anda harus memasukkan setidaknya 1 karakter";
            }
        },
        minimumInputLength: 1,
        ajax: {
            method:'POST',
            url: url,
            data: function (params) {
                var query = {
                    search: params.term
                }
                // Query parameters will be ?search=[term]&type=public
                return query;
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.title,
                            id: item.id
                        }
                    })
                };
            }
        }
    });
}
function obj_tagify(obj){
    new Tagify(obj);
}
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}