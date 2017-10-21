const querystring = require('querystring')
const req = require('request')

exports.List = function(request, path, callback) {

  req({
      headers: {
        'api_key': request.config.api.apiKey,
        'token'  : request.session.token,
      },
      'Accept': 'application/json',
      uri: request.config.api.prefixUri+'/'+path,
      method: 'GET'
    }, function (err, res, body) {
      callback(err, res, body)
  })
}

exports.Get = function(request, path, callback) {

  req({
      headers: {
        'api_key': request.config.api.apiKey,
        'token'  : request.session.token,
      },
      'Accept': 'application/json',
      uri: request.config.api.prefixUri+'/'+path+'/'+request.params.id,
      method: 'GET'
    }, function (err, res, body) {
      callback(err, res, body)
  })
}

exports.Create = function(request, path, form, callback) {
  var formData = querystring.stringify(form)
  var contentLength = formData.length

  req({
      headers: {
        'Content-Length': contentLength,
        'Content-Type': 'application/x-www-form-urlencoded',
        'api_key': request.config.api.apiKey,
        'token'  : request.session.token,
      },
      'Accept': 'application/json',
      uri: request.config.api.prefixUri+'/'+path,
      body: formData,
      method: 'POST'
    }, function (err, res, body) {
      callback(err, res, body)
  })
}

exports.Edit = function(request, path, form, callback) {
  var formData = querystring.stringify(form)
  var contentLength = formData.length

  req({
      headers: {
        'Content-Length': contentLength,
        'Content-Type': 'application/x-www-form-urlencoded',
        'api_key': request.config.api.apiKey,
        'token'  : request.session.token,
      },
      'Accept': 'application/json',
      uri: request.config.api.prefixUri+'/'+path+'/'+request.params.id,
      body: formData,
      method: 'PUT'
    }, function (err, res, body) {
      callback(err, res, body)
  })
}

exports.Delete = function(request, path, callback) {
  req({
      headers: {
        'api_key': request.config.api.apiKey,
        'token'  : request.session.token,
      },
      'Accept': 'application/json',
      uri: request.config.api.prefixUri+'/'+path+'/'+request.params.id,
      method: 'DELETE'
    }, function (err, res, body) {
      callback(err, res, body)
  })
}
