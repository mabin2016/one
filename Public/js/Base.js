var Base = (function() {
    return {
        goAjax : function(url, data, render, beforeSend) {
            $.ajax({
                type : 'POST',
                url : url,
                data : data,
                dataType : 'json',
                beforeSend : beforeSend || function() {},
                success : render,
                error : function (data) {
                    console.log('error')
                }
            })
        },
        queryString : function(val) {
            var uri = window.location.search;
            var re = new RegExp("" +val+ "=([^&?]*)", "ig");
            return ((uri.match(re))?(uri.match(re)[0].substr(val.length+1)):null);
        }
	}
}());