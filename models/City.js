//const querystring = require('querystring')
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
