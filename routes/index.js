var express = require('express');
var router = express.Router();
// Get Homepage
// //Handles Every other page/url request
router.get("/", function(req, res) {

    res.render('index', {
        title: "bingoo is big girl",
        user: {
            name: req.isAuthenticated() ? req.user.name : "Guest",
            authenticated: req.isAuthenticated()
        }
    });
    console.log("authenticated .. " + req.isAuthenticated(), req.user);
});
module.exports = router;
