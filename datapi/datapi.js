/***************
 * Author: Victor Dibia
 * victor.dibia@gmail.com
 * victordibia.com
 *
 * This file handles Data Retrieval Functions
 * URl paths for data manipulation (create, delete)
 */

var express = require('express');
var router = express.Router();
var datamodel = require ('./datamodel');

// middleware specific to this router
router.use(function timeLog(req, res, next) {
  //console.log('Time: ', Date.now());
  next();
});


var bodyParser = require('body-parser');
router.use(bodyParser.json());

router.get("/videos/all/", function(req, res){
  datamodel.getAllVideoData(function(videodata) {
        res.json(videodata);
  });
}) ;

router.post("/videos/annotations/update/", function(req, res){
  console.log(req.body.videoid, req.body.annotations)
  //console.log(req.body.annotations)
  datamodel.updateVideoAnnotation(req.body.videoid, JSON.parse(req.body.annotations))
  res.json("Updated annotation for video : " + req.body.videotitle);
})

// delete video item given its id
router.get("/videos/delete/:id/", function(req, res){
  console.log("Item ID: " + req.params.id + ". Item has now been deleted");
  datamodel.deleteVideoData(req.params.id);
  res.end("Item Deleted: " + req.params.id);
});


module.exports = router;
