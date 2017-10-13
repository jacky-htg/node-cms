const querystring = require('querystring')
const req = require('request')

exports.GetUsers = function(request, callback) {

  req({
      headers: {
        'api_key': request.config.api.apiKey,
        'token'  : request.session.token,
      },
      'Accept': 'application/json',
      uri: request.config.api.prefixUri+'/users',
      method: 'GET'
    }, function (err, res, body) {
      callback(err, res, body)
  })
}

exports.Create = function(request, callback) {
  var form = {
      name      : request.body.name,
      username  : request.body.email,
      email     : request.body.email,
      password  : request.body.password,
      phone     : request.body.phone,
      group_id  : request.body.group_id,
      city_id   : request.body.city_id,
      is_active : true
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
      uri: request.config.api.prefixUri+'/users',
      body: formData,
      method: 'POST'
    }, function (err, res, body) {
      callback(err, res, body)
  })
}
