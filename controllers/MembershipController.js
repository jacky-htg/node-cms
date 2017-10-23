const Token       = require('../models/Token')
const Membership  = require('../models/Membership')
const User        = require('../models/User')
const async       = require('async')

exports.Index = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    User.GetUsers(request, function(err, res, body){
      response.flash_info     = request.flash('info')
      response.flash_error    = request.flash('error')
      response.flash_warning  = request.flash('warning')
      response.title          = "Memberships Management"
      response.users          = JSON.parse(body)
      response.render('membership/Index', response)
    })
  }
}

exports.List = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    Membership.GetMemberships(request, function(err, res, body){
      response.flash_info     = request.flash('info')
      response.flash_error    = request.flash('error')
      response.flash_warning  = request.flash('warning')
      response.title          = "Memberships Management"
      response.user           = JSON.parse(body)
      response.render('membership/List', response)
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

    response.render('membership/Create', response)
  }
}

exports.Create = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    Membership.Create(request, function(err, res, body){
      if(res.statusCode == 201) {
        request.flash('info', 'Membership fee has been created')
        response.redirect('/memberships/'+request.params.userid)
      }
      else {
        request.flash('error', body)
        //console.log(request)
        response.title              = "Memberships Management | Create New Membership Fee"
        response.flash_info         = request.flash('info')
        response.flash_error        = request.flash('error')
        response.flash_warning      = request.flash('warning')
        response.form               = request.body

        response.render('membership/Create', response)
      }
    })
  }
}

exports.EditForm = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    Membership.Get(request, function(err, res, body){
      if(res.statusCode == 200) {
        response.title              = "Memberships Management | Edit Membership"
        response.flash_info         = request.flash('info')
        response.flash_error        = request.flash('error')
        response.flash_warning      = request.flash('warning')
        response.form               = JSON.parse(body)
        var start                   = response.form.Start.split(" ")
        var end                     = response.form.End.split(" ")
        start = start[0]
        start = start.split("-")
        start = start[1]+'/'+start[2]+'/'+start[0]
        response.form.Start = start

        end = end[0]
        end = end.split("-")
        end = end[1]+'/'+end[2]+'/'+end[0]
        response.form.End = end

        response.render('membership/Edit', response)
      }
      else {
        request.flash('error', body)
        response.redirect('/memberships/'+request.params.userid)
      }
    })
  }
}

exports.Edit = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    Membership.Edit(request, function(err, res, body){
      if(res.statusCode == 200) {
        request.flash('info', 'Membership has been updated')
        response.redirect('/memberships/'+request.params.userid)
      }
      else {
        request.flash('error', body)
        response.title              = "Memberships Management | Edit Membership"
        response.flash_info         = request.flash('info')
        response.flash_error        = request.flash('error')
        response.flash_warning      = request.flash('warning')
        var formData = {
          'Start'  : request.body.start_period,
          'End'    : request.body.end_period,
          'Status' : request.body.status
        }
        response.form               = formData

        response.render('membership/Edit', response)
      }
    })
  }
}

exports.Delete = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    Membership.Delete(request, function(err, res, body){
      if(res.statusCode == 204) {
        request.flash('info', 'Membership Fee has been deleted')
      }
      else {
        request.flash('error', body)
      }
      response.redirect('/memberships/'+request.params.userid)
    })
  }
}
