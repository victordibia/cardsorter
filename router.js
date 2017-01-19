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
 var util =  require('./util')
 var path = require("path")
 var app =  util.express ;
 var http = require('http');
 var datapi = require('./datapi/datapi');
 var recordapi = require('./recordapi/recordapi');


 server = http.createServer(app).listen(util.portnumber, function () {
 	var addr = server.address();
 	console.log('Express server listening on http://' + addr.address + ':' + addr.port);
 });

 var bodyParser = require('body-parser');
// parse application/x-www-form-urlencoded
app.use(bodyParser.urlencoded({ extended: false }))

// parse application/json
app.use(bodyParser.json());

app.set('view engine', 'jade');
app.use(express.static('public'));


//Handles all data calls etc
app.use('/data', datapi);
app.use('/recordapi', recordapi);

//Handles Every other page/url request
app.get ("/", function(req, res){
	res.render('record', {  });
}) ;

app.get ("/record", function(req, res){
	res.render('record', {  });
}) ;

app.get ("/annotate", function(req, res){
	res.render('annotate', {  });
}) ;

//Handles Every other page/url equest
app.get ("/tbd", function(req, res){
	res.render('tbd', {  });
}) ;

app.post("/test", function(req, res){
	var params = JSON.stringify(req.query) + JSON.stringify(req.params) + JSON.stringify(req.body);
	res.send(params);
}) ;

app.get ("/videos", function(req, res){
	res.render('videos', {  });
}) ;
