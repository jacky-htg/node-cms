const querystring = require('querystring')
const req = require('request')

exports.GetCities = function(request, callback) {

  req({
      headers: {
        'api_key': request.config.api.apiKey,
        'token'  : request.session.token,
      },
      'Accept': 'application/json',
      uri: request.config.api.prefixUri+'/cities',
      method: 'GET'
    }, function (err, res, body) {
      callback(err, res, body)
  })
}

exports.Get = function(request, callback) {

  req({
      headers: {
        'api_key': request.config.api.apiKey,
        'token'  : request.session.token,
      },
      'Accept': 'application/json',
      uri: request.config.api.prefixUri+'/cities/'+request.params.id,
      method: 'GET'
    }, function (err, res, body) {
      callback(err, res, body)
  })
}

exports.Create = function(request, callback) {
  var form = {
      name      : request.body.name
  }
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
      uri: request.config.api.prefixUri+'/cities',
      body: formData,
      method: 'POST'
    }, function (err, res, body) {
      callback(err, res, body)
  })
}

exports.Edit = function(request, callback) {
  var form = {
      name      : request.body.name
  }
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
      uri: request.config.api.prefixUri+'/cities/'+request.params.id,
      body: formData,
      method: 'PUT'
    }, function (err, res, body) {
      callback(err, res, body)
  })
}

exports.Delete = function(request, callback) {
  req({
      headers: {
        'api_key': request.config.api.apiKey,
        'token'  : request.session.token,
      },
      'Accept': 'application/json',
      uri: request.config.api.prefixUri+'/cities/'+request.params.id,
      method: 'DELETE'
    }, function (err, res, body) {
      callback(err, res, body)
  })
}
