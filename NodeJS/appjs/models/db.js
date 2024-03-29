var mysql      = require('mysql');
var connection = mysql.createConnection({
	host     : '127.0.0.1',
	user     : 'root',
	password : '',
	database : 'node'
});
connection.connect();

module.exports = {
	execute: function(sql, param, callbackFromModel)
	{
		if(param == null)
		{
			connection.query(sql, function(err, result){
				if(err)
				{
					console.log(err);
				}
				else
				{
					callbackFromModel(result);
				}
			});
		}
		else
		{
			connection.query(sql, param, function(err, result){
				if(err)
				{
					console.log(err);
				}
				else
				{
					callbackFromModel(result);
				}
			});
		}
	}
};