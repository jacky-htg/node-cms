const querystring = require('querystring')
const req = require('request')

exports.GetToken = function(request, callback) {
  var form = {
      email: request.body.email,
      password: request.body.password
  }
  var formData = querystring.stringify(form)
  var contentLength = formData.length

  req({
      headers: {
        'Content-Length': contentLength,
        'Content-Type': 'application/x-www-form-urlencoded',
        'api_key': request.config.apiKey,
      },
      'Accept': 'application/json'
      uri: request.config.prefixUri + '/get-token',
      body: formData,
      method: 'POST'
    }, function (err, res, body) {
      callback(err, res, body)
  })
}
