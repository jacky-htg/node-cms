const Model  = require('../models/Model')
const req    = require('request')
const path   = 'boards'

var form = function(request) {
  var start_period = request.body.start_period.split("/")
  var end_period = request.body.end_period.split("/")

  if (Array.isArray(start_period)) {
    start_period = start_period[2]+'-'+start_period[0]+'-'+start_period[1];
  }
  if (Array.isArray(end_period)) {
    end_period = end_period[2]+'-'+end_period[0]+'-'+end_period[1];
  }

  var status = request.body.status
  if(status === 'on') {
    status = 1
  }
  else {
    status = 0
  }


  return {
    user_id         : request.body.user_id,
    profile_picture : request.body.profile_picture,
    position        : request.body.position,
    division        : request.body.division,
    start_period    : start_period,
    end_period      : end_period,
    status          : status
  }
}

exports.List = function(request, callback) {
  Model.List(request, path, function(err, res, body){
    callback(err, res, body)
  })
}

exports.Get = function(request, callback) {
  Model.Get(request, path, function(err, res, body){
    callback(err, res, body)
  })
}

exports.Create = function(request, callback) {
  Model.Create(request, path, form(request), function(err, res, body){
    callback(err, res, body)
  })
}

exports.Edit = function(request, callback) {
  Model.Edit(request, path, form(request), function(err, res, body){
    callback(err, res, body)
  })
}

exports.Delete = function(request, callback) {
  Model.Delete(request, path, function(err, res, body){
    callback(err, res, body)
  })
}
