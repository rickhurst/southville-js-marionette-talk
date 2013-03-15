MyApp.module("Notify", function(Notify, App, Backbone, Marionette, $_, _) {

	App.addRegions({
		notifyRegion: "#notifications"
	});

	App.addInitializer(function(){
		Notify.c = new Notify.Controller();
	});

	Notify.Notification = Backbone.Model.extend({});

	Notify.NotifyView = Backbone.Marionette.ItemView.extend({
		template: '#notifications-template'
	});

	Notify.Controller = App.Controller.extend({
		initialize: function(options) {
			App.listenTo(App.vent, "notify:message", this.showMessage, this);
		},
		showMessage: function(message){
			var messageModel = new Notify.Notification({
				message: message
			});
			var notificationView = new Notify.NotifyView({
				model: messageModel
			});
			App.notifyRegion.show(notificationView);
		}
	});



});