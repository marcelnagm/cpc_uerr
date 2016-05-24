$(document).ready(function() {
	$('.ahAddRelation').live('click', function(){
		$('.double_list_select').each(function() {
			sfDoubleList.init($(this).attr('id'), 'double_list_select');
		});
	});
});
