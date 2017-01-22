var express = require('express');
var router = express.Router();


router.get('/', ensureAuthenticated, function(req, res) {
    res.render('projects', {
        title: "bingoo is big girl",
        user: {
            name: req.user.name,
            authenticated: req.isAuthenticated()
        }
    });
    console.log("authenticated .. " + req.isAuthenticated());
});

function ensureAuthenticated(req, res, next) {
    if (req.isAuthenticated()) {
        return next();
    } else {
        //req.flash('error_msg', 'You are not logged in');
        console.log("you are not logged in")
        res.redirect('/');
    }
}

module.exports = router;
