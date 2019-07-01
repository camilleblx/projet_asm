Vue.filter("booleanCroix",function(data,boolean = '1'){
	if(data != undefined){
		if(data == boolean) return '<span class="text-success"><i class="fa fa-check"></i></span>';
		else return '<span class="text-danger"><i class="fa fa-times"></i></span>';
	}else{
		return '<span class="text-danger"><i class="fa fa-times"></i></span>';
	}
	return data;
});

Vue.filter("checkCross",data =>{
	if(data == 0 || data === false) return '<span class="text-danger"><i class="fa fa-times"></i></span>';
	if(data == 1 || data === true) return '<span class="text-success"><i class="fa fa-check"></i></span>';
});