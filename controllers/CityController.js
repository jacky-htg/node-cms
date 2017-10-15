const Token = require('../models/Token')
const City  = require('../models/City')
const async = require('async')

exports.Index = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    City.GetCities(request, function(err, res, body){
      response.flash_info     = request.flash('info')
      response.flash_error    = request.flash('error')
      response.flash_warning  = request.flash('warning')
      response.title          = "City Management"
      response.cities          = JSON.parse(body)
      response.render('city/Index', response)
    })
  }
}

exports.CreateForm = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    response.title              = "City Management | Create New City"
    response.flash_info         = request.flash('info')
    response.flash_error        = request.flash('error')
    response.flash_warning      = request.flash('warning')

    response.render('city/Create', response)
  }
}

exports.Create = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    City.Create(request, function(err, res, body){
      if(res.statusCode == 201) {
        request.flash('info', 'City has been created')
        response.redirect('/cities')
      }
      else {
        request.flash('error', body)
        //console.log(request)
        response.title              = "City Management | Create New City"
        response.flash_info         = request.flash('info')
        response.flash_error        = request.flash('error')
        response.flash_warning      = request.flash('warning')
        response.form               = request.body

        response.render('city/Create', response)
      }
    })
  }
}

exports.EditForm = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    City.Get(request, function(err, res, body){
      if(res.statusCode == 200) {
        response.title              = "City Management | Edit City"
        response.flash_info         = request.flash('info')
        response.flash_error        = request.flash('error')
        response.flash_warning      = request.flash('warning')
        response.form               = JSON.parse(body)
        //console.log(response.form)
        response.render('city/Edit', response)
      }
      else {
        request.flash('error', body)
        response.redirect('/cities')
      }
    })
  }
}

exports.Edit = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    City.Edit(request, function(err, res, body){
      if(res.statusCode == 200) {
        request.flash('info', 'City has been updated')
        response.redirect('/cities')
      }
      else {
        request.flash('error', body)
        response.title              = "City Management | Edit City"
        response.flash_info         = request.flash('info')
        response.flash_error        = request.flash('error')
        response.flash_warning      = request.flash('warning')
        var formData = {
          'Name'  : request.body.name
        }
        response.form               = formData

        response.render('city/Edit', response)
      }
    })
  }
}

exports.Delete = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    City.Delete(request, function(err, res, body){
      if(res.statusCode == 204) {
        request.flash('info', 'City has been deleted')
      }
      else {
        request.flash('error', body)
      }
      response.redirect('/cities')
    })
  }
}
