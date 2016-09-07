/**
 * Created by alex on 7/9/16.
 */
$(window).on('shown.bs.modal', function() {
	trickModal();
});
function edit(key){
	
	
	
	$('#updateContent').load('render-form?id='+key);
	
	 $("#modaledit").modal();
	   trickModal();
	
	
	/*
	$.ajax({
	    type     :'GET',
	    url  	 : 'load',
	    data:{
	    		id:key 
	    },
	    success  : function(data) {
	       $("body").append(data.id_plan);
	   },
	   complete:function (data){
		  
	   }
	});
	*/
}
function trickModal(){
	$('.modal-backdrop').removeClass("modal-backdrop");
}