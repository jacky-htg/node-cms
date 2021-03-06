const Model  = require('../models/Model')
const path   = 'cities'

var form = function(request) {
  return {
    name      : request.body.name
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
