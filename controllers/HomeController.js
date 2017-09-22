const Token = require('../models/Token')
const async = require('async')

exports.Index = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    console.log(request.session.token);
    response.title = 'Hello World'
    response.render('home/Index', response)
  }
}
