var express = require('express');
var router = express.Router();
var userModel = require.main.require('./models/user-model');
var questionModel = require.main.require('./models/question-model');
//var registrationModel = require.main.require('./models/registration-model');

router.use('*', function(req, res, next){
	if(! req.session.loggedUser)
	{
		res.redirect('/login');
		return;
	}
	next();
});

router.use('*', function(req, res, next){
	if(! req.session.loggedUser)
	{
		res.redirect('/login');
		return;
	}
	next();
});

router.get('/home/edit/:id', function(req, res){
	
	var uid ={
		 id: req.params.id

	};

	
	questionModel.getById(uid, function(result){
		console.log(result);
		res.render('home/edit', {ques: result});
	});

});

router.post('/home/edit/:id', function(req, res){
	var ques = {
		questionId: req.body.questionId,
		subject: req.body.subject,
		question: req.body.question,
		option1: req.body.option1,
		option2: req.body.option2,
		canswer: req.body.canswer
	};
	questionModel.update(ques, function(result){
		res.redirect('/home');
	});

});



router.get('/home/profile/:uname', function(req, res){
	res.render('home/profile', {errors: []});
});

router.post('/home/profile/:uname', function(req, res){
			var ques = {
				subject: req.body.subject,
				question: req.body.question,
				option1: req.body.option1,
				option2: req.body.option2,
				canswer: req.body.canswer

			};

			questionModel.insert(ques, function(result){
				res.redirect('/home');
			});
		
	});


router.get('/home/questions', function(req, res){
	res.render('home/questions', {errors: []});
});

router.post('/home/questions', function(req, res){
			var ques = {
				subject: req.body.subject,
				question: req.body.question,
				option1: req.body.option1,
				option2: req.body.option2,
				canswer: req.body.canswer

			};

			questionModel.insert(ques, function(result){
				res.redirect('/home');
			});
		
	});

router.get('/home/Delete/:id', function(req, res){
		var uid ={
		 id: req.params.id

	};

	questionModel.getById(uid, function(result){
		console.log(result);
		res.render('home/Delete', {ques: result});
	});
});
	
router.post('/home/Delete/:id', function(req, res){
			var uid={
				id:req.params.id
			}

			questionModel.delete(uid, function(result){
				res.redirect('/home');
			});
		
	});

router.get('/home', function(req, res){
	questionModel.getAll(function(result){
		//console.log(result);
		res.render('home/index', {
			user: req.session.loggedUser,
			qList: result
		});
	});
});


module.exports = router;