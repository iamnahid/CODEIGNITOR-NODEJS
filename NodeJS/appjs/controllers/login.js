var express = require('express');
var router = express.Router();

var loginModel = require.main.require('./models/login-model');

var signupModel = require.main.require('./models/signup-model');


router.get('/login', function (req, res){
	res.render('login/index', {message: ''});
});


router.post('/login', function (req, res){
	var user = {
		username: req.body.username,
		password: req.body.password
	};
	loginModel.verifyUser(user, function(valid){
		if(valid)
		{
			req.session.loggedUser = user;
			res.redirect('/home');
		}
		else
		{
			res.render('login/index', {message: 'Invalid username or password'});
		}
	});

});

router.get('/login/signup', function (req, res){
	res.render('login/signup');
});

router.post('/login/signup', function(req, res){
			var user = {
				
				userId: req.body.userId,
				username: req.body.username,
				password: req.body.password

			};

			signupModel.insert(user, function(result){
				res.redirect('/login/index');
			});
		
	});


module.exports = router;