Vue.filter("email",function(data){
	if(data != undefined){
		var res = '<a href="mailto:'+data+'">' + data + '</a>';
		return res;
	}
	return data;
});