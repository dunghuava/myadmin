<footer>
	<!-- REQUIRED SCRIPTS -->
	<!-- jQuery -->
	<script src="dist/js/adminlte.js"></script>
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="plugins/ckeditor/ckeditor.js"></script>
	<script src="plugins/select2/js/select2.js"></script>
	<script src="plugins/datetimepicker/moment.js"></script>
	<script src="plugins/datetimepicker/datetimepicker.js"></script>
	<script src="plugins/sweetalert2/sweetalert2.js"></script>
	<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
	<script src="plugins/validation/validation.js"></script>
	<script src="plugins/toastr/toastr.min.js"></script>
	<script src="plugins/datatables/jquery.dataTables.js"></script>
	<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			CKEDITOR.replace(document.querySelector('.html_editor'));
			$('.select2').select2();
            $('.datepicker').datepicker({ format: 'dd-mm-yyyy', });
			$('input').attr('autocomplete','off');
			$('.cpicker').colorpicker();
			$('.form-validate').validate();
			$('.datatable').DataTable();
			$('input[data-type="currency"]').trigger('keyup');
		});
	</script>
	<script>
	$("input[data-type='currency']").on({
		keyup: function() {
		formatCurrency($(this));
		},
		blur: function() { 
		formatCurrency($(this), "blur");
		}
	});
	function formatNumber(n) {
		return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
	}
	function formatCurrency(input, blur) {
	var input_val = input.val();
	if (input_val === "") { return; }
	var original_len = input_val.length;
	var caret_pos = input.prop("selectionStart");
	if (input_val.indexOf(".") >= 0) {
		var decimal_pos = input_val.indexOf(".");
		var left_side = input_val.substring(0, decimal_pos);
		var right_side = input_val.substring(decimal_pos);
		left_side = formatNumber(left_side);
		right_side = formatNumber(right_side);
		if (blur === "blur") {
		right_side += "00";
		}
		right_side = right_side.substring(0, 2);
		input_val = left_side + "." + right_side;
	} else {
		input_val = formatNumber(input_val);
		input_val = input_val;
		if (blur === "blur") {
			input_val;
		}
	}	
		input.val(input_val);
		var updated_len = input_val.length;
		caret_pos = updated_len - original_len + caret_pos;
		input[0].setSelectionRange(caret_pos, caret_pos);
	}
	function make_alias(str){
		str= str.toLowerCase();
		str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
		str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
		str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
		str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
		str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
		str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
		str= str.replace(/đ/g,"d");
		str= str.replace(/!|@|\$|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\'| |\"|\&|\#|\[|\]|\;|\||\{|\}|~/g,"-");
		str= str.replace(/^\-+|\-+$/g,"-");
		str= str.replace(/\–/g,"-");
		str= str.replace(/\\/g,"-");
		str= str.replace(/-+-/g,"-");
		return str;
	}
	</script>
</footer>