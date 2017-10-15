const Token = require('../models/Token')
const Group  = require('../models/Group')
const async = require('async')

exports.Index = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    Group.GetGroups(request, function(err, res, body){
      response.flash_info     = request.flash('info')
      response.flash_error    = request.flash('error')
      response.flash_warning  = request.flash('warning')
      response.title          = "Group Management"
      response.groups          = JSON.parse(body)
      response.render('group/Index', response)
    })
  }
}

exports.CreateForm = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    response.title              = "Group Management | Create New Group"
    response.flash_info         = request.flash('info')
    response.flash_error        = request.flash('error')
    response.flash_warning      = request.flash('warning')

    response.render('group/Create', response)
  }
}

exports.Create = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    Group.Create(request, function(err, res, body){
      if(res.statusCode == 201) {
        request.flash('info', 'Group has been created')
        response.redirect('/groups')
      }
      else {
        request.flash('error', body)
        //console.log(request)
        response.title              = "Group Management | Create New Group"
        response.flash_info         = request.flash('info')
        response.flash_error        = request.flash('error')
        response.flash_warning      = request.flash('warning')
        response.form               = request.body

        response.render('group/Create', response)
      }
    })
  }
}

exports.EditForm = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    Group.Get(request, function(err, res, body){
      if(res.statusCode == 200) {
        response.title              = "Group Management | Edit Group"
        response.flash_info         = request.flash('info')
        response.flash_error        = request.flash('error')
        response.flash_warning      = request.flash('warning')
        response.form               = JSON.parse(body)
        //console.log(response.form)
        response.render('group/Edit', response)
      }
      else {
        request.flash('error', body)
        response.redirect('/groups')
      }
    })
  }
}

exports.Edit = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    Group.Edit(request, function(err, res, body){
      if(res.statusCode == 200) {
        request.flash('info', 'Group has been updated')
        response.redirect('/groups')
      }
      else {
        request.flash('error', body)
        response.title              = "Group Management | Edit Group"
        response.flash_info         = request.flash('info')
        response.flash_error        = request.flash('error')
        response.flash_warning      = request.flash('warning')
        var formData = {
          'Name'  : request.body.name
        }
        response.form               = formData

        response.render('group/Edit', response)
      }
    })
  }
}

exports.Delete = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    Group.Delete(request, function(err, res, body){
      if(res.statusCode == 204) {
        request.flash('info', 'Group has been deleted')
      }
      else {
        request.flash('error', body)
      }
      response.redirect('/groups')
    })
  }
}
