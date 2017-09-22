const Token = require('../models/Token')
const async = require('async')

exports.LoginForm = function(request, response){
  if (request.session.token && request.session.token != 'undefined') {
    response.redirect('/')
  }
  else {
    response.flash_info = request.flash('info')
    response.flash_error = request.flash('error')
    response.flash_warning = request.flash('warning')
    response.layout = false
    response.render('user/Login', response)
  }
}

exports.Login = function(request, response){
  if (request.session.token && request.session.token != 'undefined') {
    response.redirect('/')
  }
  else {
    Token.GetToken(request, function(err, res, body){
      if(res.statusCode == 200) {
        var bodies = body.split("\"")
        request.session.token = bodies[1]
        response.redirect('/')
      }
      else {
        request.flash('error', body)
        response.redirect('/login')
      }
    })
  }
}

exports.Logout = function(request, response){
  request.session.destroy()
  response.redirect('/login')
}
