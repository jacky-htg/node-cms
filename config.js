module.exports = function(){
  return function(request, response, next){
    var data = {
      'api': {
        'apiKey': '4J1--4P1--d3V',
        'prefixUri': 'http://localhost:9999/api/v1'
      }
    }
    request.config = data
    next()
  }
}
