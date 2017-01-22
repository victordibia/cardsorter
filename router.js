/***************
 * Code by Victor Dibia
 * June 30, 2015
 * victor.dibia@gmail.com
 * victordibia.com
 * @param $
 *
 * This file handles URL routing and Rest API structure both for
 * the dataapi and for the interface visualization
 */

var express = require("express")
var config = require('./config.js')
var path = require("path")
var app = express();
var session = require('express-session');
var http = require('http');
var datapi = require('./datapi/datapi');

var passport = require('passport');
var flash = require('connect-flash');

// routes
var routes = require('./routes/index');
var projectroute = require('./routes/projects');
var authroute = require('./routes/auth');

server = http.createServer(app).listen(config.portnumber, function() {
    var addr = server.address();
    console.log('Express server listening on http://' + addr.address + ':' + addr.port);
});

var bodyParser = require('body-parser');
// parse application/x-www-form-urlencoded
app.use(bodyParser.urlencoded({
    extended: false
}))

// Express Session
app.use(session({
    secret: 'secret',
    saveUninitialized: true,
    resave: true
}));

// Passport init
app.use(passport.initialize());
app.use(passport.session());

// Connect Flash
app.use(flash());

// Global Vars
app.use(function(req, res, next) {
    res.locals.success_msg = req.flash('success_msg');
    res.locals.error_msg = req.flash('error_msg');
    res.locals.error = req.flash('error');
    res.locals.user = req.user || null;
    next();
});


// parse application/json
app.use(bodyParser.json());

app.set('view engine', 'pug');
app.use(express.static('public'));

app.use('/', routes);
app.use('/auth', authroute);
app.use('/projects', projectroute);

//Handles all data calls etc
app.use('/data', datapi);
