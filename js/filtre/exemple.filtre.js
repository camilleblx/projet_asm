Vue.filter("date",function(data){
	if(data != undefined){
		if(data == "0000-00-00") return undefined;
		if(data.length == 10) var res = data.split("-").reverse().join("-");
		if(data.length == 19){	
			var tab = data.split(" ");
			var date = tab[0];
			var res = date.split("-").reverse().join("-");	
		} 
		return res;
	}
	return data;
});