/**
 * Author : Victor Dibia
 * description : Generate Sample data
 */



 var datamodel = require ('./datamodel');

 generateSampleVideoData();

 function generateSampleVideoData (){

  datamodel.deleteAllVideoData();

   // Sample data
   var sloppy = {title : "Jan 11 2016 ", startdate : new Date("01/11/2017"), stopdate : new Date("01/11/2017") ,  thumb : "img/thumb.jpg", annotations: {0: [{text: "This looks fantastic", type : "free"}], 5:[ {text: "good old salmon", type : "free"},{text: "Well .. its not really salmon its beef on the right, bowls and spices too.", type : "free"}], 15: [{text: "Slice up the beef", type : "free"}], 20: [{text: "Thats some really delicious salad", type : "free"}, {text: "The salad is also on the bread", type : "free"}] },url : "videos/8xFwvE_Khxo.mp4"};
   var sponge = {title : "Jan 1 2017", startdate : new Date("01/11/2017"), stopdate : new Date("01/11/2017") ,  thumb : "img/thumb.jpg", annotations: {0: [{text: "This looks fantastic", type : "free"}], 5:[ {text: "good old salmon", type : "free"}]},url : "videos/JSTqoVIIWJY.mp4"}
   var sesame = {title : "Jan 5 2017", startdate : new Date("01/11/2017"), stopdate : new Date("01/11/2017") ,  thumb : "img/thumb.jpg", annotations: {0: [{text: "This looks fantastic", type : "free"}], 5:[ {text: "good old salmon", type : "free"}]},url : "videos/L7kA1zIx9k4.mp4"}
   var hawaii = {title : "Jan 6 2017", startdate : new Date("01/11/2017"), stopdate : new Date("01/11/2017") ,  thumb : "img/thumb.jpg", annotations: {0: [{text: "This looks fantastic", type : "free"}], 5:[ {text: "good old salmon", type : "free"}]},url : "videos/vHoojLfLdeg.mp4"}
   var cheese = {title : "Jan 7 2017", startdate : new Date("01/11/2017"), stopdate : new Date("01/11/2017") ,  thumb : "img/thumb.jpg", annotations: {0: [{text: "This looks fantastic", type : "free"}], 5:[ {text: "good old salmon", type : "free"}]},url : "videos/Z1pZKANBKTY.mp4"}

   datamodel.saveVideoData(sloppy);
   datamodel.saveVideoData(sponge);
   datamodel.saveVideoData(sesame);
   datamodel.saveVideoData(hawaii);
   datamodel.saveVideoData(cheese);
 }
