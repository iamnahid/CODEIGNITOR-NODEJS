
var db = require('./db');
module.exports = {

	getAll: function(callbackFromController) {
		var sql = "SELECT * FROM users";
		db.execute(sql, null ,function(result){
			callbackFromController(result);
		});
	},
	
	insert: function(user, callbackFromController){
		var sql = "INSERT INTO users VALUES (?, ?, ?)";
		db.execute(sql, [user.userId, user.username, user.password], function(result){
			callbackFromController(result);
		});
	}

}
	