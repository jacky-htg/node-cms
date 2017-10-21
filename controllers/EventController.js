const Token = require('../models/Token')
const Event  = require('../models/Event')
const Group  = require('../models/Group')
const async = require('async')

exports.Index = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    Event.List(request, function(err, res, body){
      response.flash_info     = request.flash('info')
      response.flash_error    = request.flash('error')
      response.flash_warning  = request.flash('warning')
      response.title          = "Event Management"
      response.events          = JSON.parse(body)
      response.render('event/Index', response)
    })
  }
}

exports.Reservations = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    Event.Get(request, function(err, res, body){
      response.flash_info     = request.flash('info')
      response.flash_error    = request.flash('error')
      response.flash_warning  = request.flash('warning')
      response.title          = "Event Management"
      response.event          = JSON.parse(body)
      response.render('event/Reservations', response)
    })
  }
}

exports.ReservationApproved = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    Event.Approved(request, function(err, res, body){
      if(res.statusCode == 200) {
        var message = 'Reservation has been cancelled';
        reservation = JSON.parse(body)
        if (reservation.IsApproved) {
          var message = 'Reservation has been approved';
        }
        request.flash('info', message)
      }
      else {
        request.flash('error', body)
      }
      response.redirect('/events/'+request.params.eventid+'/reservations')
    })
  }
}

exports.CreateForm = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    response.title              = "Event Management | Create New Event"
    response.flash_info         = request.flash('info')
    response.flash_error        = request.flash('error')
    response.flash_warning      = request.flash('warning')

    response.render('event/Create', response)
  }
}

exports.Create = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    Event.Create(request, function(err, res, body){
      if(res.statusCode == 201) {
        request.flash('info', 'Event has been created')
        response.redirect('/events')
      }
      else {
        request.flash('error', body)
        //console.log(request)
        response.title              = "Event Management | Create New Event"
        response.flash_info         = request.flash('info')
        response.flash_error        = request.flash('error')
        response.flash_warning      = request.flash('warning')
        response.form               = request.body

        response.render('event/Create', response)
      }
    })
  }
}

exports.EditForm = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    Event.Get(request, function(err, res, body){
      if(res.statusCode == 200) {
        response.title              = "Event Management | Edit Event"
        response.flash_info         = request.flash('info')
        response.flash_error        = request.flash('error')
        response.flash_warning      = request.flash('warning')
        response.form               = JSON.parse(body)
        //console.log(response.form)
        response.render('event/Edit', response)
      }
      else {
        request.flash('error', body)
        response.redirect('/events')
      }
    })
  }
}

exports.Edit = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    Event.Edit(request, function(err, res, body){
      if(res.statusCode == 200) {
        request.flash('info', 'Event has been updated')
        response.redirect('/events')
      }
      else {
        request.flash('error', body)
        response.title              = "Event Management | Edit Event"
        response.flash_info         = request.flash('info')
        response.flash_error        = request.flash('error')
        response.flash_warning      = request.flash('warning')
        var formData = {
          'Name'  : request.body.name
        }
        response.form               = formData

        response.render('event/Edit', response)
      }
    })
  }
}

exports.Delete = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    Event.Delete(request, function(err, res, body){
      if(res.statusCode == 204) {
        request.flash('info', 'Event has been deleted')
      }
      else {
        request.flash('error', body)
      }
      response.redirect('/events')
    })
  }
}
