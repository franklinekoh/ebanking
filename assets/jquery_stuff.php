<!DOCTYPE html>
<html>
<head>
	<title>Jqu</title>
	<script src="jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('input.number').keyup(function() {

			  // skip for arrow keys
			  if(event.which >= 37 && event.which <= 40) return;

			  // format number
			  $(this).val(function(index, value) {
			    return value
			    .replace(/\D/g, "")
			    .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
			    ;
			  });
			});
		});
	</script>
</head>
<body>

	<input type="text" name="in" class="number">


</body>
</html>