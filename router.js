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
var routes = require('./routes/index');


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






// parse application/json
app.use(bodyParser.json());

app.set('view engine', 'pug');
app.use(express.static('public'));

app.use('/', routes);
//Handles all data calls etc
app.use('/data', datapi);
