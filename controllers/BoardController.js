const Token = require('../models/Token')
const Board  = require('../models/Board')
const User  = require('../models/User')
const async = require('async')

exports.Index = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    Board.List(request, function(err, res, body){
      response.flash_info     = request.flash('info')
      response.flash_error    = request.flash('error')
      response.flash_warning  = request.flash('warning')
      response.title          = "Board Management"
      response.boards         = JSON.parse(body)
      response.render('board/Index', response)
    })
  }
}

exports.CreateForm = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    User.GetUsers(request, function(err, res, body){
      response.title              = "Board Management | Create New Board"
      response.flash_info         = request.flash('info')
      response.flash_error        = request.flash('error')
      response.flash_warning      = request.flash('warning')
      response.users              = JSON.parse(body)

      response.render('board/Create', response)
    })
  }
}

exports.Create = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    Board.Create(request, function(err, res, body){
      if(res.statusCode == 201) {
        request.flash('info', 'Board has been created')
        response.redirect('/boards')
      }
      else {
        request.flash('error', body)
        //console.log(request)
        response.title              = "Board Management | Create New Board"
        response.flash_info         = request.flash('info')
        response.flash_error        = request.flash('error')
        response.flash_warning      = request.flash('warning')
        response.form               = request.body

        User.GetUsers(request, function(err, res, body){
          response.users            = JSON.parse(body)
          response.render('board/Create', response)
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
    Board.Get(request, function(err, res, body){
      if(res.statusCode == 200) {
        response.form               = JSON.parse(body)

        User.GetUsers(request, function(err, res, body){
          response.title              = "Board Management | Edit Board"
          response.flash_info         = request.flash('info')
          response.flash_error        = request.flash('error')
          response.flash_warning      = request.flash('warning')
          var start_period            = response.form.StartPeriod.split(" ")
          start_period = start_period[0]
          start_period = start_period.split("-")
          start_period = start_period[1]+'/'+start_period[2]+'/'+start_period[0]
          response.form.StartPeriod = start_period

          var end_period            = response.form.EndPeriod.split(" ")
          end_period = end_period[0]
          end_period = end_period.split("-")
          end_period = end_period[1]+'/'+end_period[2]+'/'+end_period[0]
          response.form.EndPeriod = end_period

          response.users              = JSON.parse(body)

          response.render('board/Edit', response)
        })
      }
      else {
        request.flash('error', body)
        response.redirect('/boards')
      }
    })
  }
}

exports.Edit = function(request, response){
  if (!request.session.token || request.session.token == 'undefined') {
    response.redirect('/login')
  }
  else {
    Board.Edit(request, function(err, res, body){ 
      if(res.statusCode == 200) {
        request.flash('info', 'Board has been updated')
        response.redirect('/boards')
      }
      else {
        request.flash('error', body)
        response.title              = "Board Management | Edit Board"
        response.flash_info         = request.flash('info')
        response.flash_error        = request.flash('error')
        response.flash_warning      = request.flash('warning')
        var formData = {
          'User.ID'         : request.body.user_id,
          'ProfilePicture'  : request.body.profile_picture,
          'Position'        : request.body.position,
          'Division'        : request.body.division,
          'StartPeriod'     : request.body.start_period,
          'EndPeriod'       : request.body.end_period,
          'Status'          : request.body.status
        }
        response.form               = formData

        User.GetUsers(request, function(err, res, body){
          response.users              = JSON.parse(body)
          response.render('board/Edit', response)
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
    Board.Delete(request, function(err, res, body){
      if(res.statusCode == 204) {
        request.flash('info', 'Board has been deleted')
      }
      else {
        request.flash('error', body)
      }
      response.redirect('/boards')
    })
  }
}
