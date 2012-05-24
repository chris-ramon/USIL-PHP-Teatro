var Obras = {
	initialize : function(config){
		this.config = config;
		this.bindEvents();
	},
	bindEvents : function(){
		this.config.login_button.on("click", this.showLoginForm);
	},
	showLoginForm : function(){
		var self = Obras;
		var status = self.config.login_wrapper.data("status");
		if (status == "inactive") { self.config.login_wrapper.slideDown('fast'); } else { self.config.login_wrapper.hide(); } 
		status = (status == "inactive") ? "active" : "inactive";
		self.config.login_wrapper.data("status", status);
	}
}