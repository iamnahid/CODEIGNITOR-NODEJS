var db = require('./db');
module.exports = {
	getAll: function(callbackFromController) {
		var sql = "SELECT * FROM question";
		db.execute(sql, null ,function(result){
			callbackFromController(result);
		});
	},
	getById: function(uid, callbackFromController) {
		var sql = "SELECT * FROM question WHERE questionId=?";
		db.execute(sql, [uid.id] ,function(result){
			callbackFromController(result[0]);
		});
	},
	insert: function(ques, callbackFromController){
		var sql = "INSERT INTO question VALUES (null,? , ?, ?, ?, ?)";
		db.execute(sql, [ques.subject, ques.question, ques.option1, ques.option2, ques.canswer], function(result){
			callbackFromController(result);
		});
	},
	update: function(ques, callbackFromController) {
		var sql = "UPDATE question SET subject=?, question=?, option1=?, option2=?, canswer=? WHERE questionId=?";
		db.execute(sql, [ques.subject, ques.question, ques.option1, ques.option2, ques.canswer, ques.questionId], function(result){
			callbackFromController(result);
		});
	},
	delete: function(id, callbackFromController){
		var sql="Delete from question WHERE questionId=?";
		db.execute(sql, [id.id], function(result){
			callbackFromController(result[0]);
		});
	}
};