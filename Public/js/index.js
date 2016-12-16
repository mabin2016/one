var Index = (function() {

	//注册handlebars自定义helpers
	registerHP();
	 /**
		 * handlebars自定义helper
		 */
	function registerHP() {
		Handlebars.registerHelper({
			eq: function (v1, v2) {
				return v1 === v2;
			},
			ne: function (v1, v2) {
				return v1 !== v2;
			},
			lt: function (v1, v2) {
				return v1 < v2;
			},
			gt: function (v1, v2) {
				return v1 > v2;
			},
			lte: function (v1, v2) {
				return v1 <= v2;
			},
			gte: function (v1, v2) {
				return v1 >= v2;
			},
			and: function (v1, v2) {
				return v1 && v2;
			},
			or: function (v1, v2) {
				return v1 || v2;
			}
		});
	};

}());