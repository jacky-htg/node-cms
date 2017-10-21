const Model  = require('../models/Model')
const req    = require('request')
const path   = 'events'

var form = function(request) {
  return {
    title     : request.body.title,
    time      : request.body.time,
    location  : request.body.location,
    content   : request.body.content,
    fee       : request.body.fee,
    quota     : request.body.quota
  }
}

exports.Approved = function(request, callback) {
  req({
      headers: {
        'api_key': request.config.api.apiKey,
        'token'  : request.session.token,
      },
      'Accept': 'application/json',
      uri: request.config.api.prefixUri+'/'+path+'/'+request.params.eventid+'/reservations/'+request.params.id,
      method: 'PUT'
    }, function (err, res, body) {
      callback(err, res, body)
  })
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
