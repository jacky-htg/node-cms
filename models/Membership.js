const querystring = require('querystring')
const req = require('request')

exports.GetMemberships = function(request, callback) {

  req({
      headers: {
        'api_key': request.config.api.apiKey,
        'token'  : request.session.token,
      },
      'Accept': 'application/json',
      uri: request.config.api.prefixUri+'/memberships/'+request.params.userid,
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
      uri: request.config.api.prefixUri+'/memberships/'+request.params.userid+'/'+request.params.id,
      method: 'GET'
    }, function (err, res, body) {
      callback(err, res, body)
  })
}

exports.Create = function(request, callback) {
  var form = {
      start_period  : request.body.start_period.split("/"),
      end_period    : request.body.end_period.split("/"),
      status        : request.body.status
  }

  if(form.status === 'on') {
    form.status = 1
  }
  else {
    form.status = 0
  }

  if (Array.isArray(form.start_period)) {
    form.start_period = form.start_period[2]+'-'+form.start_period[0]+'-'+form.start_period[1];
  }

  if (Array.isArray(form.end_period)) {
    form.end_period = form.end_period[2]+'-'+form.end_period[0]+'-'+form.end_period[1];
  }

  console.log(form.start_period[0]);
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
      uri: request.config.api.prefixUri+'/memberships/'+request.params.userid,
      body: formData,
      method: 'POST'
    }, function (err, res, body) {
      callback(err, res, body)
  })
}

exports.Edit = function(request, callback) {
  var form = {
    start_period  : request.body.start_period.split("/"),
    end_period    : request.body.end_period.split("/"),
    status        : request.body.status
  }
  if(form.status === 'on') {
    form.status = 1
  }
  else {
    form.status = 0
  }

  if (Array.isArray(form.start_period)) {
    form.start_period = form.start_period[2]+'-'+form.start_period[0]+'-'+form.start_period[1];
  }

  if (Array.isArray(form.end_period)) {
    form.end_period = form.end_period[2]+'-'+form.end_period[0]+'-'+form.end_period[1];
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
      uri: request.config.api.prefixUri+'/memberships/'+request.params.userid+'/'+request.params.id,
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
      uri: request.config.api.prefixUri+'/memberships/'+request.params.userid+'/'+request.params.id,
      method: 'DELETE'
    }, function (err, res, body) {
      callback(err, res, body)
  })
}
