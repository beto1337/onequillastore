
$(document).ready(main);
function main() {
	$('.submenu').click(function(){
			$(this).children('.children').slideToggle();
		});
		$('.children').click(function(detener){
			detener.stopPropagation();
					});
}
