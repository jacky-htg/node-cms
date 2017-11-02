const Token = require('../models/Token')
const User  = require('../models/User')
const Group  = require('../models/Group')
const City  = require('../models/City')
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

exports.Index = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    User.GetUsers(request, function(err, res, body){
      response.flash_info     = request.flash('info')
      response.flash_error    = request.flash('error')
      response.flash_warning  = request.flash('warning')
      response.title          = "User Management"
      response.users          = JSON.parse(body)
      response.render('user/Index', response)
    })
  }
}

exports.CreateForm = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    response.title              = "User Management | Create New User"
    response.flash_info         = request.flash('info')
    response.flash_error        = request.flash('error')
    response.flash_warning      = request.flash('warning')

    Group.GetGroups(request, function(err, res, body){
      response.groups           = JSON.parse(body)
      City.List(request, function(err, res, body){
        response.cities         = JSON.parse(body)
        response.render('user/Create', response)
      })
    })
  }
}

exports.Create = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    User.Create(request, function(err, res, body){
      if(res.statusCode == 201) {
        request.flash('info', 'User has been created')
        response.redirect('/users')
      }
      else {
        request.flash('error', body)
        //console.log(request)
        response.title              = "User Management | Create New User"
        response.flash_info         = request.flash('info')
        response.flash_error        = request.flash('error')
        response.flash_warning      = request.flash('warning')
        response.form               = request.body
        response.form.group_id      = parseInt(response.form.group_id)
        response.form.city_id       = parseInt(response.form.city_id)

        Group.GetGroups(request, function(err, res, body){
          response.groups           = JSON.parse(body)
          City.GetCities(request, function(err, res, body){
            response.cities         = JSON.parse(body)
            response.render('user/Create', response)
          })
        })
      }
    })
  }
}

exports.EditForm = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    User.Get(request, function(err, res, body){
      if(res.statusCode == 200) {
        response.title              = "User Management | Edit User"
        response.flash_info         = request.flash('info')
        response.flash_error        = request.flash('error')
        response.flash_warning      = request.flash('warning')
        response.form               = JSON.parse(body)
        //console.log(response.form)
        Group.GetGroups(request, function(err, res, body){
          response.groups           = JSON.parse(body)
          City.GetCities(request, function(err, res, body){
            response.cities         = JSON.parse(body)
            response.render('user/Edit', response)
          })
        })
      }
      else {
        request.flash('error', body)
        response.redirect('/users')
      }
    })
  }
}

exports.Edit = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    User.Edit(request, function(err, res, body){
      if(res.statusCode == 200) {
        request.flash('info', 'User has been updated')
        console.log(body)
        response.redirect('/users')
      }
      else {
        request.flash('error', body)
        response.title              = "User Management | Edit User"
        response.flash_info         = request.flash('info')
        response.flash_error        = request.flash('error')
        response.flash_warning      = request.flash('warning')
        var formData = {
          'Name'  : request.body.name,
          'Phone' : request.body.phone,
          'Group' : {'ID': parseInt(request.body.group_id)},
          'City'  : {'ID': parseInt(request.body.city_id)}
        }
        response.form               = formData

        Group.GetGroups(request, function(err, res, body){
          response.groups           = JSON.parse(body)
          City.GetCities(request, function(err, res, body){
            response.cities         = JSON.parse(body)
            response.render('user/Edit', response)
          })
        })
      }
    })
  }
}

exports.Delete = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    User.Delete(request, function(err, res, body){
      if(res.statusCode == 204) {
        request.flash('info', 'User has been deleted')
      }
      else {
        request.flash('error', body)
      }
      response.redirect('/users')
    })
  }
}

exports.Logout = function(request, response){
  request.session.destroy()
  response.redirect('/login')
}
