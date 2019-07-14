// require
var express = require('express');
var path = require('path');
var app = express();
var bodyParser = require('body-parser');
var expressValidator = require('express-validator');
var expressSession = require('express-session');

var login = require('./controllers/login');
var home = require('./controllers/home');



var port = process.env.PORT || 1319;

app.locals.myvar = "Node JS Server is running";
// configure
app.set('view engine', 'ejs');

// middleware

app.use(express.static(path.join(__dirname, "node_modules/bootstrap/dist")));
app.use(express.static(path.join(__dirname, "node_modules/jquery/dist")));

app.use(bodyParser.urlencoded({extended:false}));
app.use(expressSession({secret: 'secret', resave: false, saveUninitialized:true}));
app.use(expressValidator());
// routes
app.get('/', function(req, res){
	res.redirect('/login/signup');
});


app.use(login);

app.use(home);


// server
app.listen(port, function(){
	console.log('Server started at ' + port + ' port....');
	console.log(app.locals.myvar);
});